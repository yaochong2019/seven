<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/pc/jinghui/activity/addgroup.html";i:1530030738;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="keyword" content="" />
	<meta name="description" content="" />
	<title>拼团</title>
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
	<style type="text/css">
		.text {
		  border: 2px solid #5dabdf;
		  border-radius: 3px 0 0 3px;
		  padding: 10px 10px 10px 10px;
		  margin-left: 40px;
		  line-height: 16px;
		  height: 50px;
		  font-size: 14px;
		  outline: none;
		  float: left;
		  background: url(../images/basic/search-icon.png) no-repeat 14px center;
		}
	</style>
</head>
<body>

	<div class="group-buy"     >
		<div class="title">
			<span>创建一个拼团</span>
		</div>
		<form action="" method="" id="add_form" name="addgroup_form">
		<div class="refresh">
			<a href=""><i class="iconfont icon-refresh"></i>刷新</a>
		</div>
		<div class="list" style="padding: 10px 0 30px 0;">
			<div style="width: 500px;float: left;margin-left: 10px;">
				<p style="font-size: 20px; color:#000;">拼团标题为：</p>
				<input type="text" name="title" class="text" value="" placeholder="在此输入标题！">
			</div>
			<div style="width: 500px;float: right;margin-right:10px;">
				<p style="font-size: 20px;color: #000;">拼团类型为：</p>
				<select name="group_id" class="text group_id" style="width: 150px;">
					<option value="2">二人团</option>
					<option value="3">三人团</option>
				</select>
			</div>
		</div>
		<div class="open-group">
			<a href="javascript:;" id="button">提交创建</a>
		</div>
		</form>
	</div>
	<script src="__STATIC__/vendor/jquery.min.js"></script>
	<script src="__STATIC__/vendor/layer/layer.js"></script>
	<script src="__STATIC__/js/main.js"></script>
	<script>

		$(function(){
            groupBuyCountDown();
		});
		function groupBuyCountDown(){

		    var items = $(".group-buy-left-time-show");
            items.each(function(index){
                var futureTime = $(this).attr("data-date");
                countdown(futureTime,this);
            })

		}

		function button(){
			var price = $('input[name="group-price"]:checked',parent.document).val();
			//var goods_spec = $('#goods_spec',parent.document).find('input[type="radio"]:checked').val();
			var goods_id = $('input[name="goods_id"]', parent.document).val();
			
			var form = $("#add_form");
			var data = '';//form.serialize();
				data = data+'&'+'goods_id='+goods_id+'&'+'price='+price
				
			$('#button').click(function(){
				
				var title = $('input[name="title"]').val();
				var regName = /[~#^$@%&!*()<>:;'"{}【】  ]/;
				if (title=='' || title.length< 4 || regName.test(title)) {
					layer.msg('标题至少4位/不能为空/不能含特殊字符!');
					return;
				}
				var group_id = $('.group_id').val();
				data += '&title='+title+'&group_id='+group_id;;
				$.ajax({
					type: "POST",
					url: "/index.php?m=Home&c=Activity&a=addgroup",
					data: data,
					dataType: 'json',
					success: function (data) {
						layer.msg(data.msg);
						if (data.status==1) {
							//location.href="/index.php?m=Home&c=activity&a=group_list&id="+goods_id;
							//window.parent.document.getElementById("kucun")		
							//var store_count = $("#huokucun",window.opener.document).val();// 商品原始库存
							//var buyNum = parseInt($("#kucun",window.opener.document).val());
							
							var store_count = parent.$("#huokucun").val();/// 商品原始库存
							var buyNum = parseInt(parent.$("#kucun").val());
							var groupid = data.result;
							if (buyNum <= store_count) {
								parent.$(".groupid").val(groupid);
								//$('#buy_goods_form',window.opener.document).submit();
								parent.$("#buy_goods_form").submit();
							} else {
								layer.msg('购买数量超过此商品购买上限', {icon: 3});
							}
		
							
						}
					}
				});
			});
		}
		button();
	</script>
</body>
</html>