<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:46:"./template/pc/jinghui/activity/group_list.html";i:1543374706;}*/ ?>
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
</head>
<body>
	<div class="group-buy">
		<div class="title">
			<span>拼团队伍</span>(<?php echo $group['id']; ?>人团)
		</div>
		<div class="refresh">
			<a href=""><i class="iconfont icon-refresh"></i>换一批</a>
		</div>
		
		 
			<!--<div style="width: 500px;float: left;margin-left: 10px;font-size: 30px;">
				<p>您已参加的拼团为：<span style="color: red;"><?php echo $my_group['title']; ?></span></p>
			</div>
			<div style="width: 500px;float: right;margin-right:10px;font-size: 30px;">
				<p>目前还需:<?php echo $my_group['group_id']-$my_group['user_num']; ?>人<span style="color: red;"><?php echo $isuser['time']; ?></span></p>
			</div>
			<div style="width: 500px;float: right;margin-right:10px;font-size: 30px;">
				<p>请等待！拼团剩余：<span style="color: red;"><?php echo time_distance($my_group['end_time'],0);; ?></span></p>
			</div>
			<div style="width: 500px;float: left;margin-left: 10px;font-size: 15px;">
				<p>拼团进行时暂不可进行再拼团操作，请耐心等待拼团完成！</p>
			</div>
			<div class="open-group" style="width: 200px;float: right;margin-top: 20px;margin-bottom: 20px;">
			<?php if($my_group['is_pay'] == 0): ?>
			<a href="javascript:;" onclick="my_group(<?php echo $my_group['id']; ?>);">取消拼团</a>
			<a href="javascript:;" onclick="gopay(<?php echo $my_group['id']; ?>);">立即支付</a>
			<?php else: ?>
			<a href="javascript:;" >已支付</a>
			<?php endif; ?>
			</div>-->
		<?php if($my_group_list != null): ?>	
		我的团
		<div class="list" style="margin-bottom: 10px;border: 1px solid #e6e6e6;">
			<!-- <?php if(is_array($my_group_list) || $my_group_list instanceof \think\Collection || $my_group_list instanceof \think\Paginator): $i = 0; $__LIST__ = $my_group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$my_group): $mod = ($i % 2 );++$i;?> -->
			<div class="item">
				<div class="avatar">
					<img src="<?php echo (isset($my_group['head_pic']) && ($my_group['head_pic'] !== '')?$my_group['head_pic']:'__STATIC__/images/my.png'); ?>" alt="" width="80" style="margin-top: 20px;">
				</div>
				<div class="msg">
					<div class="user-msg">
						<span class="name"><?php echo $my_group['title']; ?></span>
					</div>
					<div class="left-time">
						剩余 <span data-date="<?php echo date('Y-m-d H:i:s',$my_group['end_time']);; ?>" class="group-buy-left-time-show"><?php echo time_distance($my_group['end_time'],0);; ?></span>结束
					</div>
				</div>
				<div class="btn">
					<?php if($my_group['is_pay'] == 0): ?>
					<div class="status">您还没支付，不能开团</div>
					<?php else: ?>
					<div class="status">还差 <span><?php echo $my_group['group_id']-$my_group['user_num']; ?></span> 人成团，参团立即发货</div>
					
					<?php endif; ?>
					<div class="handle">
						
						<?php if($my_group['is_pay'] == 0): ?>
						<a href="javascript:;" onclick="my_group(<?php echo $my_group['id']; ?>);">取消拼团</a>
							<?php if($my_group['orderInfo'] != null): ?>
								<a onclick="javascript:parent.location.href='/Home/Cart/cart4/order_id/<?php echo $my_group['orderInfo']['order_id']; ?>.html'" >立即支付</a>
							<?php else: ?>
								<a href="javascript:;" onclick="gopay(<?php echo $my_group['id']; ?>);">立即支付</a>
							<?php endif; else: if($my_group['group_id']-$my_group['user_num'] == 0): ?>
							<a href="javascript:">拼团成功</a>
							<?php else: ?>
							<a href="javascript:;" >已支付</a>
							<?php endif; endif; ?>
					</div>
				</div>
			</div>
			<!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
		</div>
		<?php endif; if($canyu_group != null): ?>
		参与团
			<div class="list" style="margin-bottom: 10px;border: 1px solid #e6e6e6;">
				<!-- <?php if(is_array($canyu_group) || $canyu_group instanceof \think\Collection || $canyu_group instanceof \think\Paginator): $i = 0; $__LIST__ = $canyu_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$my_group): $mod = ($i % 2 );++$i;?> -->
				<div class="item">
					<div class="avatar">
						<img src="<?php echo (isset($my_group['head_pic']) && ($my_group['head_pic'] !== '')?$my_group['head_pic']:'__STATIC__/images/my.png'); ?>" alt="" width="80" style="margin-top: 20px;">
					</div>
					<div class="msg">
						<div class="user-msg">
							<span class="name"><?php echo $my_group['title']; ?></span>
						</div>
						<div class="left-time">
							剩余 <span data-date="<?php echo date('Y-m-d H:i:s',$my_group['end_time']);; ?>" class="group-buy-left-time-show"><?php echo time_distance($my_group['end_time'],0);; ?></span>结束
						</div>
					</div>
					<div class="btn">
						
						<div class="status">还差 <span><?php echo $my_group['group_id']-$my_group['user_num']; ?></span> 人成团，参团立即发货</div>
						
						<div class="handle">
							<?php if($my_group['group_id']-$my_group['user_num'] == 0): ?>
								<a href="javascript:">拼团成功</a>
							<?php else: if($my_group['orderInfo'] != null): ?>
									<a onclick="javascript:parent.location.href='/Home/Cart/cart4/order_id/<?php echo $my_group['orderInfo']['order_id']; ?>.html'" >点击支付</a>
								<?php else: ?>
									<a href="javascript:add_thisgroup(<?php echo $vo['id']; ?>);">点击支付</a>
								<?php endif; endif; ?> 
						</div>
					</div>
				</div>
				<!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
			</div>
		<?php endif; ?>	
		
		其他团	
		<div class="list">
		<!-- <?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
			<?php if($vo != null): ?>
			
			<div class="item">
				<div class="avatar">
					<img src="<?php echo (isset($vo['head_pic']) && ($vo['head_pic'] !== '')?$vo['head_pic']:'__STATIC__/images/my.png'); ?>" alt="" width="80" style="margin-top: 20px;">
				</div>
				<div class="msg">
					<div class="user-msg">
						<span class="name"><?php echo $vo['title']; ?></span>
					</div>
					<div class="left-time">
						剩余 <span data-date="<?php echo date('Y-m-d H:i:s',$vo['end_time']);; ?>" class="group-buy-left-time-show"><?php echo time_distance($vo['end_time'],0);; ?></span>结束
					</div>
				</div>
				<div class="btn">
					<div class="status">还差 <span><?php echo $vo['group_id']-$vo['user_num']; ?></span> 人成团，参团立即发货</div>
					<div class="handle">
						<?php if($vo['group_id']-$vo['user_num'] == 0): ?>
							<a href="javascript:">拼团成功</a>
						<?php else: if($vo['orderInfo'] != null): ?>
								<a onclick="javascript:parent.location.href='/Home/Cart/cart4/order_id/<?php echo $vo['orderInfo']['order_id']; ?>.html'" >点击参团</a>
							<?php else: ?>
								<a href="javascript:add_thisgroup(<?php echo $vo['id']; ?>);">点击参团</a>
							<?php endif; endif; ?> 	
					</div>
				</div>
			</div>
			
			<?php endif; ?>
		<!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
	 
		</div>
		<!-- <?php if($my_group == null): ?> -->
		<!--<?php if($group == null): ?>-->
		<div class="item" style="width: 100%;">
		<p style="width: 550px;margin: 50px auto;font-size: 30px;">暂时没有可选择的拼团，来创建一个吧！</p>
		</div>
		<!--<?php endif; ?>-->
		<div class="open-group">
			<a href="<?php echo U('Activity/addgroup'); ?>">我要开团</a>
		</div>
		<!-- <?php endif; ?> -->
	</div>
	<script src="__STATIC__/vendor/jquery.min.js"></script>
	<script src="__STATIC__/vendor/layer/layer.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
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
		function gopay(id){
			var store_count = parent.$("#huokucun").val();/// 商品原始库存
							var buyNum = parseInt(parent.$("#kucun").val());
							var groupid = id;
							if (buyNum <= store_count) {
								parent.$(".groupid").val(groupid);
								//$('#buy_goods_form',window.opener.document).submit();
								parent.$("#buy_goods_form").submit();
							} else {
								layer.msg('购买数量超过此商品购买上限', {icon: 3});
							}
		}
		function add_thisgroup(id) {
							var store_count = parent.$("#huokucun").val();/// 商品原始库存
							var buyNum = parseInt(parent.$("#kucun").val());
							var groupid = id;
							parent.$(".zhuituan").val(1);
							if (buyNum <= store_count) {
								parent.$(".groupid").val(groupid);
								parent.$("#buy_goods_form").submit();
							} else {
								layer.msg('购买数量超过此商品购买上限', {icon: 3});
							}
			/*$.post("<?php echo U('add_thisgroup'); ?>",{id:id},function(res){
				console.log(res)
				if(res.status == 1){
					layer.msg(res.msg)
					setTimeout (function(){
						var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                		parent.layer.close(index);
					},1500);
				}
			},'json')*/

		}
		function my_group(id){
			$.ajax({
				type:"post",
				url:"<?php echo U('del_group'); ?>",
				data:{id:id},
				dataType:'json',
				success:function(res){
					layer.msg(res.msg);
					if (res.status == 1) {
						window.location.reload();
					}
				}
			});
			//layer.msg(id+getCookie('user_id'));
		}
	</script>
</body>
</html>