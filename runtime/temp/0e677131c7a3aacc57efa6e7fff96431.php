<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"./template/pc/jinghui/user/editBasicMessage.html";i:1543372074;}*/ ?>
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
        <label>头像：</label>
            <div class="input-group">
                <img id="preview" src="<?php echo (isset($user['head_pic']) && ($user['head_pic'] !== '')?$user['head_pic']:'__STATIC__/images/user68.jpg'); ?>" onClick="GetUploadify2(1,'head_pic','head_pic','add_img')" width="80">
                <input type="hidden" name="head_pic" id="head_pic" value="<?php echo $user['head_pic']; ?>"/>
            </div>
        </div>
        <div class="item clearfix">
            <label>用户名：</label>
            <div class="input-group">
                <input style="width:270px;" class="form-control" type="text" name="username" readonly value="<?php echo $user['username']; ?>"/>
            </div>
        </div>
        <div class="item clearfix">
            <label>姓名：</label>
            <div class="input-group">
                <input style="width:270px;" class="form-control" type="text" name="nickname" value="<?php echo $user['nickname']; ?>"/>
            </div>
        </div>
        <div class="item clearfix">
            <label>电子邮箱：</label>
            <div class="input-group">
                <input style="width:270px;" class="form-control" type="text" name="email" value="<?php echo $user['email']; ?>" />
            </div>
        </div>
        <div class="item clearfix">
            <label>手机号码：</label>
            <div class="input-group">
                <input style="width:270px;" class="form-control" type="text" name="mobile" value="<?php echo $user['mobile']; ?>" />
            </div>
        </div>
        <div class="item clearfix">
            <label>生日：</label>
            <div class="input-group">
                <input style="width:270px;" id="birthday" class="form-control" type="text" name="birthday" value="<?php if($user['birthday'] > 0): ?><?php echo date('Y-m-d',$user['birthday']); endif; ?>" />
            </div>
        </div>
        <div class="item clearfix">
            <label>&nbsp;</label>
            <input type="submit" class="btn btn-primary" value="确认" />
            <input type="button" class="btn btn-default" value="取消" />
        </div>
    </form>
</div>
<script src="__STATIC__/vendor/jquery.min.js"></script>
<script src="__STATIC__/vendor/layer/layer.js"></script>
<script src="__STATIC__/vendor/laydate/laydate.js"></script>
<script src="__STATIC__/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="__STATIC__/vendor/jquery.validate/messages_zh.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
<script>

    $.validator.setDefaults({
        submitHandler: function() {
            var param = $('#basicMsg').serialize();
            $.post("<?php echo U('editBasicMessage'); ?>",param,function (res) {
                if(res == 1){
                    //关闭弹出层
                    var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                    parent.layer.close(index);
                }else if(res == 2){
                    layer.msg('该手机已被绑定');
                }else{
                    layer.msg('操作失败请重试');
                }
            })

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
            rules: {
                username: {
                    required: true,
                    minlength: 5
                },
                nickname: "required",
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    isMobile: true
                },
                birthday: "required"
            },
            messages: {
                username: {
                    required: "请输入用户名",
                    minlength: "用户名至少5位数"
                },
                nickname: "请输入您的真实姓名",
                email: "请输入一个正确的邮箱",
                mobile: "请输入一个正确的手机号码",
                birthday: "请填写您的出生年月"
            },
            errorElement: "span"
        });
    })

    function add_img(str){
            var head_pic = $('#head_pic').val();
            $('#head_pic').val(str);
            $('#preview').attr('src',str);
            $('img[class="headpic"]').attr('src',str);

        }
</script>
</body>
</html>