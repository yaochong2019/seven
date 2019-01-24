<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:41:"./template/mobile/new2/goods/country.html";i:1527431192;s:41:"./template/mobile/new2/public/header.html";i:1527754982;s:41:"./template/mobile/new2/public/footer.html";i:1534482884;s:42:"./template/mobile/new2/public/footer2.html";i:1534727936;}*/ ?>
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

        <a href="javascript:void(0)" onclick="self.location=document.referrer;" class="">

            <i class="am-header-icon am-icon-angle-left" style="font-size: 2.2rem;"></i>

        </a>

    </div>

    <h1 class="am-header-title">

        <?php echo $goods_country[name]; ?>

    </h1>

</header>

<div class="bottomPlaceholder"></div>



<div class="product-classify">

    
    <div class="pro-square">
    <!--<?php if($goods_list != null): ?>-->
		<!-- <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->

        <div class="am-u-sm-6 am-u-md-4 item">

            <div class="pro-img" onclick="location.href='<?php echo U('Goods/goodsInfo',array('id'=>$vo[goods_id])); ?>'">

                <img src="<?php echo $vo['original_img']; ?>" />

            </div>

            <div class="pro-intro">

                <p><?php echo $vo['goods_name']; ?></p>

                <span class="price">

                 <i>¥</i><?php echo $vo['shop_price']; ?>

            </span>

                <span class="add" onclick="AjaxAddCart(<?php echo $vo[goods_id]; ?>,$('#num_'+<?php echo $vo[goods_id]; ?>).val());">

                加入购物车

            </span>

                <input type="text" min="1" max="50" value="1" id="num_<?php echo $vo[goods_id]; ?>">

            </div>

        </div>

		<!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
        <!--<?php else: ?>-->
        <div class="nonenothing" style="height: 300px;">

            <p>暂时没有商品数据！

            <a href="<?php echo U('Mobile/Index/index'); ?>">去逛逛~~</a>

            </p>

        </div>
        <!--<?php endif; ?>-->
    </div>

</div>









<!-- 底部 -->

<!-------------------------------- footer -------------------------------------->

 <footer id="footer" data-am-widget="footer" class="am-footer am-footer-default" >

     <div class="am-footer-switch">

         <a href="<?php echo U('/mobile/article/detail/article_id/28'); ?>">关于我们</a>

         <a href="<?php echo U('/mobile/article/detail/article_id/29'); ?>">版权说明</a>

         <a href="<?php echo U('/mobile/article/detail/article_id/30'); ?>">免责说明</a>

         <a href="<?php echo U('/mobile/article/detail/article_id/31'); ?>">隐私声明</a>

         <a href="<?php echo U('/mobile/article/detail/article_id/32'); ?>">帮助中心</a>

         <a href="<?php echo U('/mobile/article/detail/article_id/33'); ?>">汇款方式</a>

     </div>

     <div class="am-footer-miscs " style="text-align: center">

         <p>服务热线：0576-88259190   E-mail：contact@pure-seven.com  </p>
         <p>Copyright © 2018  浙江净会电子商务有限公司 浙ICP备18017318号-1</p>

     </div>

     <!--<div class="friend-links">

         <a href=""><img src="__STATIC__/imgs/friendlink/1.png"></a>

         <a href=""><img src="__STATIC__/imgs/friendlink/2.png"></a>

         <a href=""><img src="__STATIC__/imgs/friendlink/3.png"></a>

         <a href=""><img src="__STATIC__/imgs/friendlink/4.png"></a>

         <a href=""><img src="__STATIC__/imgs/friendlink/5.png"></a>

     </div>-->

 </footer>



 <!-- <div class="bottomPlaceholder"></div> -->


<div data-am-widget="gotop" class="am-gotop am-gotop-default" >
    <a href="#top" title="回到顶部">
        <i></i>
        <!-- <img src="__STATIC__/imgs/gotop.png"> -->
    </a>
</div>


<!-- 底部 -->


<!-------------------------------- 底部菜单 -------------------------------------->
<div class="bottomPlaceholder"></div>
<div id="bottom-menu">
    <div class="item">
        <a href="<?php echo U('Index/index'); ?>">
            <span></span>
            <p>首页</p>
        </a>
    </div>
    <div class="item">
        <a href="<?php echo U('Goods/timeLimitShop'); ?>">
            <span></span>
            <p>限时购</p>
        </a>
    </div>
    <div class="item">
        <a href="mqqwpa://im/chat?chat_type=wpa&uin=993973664&version=1&src_type=web&web_src=oicqzone.com" target="_blank">
            <span></span>
            <p>客服</p>
        </a>
    </div>
    <div class="item">
        <a href="<?php echo U('User/index'); ?>">
            <span></span>
            <p>我的</p>
        </a>
    </div>
</div>

<script src="__STATIC__/js/jquery.min.js"></script>
<script src="__STATIC__/amaze/js/amazeui.min.js"></script>
<script src="__STATIC__/amaze/js/amazeui.swiper.min.js"></script>
<script src="__STATIC__/js/index.js"></script>
<script src="__STATIC__/layer_mobile/layer.js"></script>
<script>

    // $('#qr-modal').modal() 控制二维码弹出
</script>

</body>
</html>

<!-- 底部 -->





<!-- 底部 -->



<script>

    /****************************选择start********************************/

    $('.person-classify .item').on('click',function(){

        var dataId = $(this).attr('data-id');

        if($(this).hasClass('active')){

            if($(this).hasClass('open')){

                $(this).removeClass('open');

                $('.person-classify-select').addClass('hide');

            }else{

                $(this).addClass('open');

                $('.person-classify-select[data-id='+dataId+']').removeClass('hide')

            }

        }else{

            $('.person-classify .item').removeClass('open').removeClass('active');

            $(this).addClass('active').addClass('open');

            $('.person-classify-select').addClass('hide')

            $('.person-classify-select[data-id='+dataId+']').removeClass('hide');

        }

    });

    

    /****************************选择end********************************/





</script>