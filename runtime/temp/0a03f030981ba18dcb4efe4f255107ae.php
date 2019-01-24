<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/pc/jinghui/user/edit_address.html";i:1527233764;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="keyword" content="" />
	<meta name="description" content="" />
	<title>收货地址</title>
	<link rel="stylesheet" href="__STATIC__/css/normalize.css">
	<link rel="stylesheet" href="__STATIC__/css/iconfont.css">
	<link rel="stylesheet" href="__STATIC__/vendor/jquery-city/css/city-picker.css">
	<link rel="stylesheet" href="__STATIC__/css/main.css">
	<script src="__STATIC__/vendor/jquery.min.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/pc_common.js"></script>
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
		<form id="cartAddress" method="post" action="">
			<div class="item clearfix">
				<label><span class="red">*</span>所在地区：</label>
				<div class="input-group">
					
                        <select class="form-control" style="width: 110px;" name="province" id="province" onChange="get_city(this,0)">
                            <option value="0">请选择</option>
                            <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>
                                <option <?php if($address['province'] == $p['id']): ?>selected<?php endif; ?>  value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>

                        <select class="form-control" style="width: 110px;" name="city" id="city" onChange="get_area(this)">
                            <option  value="0">请选择</option>
                            <?php if(is_array($city) || $city instanceof \think\Collection || $city instanceof \think\Paginator): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>
                                <option <?php if($address['city'] == $p['id']): ?>selected<?php endif; ?>  value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>

                        <select class="form-control" style="width: 110px;" name="district" id="district" onChange="get_twon(this)">
                            <option  value="0">请选择</option>
                            <?php if(is_array($district) || $district instanceof \think\Collection || $district instanceof \think\Paginator): $i = 0; $__LIST__ = $district;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>
                                <option <?php if($address['district'] == $p['id']): ?>selected<?php endif; ?>  value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>

                        <select class="form-control" name="twon" id="twon" <?php if($address['twon'] > 0): ?>style="width: 110px;"<?php else: ?>style="display:none;width: 110px;"<?php endif; ?>>
                        	<?php if(is_array($twon) || $twon instanceof \think\Collection || $twon instanceof \think\Paginator): $i = 0; $__LIST__ = $twon;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>
                                <option <?php if($address['twon'] == $p['id']): ?>selected<?php endif; ?>  value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <br>
                    
				</div>
			</div>
			<div class="item clearfix">
				<label><span class="red">*</span>详细地址：</label>
				<div class="input-group">
					<input class="form-control" type="text" name="address" value="<?php echo $address['address']; ?>" style="width: 452px;"/>
				</div>
			</div>
			<div class="item clearfix">
				<label><span class="red">*</span>收货人姓名：</label>
				<div class="input-group">
					<input class="form-control" type="text" name="consignee" value="<?php echo $address['consignee']; ?>"/>
				</div>
			</div>
			<div class="item clearfix">
				<label><span class="red">*</span>手机号码：</label>
				<div class="input-group">
					<input class="form-control" type="text" name="mobile" value="<?php echo $address['mobile']; ?>"/>
				</div>
			</div>
			<div class="item clearfix">
				<label>邮箱：</label>
				<div class="input-group">
					<input class="form-control" type="text" name="email" value="<?php echo $address['email']; ?>"/>
				</div>
			</div>
			<div class="item clearfix">
				<label>备注：</label>
				<div class="input-group">
					<input class="form-control" type="text" name="remarks" value="<?php echo $address['remarks']; ?>"/>
				</div>
			</div>
			<div class="item clearfix">
				<label>&nbsp;</label>
				<input style="margin-left:155px;" type="submit" class="btn btn-primary" value="保存新地址" />
				<!-- <input type="button" class="btn btn-default" value="取消" /> -->
			</div>
		</form>
	</div>
	<script src="__STATIC__/vendor/layer/layer.js"></script>
	<script src="__STATIC__/vendor/jquery-city/js/city-picker.data.js"></script>
	<script src="__STATIC__/vendor/jquery-city/js/city-picker.js"></script>
	<script src="__STATIC__/vendor/jquery.validate/jquery.validate.min.js"></script>
	<script src="__STATIC__/vendor/jquery.validate/messages_zh.js"></script>
	<script>
		
        // 手机号码验证
        $.validator.addMethod('isMobile', function(value, element) {
            var length = value.length;
            var mobile = /^[1][3,4,5,7,8][0-9]{9}$/;
            return this.optional(element) || (length == 11 && mobile.test(value));
        },'请正确填写您的手机号码');



		$(function(){

		    //地址初始化
            var cityPicker = $('#cityPicker');
            cityPicker.citypicker();

//            cityPicker.citypicker({
//                province: '江苏省',
//                city: '常州市',
//                district: '溧阳市'
//            });


            $("#cartAddress").validate({
                rules: {
                	province: "required",
                	city: "required",
                	district: "required",
                    address: "required",
                    name: "required",
                    mobile: {
                        required: true,
                        isMobile: true
                    }
                },
                messages: {
                	province: "请选择省份",
                	city: "请选择城市",
                	district: "请选择区域",
                    address: "请输入您的信息收货地址",
                    mobile: "请输入一个正确的手机号码",
                    name: "请输入收货人姓名"
                },
                errorElement: "span"
            });
		})

	</script>

	<script>
		$("#cartAddress .btn-default").click(function(){
			$(".layui-anim").css("display","none!important");
			$(".layui-layer-shade").css("opacity","0!important");
		})
	</script>
</body>
</html>