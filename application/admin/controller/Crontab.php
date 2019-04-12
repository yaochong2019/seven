<?php
/**
 * Created by PhpStorm.
 * User: yaochong
 * Date: 2019/4/10
 * Time: 10:24
 */

namespace app\admin\controller;

class Crontab
{
    public function index()
    {

        $cronjobs = [];
        //time crontab定时参数，method 命名空间+类+方法，点号隔开，data 参数
        $cronjobs[] = ['time' => '*/1 * * * *', 'method' => 'app.common.outapi.Chinaport.send', 'data' => []]; //订单相关任务
        foreach ($cronjobs as $cron) {
            $time = time();
            if ($this->is_time_cron($time, $cron['time'])) {
                $method   = explode('.', $cron['method']);
                $function = array_pop($method);
                $method   = '\\' . join('\\', $method);
                $class    = new $method;

                if (empty($cron['data'])) {
                    $result = $class->$function();
                } else {
                    $result = $class->$function($cron['data']);
                }
                //var_dump($result);
            }
        }
    }

    /**
    Test if a timestamp matches a cron format or not
    //$cron = '5 0 * * *';
     */
    private function is_time_cron($time, $cron)
    {
        $cron_parts = explode(' ', $cron);
        if (count($cron_parts) != 5) {
            return false;
        }
        list($min, $hour, $day, $mon, $week) = explode(' ', $cron);
        $to_check                            = array('min' => 'i', 'hour' => 'G', 'day' => 'j', 'mon' => 'n', 'week' => 'w');
        $ranges                              = array(
            'min'  => '0-59',
            'hour' => '0-23',
            'day'  => '1-31',
            'mon'  => '1-12',
            'week' => '0-6',
        );
        foreach ($to_check as $part => $c) {
            $val    = $$part;
            $values = array();
            /* For patters like 0-23/2*/
            if (strpos($val, '/') !== false) {
                //Get the range and step
                list($range, $steps) = explode('/', $val);
                //Now get the start and stop
                if ($range == '*') {
                    $range = $ranges[$part];
                }
                list($start, $stop) = explode('-', $range);

                for ($i = $start; $i <= $stop; $i = $i + $steps) {
                    $values[] = $i;
                }
            }
            /*For patters like :
            2
            2,5,8
            2-23*/
            else {
                $k = explode(',', $val);
                foreach ($k as $v) {
                    if (strpos($v, '-') !== false) {
                        list($start, $stop) = explode('-', $v);
                        for ($i = $start; $i <= $stop; $i++) {
                            $values[] = $i;
                        }
                    } else {
                        $values[] = $v;
                    }
                }
            }
            if (!in_array(date($c, $time), $values) and (strval($val) != '*')) {
                return false;
            }
        }
        return true;
    }
}