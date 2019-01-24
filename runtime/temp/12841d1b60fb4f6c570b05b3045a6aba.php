<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:44:"./template/mobile/new2/user/login_phone.html";i:1542616726;s:41:"./template/mobile/new2/public/header.html";i:1527754982;}*/ ?>
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


<header id="header-simple"
        data-am-widget="header"
        class="am-header am-header-default">
    <div class="am-header-left am-header-nav">
        <a href="<?php echo U('reg'); ?>" class="">
           注册
        </a>
    </div>
    <h1 class="am-header-title">
        账号登录
    </h1>
    <a class="am-header-right am-header-nav login-close" href="/"><span>&times;</span></a>
</header>
<div class="bottomPlaceholder"></div>
<div class="login-cont">
    <form class="form">
        <div class="form-item">
            <input class="am-form-field am-round phone-num" type="text" placeholder="手机号码">
        </div>
        <div class="form-item has-link">
            <input class="am-form-field am-round code-input" type="text" placeholder="输入验证码">			<input type="button" class="get-code" style="border: none;height: 2rem;background: #fff;position: absolute;right: 1rem;z-index: 2;top: 0.6rem;font-size: 1.4rem;color: #333;" value="发送验证码">
        </div>
        <div class="form-item">
            <button class="am-btn am-btn-primary am-round" onClick="login_go()" type="button">登录</button>
        </div>
        <div class="or">或</div>
        <div class="form-item">
            <a class="am-btn am-btn-default am-round"  href="<?php echo U('login'); ?>">使用账号密码登录</a>
        </div>
    </form>
</div>
<script src="__STATIC__/js/jquery.min.js"></script>
<script src="__STATIC__/amaze/js/amazeui.min.js"></script>
<script src="__STATIC__/amaze/js/amazeui.swiper.min.js"></script>
<script src="__STATIC__/layer_mobile/layer.js"></script>
<script src="__STATIC__/js/index.js"></script>
<script>
	function login_go() {
        
		
       var username = $(".phone-num").val();
        var code = $(".code-input").val();
        $.post("<?php echo U('do_login_phone'); ?>",{username:username,code:code,scene:1},function (res) {
            
            layer.open({
                content:res.msg,
                time: 1.5
            });
            

            if(res.status == 1){
                location.href='/';
            }
        },'json');
		

    }


    $(function(){
        //获取验证码
        function getCode(time){
            var obj = $(".get-code");
            var timeStorage = time;
            var timer = null;
            obj.on("click",function(){

                var phoneNum = $(".phone-num").val();
                if( phoneNum.trim() === '' ){
                    layer.open({
                        content:"请填写手机号码",
                        time: 1.5
                    });
                    return;
                }
                if( !checkPhone(phoneNum) ){
                    layer.open({
                        content:"请填写正确的手机号码",
                        time: 1.5
                    });
                    return;
                }
                //这里作交互
                var scene = 1;
                var type = 'type';
                $.post("<?php echo U('get_pcode'); ?>",{username:phoneNum,scene:scene,type:type},function (re) {

                    if(re == -1){
                        layer.open({
                            content:"此账号未注册，请先注册",
                            time: 1.5
                        });
                    }
                   
                    if(re.status == 1){
                        layer.open({
                            content:re.msg,
                            time: 1.5
                        });
                        obj.attr("disabled","disabled");
                        $(this).val("验证码在"+time+"s后失效");
                        timer = setInterval(function(){
                            time--;
                            if( time >= 0 ){
                                showNotice(time);
                            }else{
                                clearInterval(timer);
                                time = timeStorage;
                                obj.removeAttr("disabled");
                                showNotice();
                            }
                        },1000);
                    }

                });
                
            });

            function showNotice(time){
                if( time ){
                    obj.val("验证码在"+time+"s后失效");
                }else{
                    obj.val("获取验证码")
                }
            }
        }
        getCode(100);

        function checkPhone(value){
            return (/^1(3|4|5|7|8)\d{9}$/.test(value))
        }
    })
</script>
</body>
</html>