
 /**
  *  将商品加入购物车
  * @param goods_id|商品id
  * @param num|商品数量
  * @param to_cart|加入购物车后再跳转到 购物车页面 默认不跳转 1 为跳转
  * @constructor
  */
 function AjaxAddCart(goods_id, num, to_cart) {
	 // 如果有商品规格 说明是商品详情页提交
	 var form = $("#buy_goods_form");
	 var cart_quantity = $("#cart_quantity");
	 var data;//post数据
	 if (form.length > 0) {
	 	
		 data = form.serialize();
	 } else {
		 data = {goods_id: goods_id, goods_num: num};
	 }
	 $.ajax({
		 type: "POST",
		 url: "/index.php?m=Home&c=Cart&a=ajaxAddCart",
		 data: data,
		 dataType: 'json',
		 success: function (data) {
			if (data.status == 2) {
			 	//location.href = "/index.php?m=Home&c=Cart&a=cart2&id=" + goods_id+'&'+'goods_num='+num;
			 	
				  layer.msg('您还未登录！', {
				    time: 2000, //20s后自动关闭
				    btn: ['登录', '取消'],
				    yes:function(){
				    	location.href = "/index.php?m=Home&c=User&a=login"
				    },
				  });
				return false;
			}
			
		 	if (data.status==0) {
		 		layer.msg(data.msg);
		 	}
			 var cart_num;
			 if (form.length > 0) {
			 	layer.msg(data.msg);
			 	if (to_cart == 1) {
			 		layer.msg(data.msg);
					location.href = "/index.php?m=Home&c=Cart&a=index";//直接购买
				 }
				 cart_num = parseInt(cart_quantity.html()) + parseInt($('input[name="goods_num"]').val());
			 } else {
				 if (data.status == -1) {
				 	layer.msg(data.msg);
					 location.href = "/index.php?m=Home&c=Goods&a=goodsInfo&id=" + goods_id;
					 return false;
				 }
				 cart_num = parseInt(cart_quantity.html()) + parseInt(num);
			 }
			 if (data.status <= 0) {
			 	layer.msg(data.msg);
				 if(!$.isEmptyObject(data.result)){
					 if(!$.isEmptyObject(data.result.url)){
						 location.href = data.result.url;
						 return false;
					 }
				 }
				 layer.alert(data.msg, {icon: 2});
				 return false;
			 }
			 
			 if (data.status == 1) {
			 	layer.msg(data.msg);
			 }
			 $('#cart_quantity').html(cart_num);
		 }
	 });
 }
 //购买兑换商品
 function buyIntegralGoods(goods_id, num, to_cart){
	 var form = $("#buy_goods_form");
	 var data;//post数据
	 if(getCookie('user_id') == ''){
		 pop_login();
		 return;
	 }
	 if (form.length > 0) {
		 data = form.serialize();
	 } else {
		 data = {goods_id: goods_id, goods_num: num};
	 }
	 $.ajax({
		 type: "POST",
		 url: "/index.php?m=Home&c=Cart&a=buyIntegralGoods",
		 data: data,
		 dataType: 'json',
		 success: function (data) {
			 if(data.status == 1){
				 location.href = data.result.url;
			 }else{
				 if(!$.isEmptyObject(data.result)){
					 if(!$.isEmptyObject(data.result.url)){
						 location.href = data.result.url;
					 }
				 }else{
					 layer.alert(data.msg, {icon: 2});
				 }
			 }
		 }
	 });
 }

// 点击收藏商品
function collect_goods(goods_id){
	$.ajax({
		type : "GET",
		dataType: "json",
		url:"/index.php?m=Mobile&c=goods&a=collect_goods&goods_id="+goods_id,//+tab,
		success: function(data){
			alert(data.msg);
		}
	});
}