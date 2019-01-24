<?php
namespace app\admin\controller;

use app\common\logic\OrderLogic;
use app\common\logic\TeamActivityLogic;
use app\common\model\Order;
use app\common\model\TeamActivity;
use app\common\model\TeamFollow;
use app\common\model\TeamFound;
use think\Loader;
use think\Db;
use think\Page;

class Team extends Base
{
	public function index()
	{
		$group = M('groups')->select();
		$this->assign('group',$group);
	return $this->fetch();	
	}

	/**
	 * 添加拼团
	 * @return mixed
	 */
	public function info(){
		/*$a['title']= I('act_name');
		$a['team_type']= I('team_type');
		$a['goods_id']= I('goods_name');
		$a['bonus']= I('bonus');*/
		$data=I('post.');
		$data['start_time'] = time();
        $data['end_time'] = strtotime($data['time_limit']+'24:00:00');
		dump($data);
		if (IS_POST) {
            $data = I('post.');
            $data['start_time'] = time();
            $data['end_time'] = strtotime($data['time_limit']+'24:00:00');
            $flashSaleValidate = Loader::validate('Team');
            if (!$flashSaleValidate->batch()->check($data)) {
                $return = ['status' => 0, 'msg' => '操作失败', 'result' => $flashSaleValidate->getError()];
                $this->ajaxReturn($return);
            }
            if (empty($data['id'])) {
                $flashSaleInsertId = Db::name('group_buy')->insertGetId($data);
                if($data['item_id'] > 0){
                    //设置商品一种规格为活动
                    Db::name('spec_goods_price')->where('item_id',$data['item_id'])->update(['prom_id' => $flashSaleInsertId, 'prom_type' => 2]);
                    Db::name('goods')->where("goods_id", $data['goods_id'])->save(array('prom_id'=>0,'prom_type' => 2));
                }else{
                    Db::name('goods')->where("goods_id", $data['goods_id'])->save(array('prom_id' => $flashSaleInsertId, 'prom_type' => 2));
                }
                adminLog("管理员添加拼团活动 " . $data['act_name']);
                if ($flashSaleInsertId !== false) {
                    $this->ajaxReturn(['status' => 1, 'msg' => '添加拼团活动成功', 'result' => '']);
                } else {
                    $this->ajaxReturn(['status' => 0, 'msg' => '添加拼团活动失败', 'result' => '']);
                }
            } else {
                $r = M('group_buy')->where("id=" . $data['id'])->save($data);
                M('goods')->where(['prom_type' => 2, 'prom_id' => $data['id']])->save(array('prom_id' => 0, 'prom_type' => 0));
                if($data['item_id'] > 0){
                    //设置商品一种规格为活动
                    Db::name('spec_goods_price')->where(['prom_type' => 2, 'prom_id' => $data['item_id']])->update(['prom_id' => 0, 'prom_type' => 0]);
                    Db::name('spec_goods_price')->where('item_id', $data['item_id'])->update(['prom_id' => $data['id'], 'prom_type' => 2]);
                    M('goods')->where("goods_id", $data['goods_id'])->save(array('prom_id' => 0, 'prom_type' => 2));
                }else{
                    M('goods')->where("goods_id", $data['goods_id'])->save(array('prom_id' => $data['id'], 'prom_type' => 2));
                }
                if ($r !== false) {
                    $this->ajaxReturn(['status' => 1, 'msg' => '编辑拼团活动成功', 'result' => '']);
                } else {
                    $this->ajaxReturn(['status' => 0, 'msg' => '编辑拼团活动失败', 'result' => '']);
                }
            }
        }

	return $this->fetch();	
	}

	
	/**
	 * 删除拼团
	 */
	public function delete(){

	return $this->fetch();	
	}

	/**
	 * 确认拼团
	 * @throws \think\Exception
	 */
	public function confirmFound(){
	return $this->fetch();	
	}

	/**
	 * 拼团退款
	 */
	public function refundFound(){
	return $this->fetch();	
	}

	/**
	 * 拼团订单
	 */
	public function team_list()
	{
	return $this->fetch();	
	}

	/**
	 * 拼单成员
	 */
	public function team_found()
	{
	return $this->fetch();	
	}

	/**
	 * 拼团列表
	 */
	public function team_order()
	{
	return $this->fetch();	
	}

	/**
	 * 拼团订单详情
	 * @return mixed
	 */
	public function ajax_group_list()
	{	
		$start = I('start_time');
		$starts = explode('-', $start);
		$start_time = strtotime($starts[0]);
		$end = I('end_time');
		$ends = explode('-', $end);
		$end_time = strtotime($ends[0]);
		$is_end = I('is_end');
		$group_id = I('group_id');
		$where = " 1 = 1 ";
		if($start_time){$where .= "and start_time > '$start_time' ";}
		if($end_time){$where .= "and end_time < '$end_time' ";}
		if($group_id){$where .= "and group_id = '$group_id'";}
		if($is_end){$where .= "and is_end = '$is_end'";}
		$count = M('group_buy')->count();
		$page = new page($count,10);
		$group = Db::table('jh_group_buy')
				->alias('a')
				->join('__USERS__ w','a.user_id = w.user_id')
				->join('__GOODS__ c','a.goods_id = c.goods_id')
				->where($where)
				->order('a.is_end desc')
				->limit($page->firstRow.','.$page->listRows)
				->select();
		if ($group) {
			$this->assign('group',$group);
			$this->assign('page',$page->show());
		}
		return $this->fetch();	
	}

	//拼团订单
	public function order_list(){
	return $this->fetch();	
	}

	/**
	 * 团长佣金
	 */
	public function bonus(){
	return $this->fetch();	
	}

	public function doBonus(){
	return $this->fetch();	
	}
}
