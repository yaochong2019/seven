<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:49:"./template/pc/jinghui/user/editBasicMessage2.html";i:1542041292;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="keyword" content="" />
    <meta name="description" content="" />
    <title>净会</title>
    <link rel="stylesheet" href="__STATIC__/css/normalize.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/css/main.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="__STATIC__/vendor/html5shiv.min.js"></script>
    <script src="__STATIC__/vendor/respond.min.js"></script>
    <script>
        alert("您的浏览器版本过低请升级！");
        location.href = "http://outdatedbrowser.com/zh-cn";
    </script>
    <![endif]-->
</head>
<body>
<div class="edit-basic-message edit-form">
    <form id="basicMsg">
        <div class="item clearfix">
            <label>居住地：</label>
            <div class="input-group">
                <input style="width:270px;" class="form-control" type="text" value="<?php echo $user['my_address']; ?>" name="my_address"/>
            </div>
        </div>
        <div class="item clearfix">
            <label>登录密码：</label>
            <div class="input-group">
                <input style="width:270px;" class="form-control" type="text" name="password" value="<?php if(!empty($user['password'])){echo '******';}?>"/>
            </div>
        </div>
        <div class="item clearfix">
            <label>支付密码：</label>
            <div class="input-group">
                <input style="width:270px;" class="form-control" type="text" name="paypwd" value="<?php if(!empty($user['paypwd'])){echo '******';}?>"/>
            </div>
        </div>
        <div class="item clearfix">
            <label>身份证号：</label>
            <div class="input-group">
                <input style="width:270px;" class="form-control" type="text" name="usercode" value="<?php echo $user['usercode']; ?>" />
            </div>
        </div>

        <input type="hidden" name="scene" value="2">

        <div class="item clearfix">
            <label>手机号：</label>
            <div class="input-group">
                <input style="width:270px;" class="form-control phone-num" type="text" disabled="disabled" name="mobile" value="<?php echo $user['mobile']; ?>" />
            </div>
        </div>

        <div class="item clearfix">
            <label>短信验证码：</label>
            <div class="input-group">
                <input style="width:170px;" class="form-control" type="text" name="code" value="" />
                <a class="get-code" href="javascript:getCode(100);">发送验证码</a>
            </div>
        </div>

        


        <div class="item clearfix">
            <label>&nbsp;</label>
            <input type="submit"  class="btn btn-primary" value="确认" />
            <input type="button" class="btn btn-default" value="取消" />
        </div>
    </form>
</div>
<script src="__STATIC__/vendor/jquery.min.js"></script>
<script src="__STATIC__/vendor/layer/layer.js"></script>
<script src="__STATIC__/vendor/laydate/laydate.js"></script>
<script src="__STATIC__/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="__STATIC__/vendor/jquery.validate/messages_zh.js"></script>
<script>
    $.validator.setDefaults({
        submitHandler: function() {
            //alert("提交事件!");
            var param = $('#basicMsg').serialize();
            param += '&mobile=<?php echo $user['mobile']; ?>';
            $.post("<?php echo U('editBasicMessage2'); ?>",param,function (res) {
                layer.msg(res.msg)
                if(res.status == 1){
                    //关闭弹出层
					window.parent.location.reload();
					var index = parent.layer.getFrameIndex(window.name);
					parent.layer.close(index);
                }
            },'json')

        }
    });

    // 手机号码验证
    $.validator.addMethod('isMobile', function(value, element) {
        var length = value.length;
        var mobile = /^[1][3,4,5,7,8][0-9]{9}$/;
        return this.optional(element) || (length == 11 && mobile.test(value));
    },'请正确填写您的手机号码');

    function removeLayerTips(obj) {
        var layer_index = obj.attr('layer_index');
        if (layer_index != "" && layer_index != undefined && layer_index != null) {
            layer.close(layer_index);
        }
    }

    $(function(){

        laydate.render({
            elem: '#birthday'
        });
        $("#basicMsg").validate({

        });

    })


    //获取验证码
        function getCode(time){
            var obj = $(".get-code");
            var timeStorage = time;
            var timer = null;
                var phoneNum = $(".phone-num").val();
                if( phoneNum.trim() === '' ){
                    layer.msg("请填写手机号码",{
                        icon:2
                    });
                    return;
                }
                if( !checkPhone(phoneNum) ){
                    layer.msg("请填写正确的手机号码",{
                        icon:2
                    });
                    return;
                }
                //这里作交互
                var scene = 2;
                var type = 'type';
                $.post("<?php echo U('get_pcode'); ?>",{username:phoneNum,scene:scene,type:type},function (re) {

                    if(re == -1){
                        layer.msg("此账号未注册，请先注册");
                    }
                    layer.msg(re.msg);
                    if(re.status == 1){
                        obj.attr("href","javascript:;");
                        obj.html("验证码在"+time+"s后失效");
                        timer = setInterval(function(){
                            time--;
                            if( time >= 0 ){
                                showNotice(time);
                            }else{
                                clearInterval(timer);
                                time = timeStorage;
                                obj.removeAttr("disabled");
								obj.attr("href","javascript:getCode(100);");
                                showNotice();
                            }
                        },1000);
                    }

                });

                return false;

           

            function showNotice(time){
                if( time ){
                    obj.html("验证码在"+time+"s后失效");
                }else{
                    obj.html("获取验证码")
                }
            }
        }


        function checkPhone(value){
            return (/^1(3|4|5|7|8)\d{9}$/.test(value))
        }

</script>
</body>
</html>