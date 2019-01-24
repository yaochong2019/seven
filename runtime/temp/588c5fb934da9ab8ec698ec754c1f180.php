<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:48:"./template/mobile/new2/public/dispatch_jump.html";i:1528381116;s:41:"./template/mobile/new2/public/header.html";i:1527754982;}*/ ?>
<!-- 顶部 -->
<!doctype html>

<html class="no-js">

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="description" content="">

  <meta name="keywords" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <title>净会</title>

  <meta name="renderer" content="webkit">

  <link rel="stylesheet" href="__STATIC__/amaze/css/amazeui.min.css">

  <link rel="stylesheet" href="__STATIC__/amaze/css/amazeui.swiper.min.css">

  <link rel="stylesheet" href="__STATIC__/css/style.css">

  <link rel="stylesheet" href="__STATIC__/css/css.css">

  <link rel="stylesheet" href="__STATIC__/css/location.css">

  <script src="__STATIC__/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>

  <script src="__PUBLIC__/js/mobile_common.js" type="text/javascript"></script>

  <script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>

  <script src="__PUBLIC__/js/global.js" type="text/javascript" ></script>

  <script src="__STATIC__/old/js/layer.js"  type="text/javascript" ></script>

  <script src="__STATIC__/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>

</head>

<body>
<!-- 顶部 -->


<!-------------------------------- header部分 -------------------------------------->
<header id="header-simple"
        data-am-widget="header"
        class="am-header am-header-default">
    <div class="am-header-left am-header-nav">
        <a href="javascript:history.go(-1)" class="">
            <i class="am-header-icon am-icon-angle-left" style="font-size: 2.2rem;"></i>
        </a>
    </div>
    <h1 class="am-header-title">
        系统提示
    </h1>
</header>
<div class="bottomPlaceholder"></div>
<div style="width: 300px;height: 300px;margin:10% auto;">
    <div style="margin-left:25%;">
        <?php if($code == 1) {?>
            <img src="__STATIC__/imgs/icogantanhao.png"></div>
        <?php }else{ ?>
            <img src="__STATIC__/imgs/icogantanhao-sb.png"></div>
        <?php }?>
    
    <p style="margin-left: 20%" >
        <?php if($code == 1) {?><?php echo(strip_tags($msg)); }else{?>
        <?php echo(strip_tags($msg)); }?> ，等待时间：<b id="wait"><?php echo($wait); ?></b>
    </p>

    <div style="margin-left: 15%">
        <a href="<?php echo($url); ?>" id="href" type="button" class="am-btn am-btn-default buyNow">返回上一页</a>
        <a href="<?php echo U('Index/index'); ?>" type="button" class="am-btn am-btn-default buyNow">返回首页</a>
    </div>
</div>
<script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();

</script>
</body>
</html>
