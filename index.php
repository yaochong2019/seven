<?php
// Celia added to detect mobile and redirect appropriately:
// 1/21/2019
require_once "lib/MobileDetect/Mobile_Detect.php";
$detect = new Mobile_Detect;
$uri = $_SERVER['REQUEST_URI'];
if($detect->isMobile()){
	if(strpos($uri, '/mobile/') === false){
		$new_uri = '/mobile/'.substr($uri, strpos($uri, '/', 1)+1);
		header("location: $new_uri");
		exit();
	}
}
else {
	if(strpos($uri, '/mobile/') === 0){
		$new_uri = '/Home/'.substr($uri, strpos($uri, '/', 1)+1);
		header("location: $new_uri");
		exit();
	}
}
// end Celia added

// [ 应用入口文件 ]
// 应用入口文件
if (extension_loaded('zlib')){
    ob_end_clean();
    ob_start('ob_gzhandler');
}
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.4.0','<'))  die('require PHP > 5.4.0 !');
//error_reporting(E_ALL ^ E_NOTICE);//显示除去 E_NOTICE 之外的所有错误信息
error_reporting(E_ERROR | E_WARNING | E_PARSE);//报告运行时错误

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
//define('APP_DEBUG',false); debug tp5 里面已经改为 config.php 里面
// 定义应用目录
//define('APP_PATH','./Application/');
//  定义插件目录
define('PLUGIN_PATH', __DIR__ . '/plugins/');
define('UPLOAD_PATH','public/upload/'); // 编辑器图片上传路径
define('JHSHOP_CACHE_TIME',86400); // JHshop 缓存时间  31104000
$http = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
define('SITE_URL',$http.'://'.$_SERVER['HTTP_HOST']); // 网站域名
//define('HTML_PATH','./Application/Runtime/Html/'); //静态缓存文件目录，HTML_PATH可任意设置，此处设为当前项目下新建的html目录
define('INSTALL_DATE',1463741583);
define('SERIALNUMBER','20160520065303oCWIoa');
// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
// 定义时间
define('NOW_TIME',$_SERVER['REQUEST_TIME']);
// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';
