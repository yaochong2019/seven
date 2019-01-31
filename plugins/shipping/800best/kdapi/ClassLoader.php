<?php

class ClassLoader
{
    protected static $autoPath = array();

    /**
     * 注册自动加载类机制
     */
    public static function register()
    {
        // 避免其他自动加载函数加载异常，优先注册当前机制
        $func = spl_autoload_functions();
        if ($func) {
            foreach ($func as $f)
                spl_autoload_unregister($f);
        }
        spl_autoload_register(array(__CLASS__, 'autoload'));

        if ($func) {
            foreach ($func as $f)
                spl_autoload_register($f);
        }

        // 自动包含地址
        $dir = dirname(__FILE__);
        self::$autoPath = array(
            $dir,
            $dir.DIRECTORY_SEPARATOR,
        );
        self::readFileFromDir($dir.DIRECTORY_SEPARATOR);
    }

    static function readFileFromDir($dir) {
        if (!is_dir($dir)) {
            return false;
        }
        $handle = opendir($dir);
        while (($file = readdir($handle)) !== false) {
            if ($file == "." || $file == "..") {
                continue;
            }
            $file = $dir . DIRECTORY_SEPARATOR . $file;
            //如果是文件就打印出来，否则递归调用
            if (is_dir($file)) {
                array_push(self::$autoPath,$file);
                self::readFileFromDir($file);
            }
        }
    }

    public static function autoload($className)
    {
        foreach (self::$autoPath as $path) {
            $f = $path.DIRECTORY_SEPARATOR.$className.'.php';
            if (file_exists($f)) {
                include_once $f;
                return;
            }
        }
    }
}
ClassLoader::register();
