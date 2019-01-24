<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./template/mobile/new2/cart/index.html";i:1542294164;s:41:"./template/mobile/new2/public/header.html";i:1527754982;}*/ ?>
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
        购物车
    </h1>
    <div class="am-header-right am-header-nav" id="edit">编辑</div>
</header>
<div class="bottomPlaceholder"></div>

<!--购物车没有商品-s-->
<div class="nonenothing" <?php if(!(empty($cartList) || (($cartList instanceof \think\Collection || $cartList instanceof \think\Paginator ) && $cartList->isEmpty()))): ?>style="display: none"<?php endif; ?>>
<p>购物车暂无商品
<a href="<?php echo U('Mobile/Index/index'); ?>">去逛逛</a>
</p>
</div>

<!--<?php if(!(empty($cartList) || (($cartList instanceof \think\Collection || $cartList instanceof \think\Paginator ) && $cartList->isEmpty()))): ?>-->
<div class="pro-list" >

    <div class="item">
        <!--<div class="item-header">-->
            <!--<span class="checkbox checkbox-shops"></span>郑州保税局-->
        <!--</div>-->
        <!--<?php if(is_array($cartList) || $cartList instanceof \think\Collection || $cartList instanceof \think\Paginator): $i = 0; $__LIST__ = $cartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i;?>-->
        <div class="item-pro sc_list">
            <span  class="checkbox che checkbox-pro <?php if($cart[selected] == 1): ?>checked<?php endif; ?>" data-price="<?php echo $cart['member_goods_price']; ?>" data-taxation="0" date-cartid="<?php echo $cart['id']; ?>" data-num="<?php echo $cart['goods_num']; ?>">
                <input class="yc_input" name="checkItem" type="checkbox" style="display:none;" value="<?php echo $cart['id']; ?>" <?php if($cart[selected] == 1): ?>checked="checked"<?php endif; ?>>
            </span>
            <div class="pro-item">
                <div class="pro-l"><a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$cart[goods_id])); ?>">
                    <img src="<?php echo goods_thum_images($cart['goods_id'],200,200); ?>" alt=""></a>
                </div>
                <div class="pro-r">
                    <ul>
                        <li class="title"><a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$cart[goods_id])); ?>"><?php echo $cart[goods_name]; ?></a></li>
                        <li class="number">商品编号：<?php echo $cart['goods_sn']; ?></li>
                        <li class="weight">重量：0.48g</li>
                        <li class="count">
                            <!-- <p  class="deleteGoods" data-cart-id="<?php echo $cart['id']; ?>" style="float: right">删除</p> -->
                            <span class="price-now">¥<?php echo $cart['member_goods_price']; ?></span>
                            <s class="price-old">¥<?php echo $cart['market_price']; ?></s>
                            <span class="price-num am-animation-fade">x<?php echo $cart['goods_num']; ?></span>
                            <input type="number" class="hide am-animation-fade" min="1" max="10" value="<?php echo $cart['goods_num']; ?>">
                            <input style="display:none;" name="changeQuantity_<?php echo $cart['id']; ?>" type="text" id="changeQuantity_<?php echo $cart['id']; ?>" value="<?php echo $cart['goods_num']; ?>" class="input-num"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->

    </div>


</div>
<div class="bottomPlaceholder"></div>
<div id="shopChart-footer">
    <label><span class="checkbox checkbox-all"></span>全选</label>
    <a href="javascript:cart_submit();;" type="button" class="am-btn am-btn-primary operate-btn ">点击付款(<span id="checkedNum">0</span>)</a>
    <ul class="operate-count">
        <li>商品税费(不含运费)：<span id="">¥0.0</span></li>
        <li>总价(不含运费)：<span id="total_fee"></span></li>
    </ul>
</div>

<div style="display: none" id="delete_cat">
    <p class="deleteGoods" data-cart-id="<?php echo $cart['id']; ?>">删除</p>
</div>

<!--<?php endif; ?>-->

<!-- 底部 -->

<script src="__STATIC__/js/jquery.min.js"></script>
<script src="__STATIC__/amaze/js/amazeui.min.js"></script>
<script src="__STATIC__/amaze/js/amazeui.swiper.min.js"></script>
<script src="__STATIC__/js/index.js"></script>
<script src="__STATIC__/layer_mobile/layer.js"></script>
<!-- 底部 -->

<script>


    AsyncUpdateCart();


    //初始化计算订单价格
    function AsyncUpdateCart(){
        var cart = new Array();
        var inputCheckItem = $("input[name^='checkItem']");
        inputCheckItem.each(function(i,o){
            var id = $(this).attr("value");
            var goods_num = $(this).parents('.sc_list').find("input[id^='changeQuantity']").attr('value');


            if ($(this).attr("checked") == 'checked') {
                var cartItemCheck = new CartItem(id,goods_num,1);
                cart.push(cartItemCheck);
            }else{
                var cartItemNoCheck = new CartItem(id,goods_num,0);
                cart.push(cartItemNoCheck);
            }
        })
        $.ajax({
            type : "POST",
            url:"<?php echo U('Mobile/Cart/AsyncUpdateCart'); ?>",//,
            dataType:'json',
            data: {cart: cart},
            success: function(data){
                if(data.status == 1){
                    $('#checkedNum').empty().html(data.result.goods_num);
                    $('#total_fee').empty().html('¥'+data.result.total_fee);
                    $('#goods_fee').empty().html('节省：￥'+data.result.goods_fee);
                    var cartList =  data.result.cartList;
                    if(cartList.length > 0){
                        for(var i = 0; i < cartList.length; i++){
//                            $('#cart_'+cartList[i].id+'_goods_price').empty().html('￥'+cartList[i].goods_price);
//                            $('#cart_'+cartList[i].id+'_member_goods_price').empty().html('￥'+cartList[i].member_goods_price);
//                            $('#cart_'+cartList[i].id+'_total_price').empty().html('￥'+cartList[i].total_fee);
//                            $('#cart_'+cartList[i].id+'_market_price').empty().html('￥'+(cartList[i].member_goods_price*cartList[i].goods_num).toFixed(2)); //活动价格
                        }
                    }else{
                        $('.total_price').empty();
                        $('.cut_price').empty();
                    }
                }else{
                    $('#checkedNum').empty().html(data.result.goods_num);
                    $('#total_fee').empty().html('¥'+data.result.total_fee);
                    $('#goods_fee').empty().html('节省：￥'+data.result.goods_fee);
                }
            }
        });
    }

    //购物车对象
    function CartItem(id, goods_num,selected) {
        this.id = id;
        this.goods_num = goods_num;
        this.selected = selected;
    }


    countCheckedPro();
    /****************************购物车选择start********************************/




    //多选框点击事件
    $(function () {
        $(document).on("click", '.che', function (e) {
            AsyncUpdateCart();
        })
    })


    var checkedNumToDom = 0,
        checkedPrice  =0,
        checkedTaxation =0;
    $('.checkbox').on('click',function(){
        var self = $(this);
        if(self.hasClass('checkbox-pro')){

            if(self.hasClass('checked')){
                console.log(1)
                self.removeClass('checked');
                self.find('input').attr('checked',false);
            }else{
                console.log(2)
                self.addClass('checked');
                self.find('input').attr('checked',true);
            }
        }else if(self.hasClass('checkbox-shops')){
            if(self.hasClass('checked')){
                self.parents('.item').find('.checkbox').removeClass('checked');
            }else{
                self.parents('.item').find('.checkbox').addClass('checked');
            }
        }else if(self.hasClass('checkbox-all')){
            if(self.hasClass('checked')){
                $('.checkbox').removeClass('checked');
                $('.yc_input').attr('checked',false);
            }else{
                $('.checkbox').addClass('checked');
                $('.yc_input').attr('checked',true);
            }
            AsyncUpdateCart();
        }
        countCheckedPro();
    });



    function countCheckedPro(){
        var shops = $('.pro-list .item'),
            totalProNum=0,
            i,
            j;
        checkedNumToDom = 0;
        checkedTaxation = 0;
        checkedPrice = 0;
        for(i=0;i<shops.length;i++){
            var children = $(shops[i]),
                childrenPros = children.find('.item-pro'),
                proNum = childrenPros.length,
                checkedChildNum = 0;

            for(j=0;j<proNum;j++){
                totalProNum++;
                if($(childrenPros[j]).find('.checkbox').hasClass('checked')){
                    //checkedNumToDom++;
                    checkedChildNum++;
                    var $checkbox = $(childrenPros[j]).find('.checkbox'),
                        num = parseInt($checkbox.attr('data-num'));
                    checkedTaxation += parseFloat($checkbox.attr('data-taxation'))*num;
                    checkedPrice += parseFloat($checkbox.attr('data-price'))*num;
					checkedNumToDom+=num;
					var carid = parseInt($checkbox.attr('date-cartid'));
					upcart(carid,num);
                }
            }
            if(proNum === checkedChildNum){
                children.find('.checkbox-shops').addClass('checked');
            }else{
                children.find('.checkbox-shops').removeClass('checked');
            }
        }
        if(totalProNum === checkedNumToDom)   {
            $('.checkbox-all').addClass('checked');
        }else{
            $('.checkbox-all').removeClass('checked');
        }
        $('#checkedNum').text(checkedNumToDom);
        $('#price-taxation').text('¥'+checkedTaxation.toFixed(2));
        $('#price').text('¥'+(checkedPrice + checkedTaxation).toFixed(2));
		$('#total_fee').text('¥'+(checkedPrice + checkedTaxation).toFixed(2));
    }
	
	function upcart(carid,num){
		$.ajax({
            type : "POST",
            url:'/index.php?m=Mobile&c=Cart&a=upcart',
            data : {carid:carid,num:num},
            dataType: "json",
            success: function(data){

            }
        });
	}
    /****************************购物车选择end********************************/


    /****************************购物车编辑start******************************/
    $('#edit').on('click',function(){
        if($(this).hasClass('edit')){
            $(this).removeClass('edit');
            $(this).text('编辑');
            $('.pro-list .price-num').removeClass('hide');
            $('.pro-list input').addClass('hide');
            //$('#shopChart-footer .operate-btn').removeAttr('disabled');
            $('#shopChart-footer').show();
            $('#delete_cat').hide();

        }else{
            $(this).addClass('edit');
            $(this).text('完成');
            $('.pro-list .price-num').addClass('hide');
            $('.pro-list input').removeClass('hide');
            //$('#shopChart-footer .operate-btn').attr('disabled','disabled');

            $('#shopChart-footer').hide();
            $('#delete_cat').show();

        }
    });
    $('.pro-list input').change(function(e){
        var itemPro = $(this).parents('.item-pro');
        itemPro.find('.checkbox').attr('data-num',$(this).val());
        itemPro.find('.price-num').text('x'+$(this).val());
        countCheckedPro();
    });
    /****************************购物车编辑end********************************/

    //$(document).on("click", '.deleteGoods', function (e) {
    $('.deleteGoods').on('click',function(){
        // alert(1);
        var cart_ids = new Array();
        //cart_ids.push($(this).attr('data-cart-id'));
        var yc_input = getParams('.yc_input');
        
        cart_ids = yc_input.checkItem.split(',');
        
        layer.open({
            content: '确定要删除此商品吗'
            ,btn: ['确定', '取消']
            ,yes: function(index){
                layer.close(index);
                $.ajax({
                    type : "POST",
                    url:"<?php echo U('Mobile/Cart/delete'); ?>",
                    dataType:'json',
                    data: {cart_ids: cart_ids},
                    success: function(data){
                        if(data.status == 1){
                            for (var i = 0; i < cart_ids.length; i++) {
                                $('#cart_list_' + cart_ids[i]).remove();
                            }
                            var store_div = $('.orderlistshpop');
                            if(store_div.length == 0){
                                location.reload();
                            }
                        }else{
                            layer.msg(data.msg,{icon:2});
                        }
                        AsyncUpdateCart();
                    }
                });
            }
        });
    })


    //点击结算
    function cart_submit() {
        //获取选中的商品个数
        var j = 0;
        $('input[name^="checkItem"]:checked').each(function () {
            j++;
        });
        //选择数大于0
        if (j > 0) {
            //跳转订单页面
            window.location.href = "<?php echo U('Mobile/Cart/cart2'); ?>"
        } else {
            layer.open({content: '请选择要结算的商品！', time: 2});
            return false;
        }
    }


    function getParams(obj){
        var params = {};
        var chk = {},s;
        $(obj).each(function(){
            if($(this)[0].type=='hidden' || $(this)[0].type=='number' || $(this)[0].type=='tel' || $(this)[0].type=='password' || $(this)[0].type=='select-one' || $(this)[0].type=='textarea' || $(this)[0].type=='text'){
                params[$(this).attr('id')] = $.trim($(this).val());
            }else if($(this)[0].type=='radio'){
                if($(this).attr('name')){
                    params[$(this).attr('name')] = $('input[name='+$(this).attr('name')+']:checked').val();
                }
            }else if($(this)[0].type=='checkbox'){
                if($(this).attr('name') && !chk[$(this).attr('name')]){
                    s = [];
                    chk[$(this).attr('name')] = 1;
                    $('input[name='+$(this).attr('name')+']:checked').each(function(){
                        s.push($(this).val());
                    });
                    params[$(this).attr('name')] = s.join(',');
                }
            }
        });
        chk=null,s=null;
        return params;
    }

</script>

</body>
</html>