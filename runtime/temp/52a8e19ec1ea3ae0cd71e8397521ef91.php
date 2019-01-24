<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:42:"./template/mobile/new2/article/detail.html";i:1527169266;s:41:"./template/mobile/new2/public/header.html";i:1527754982;s:39:"./template/mobile/new2/public/left.html";i:1527680322;s:41:"./template/mobile/new2/public/footer.html";i:1534482884;s:42:"./template/mobile/new2/public/footer2.html";i:1534727936;}*/ ?>
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

 <div id="header">

     <a href="/"><img src="__STATIC__/imgs/logo.png"></a>

  </div>

 <header id="subHeader" data-am-widget="header" class="am-header am-header-default">
    <style>
        .shopi{
    background: #c9102c;
    font-style: normal;
    color: #fff;
    position: absolute;
    right: 5px;
    display: block;
    top: 6px;
    width: 15px;
    border-radius: 50%;
    font-size: 12px;
    height: 15px;
    text-align: center;
    line-height: 15px;}
    </style>
     <div class="am-header-left am-header-nav" onclick="$('.am-offcanvas-sub').hide();">

         <a href="javascript:void(0)" class="" data-am-offcanvas="{target: '#header-side', effect: 'push'}"></a>

     </div>

     <div class="am-header-title">

     <form action="<?php echo U('Goods/search'); ?>">

         <input type="text" name="q" value="<?php echo $filter_param['q']; ?>">

         <div <?php if($filter_param['q'] != null): ?> style="display:none" <?php endif; ?> class="title-mask">

            <i class="am-icon-search"></i>请输入相关商品

        </div>

    </form>

     </div>

     <div class="am-header-right am-header-nav">

         <a href="<?php echo U('cart/index'); ?>" class=""><i class="shopi" id="tp_cart_info"><?php echo $car_num; ?></i></a>
        <script type="text/javascript">
        $(document).ready(function () {
        
        });
            //ajax请求购物车列表
            function ajax_header_cart(){
                var cart_cn = getCookie('cn');
                if (cart_cn == '') {
                    $.ajax({
                        type: "GET",
                        url: "/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
                        success: function (data) {
                            cart_cn = getCookie('cn');
                        }
                    });
                }
                $('#tp_cart_info').html(cart_cn);
            }
        </script>
     </div>

 </header>

<!-------------------------------- 侧边栏内容 -------------------------------------->

 <div id="header-side" class="am-offcanvas">

     <div class="am-offcanvas-bar">

         <div class="am-offcanvas-content">

             <p>欢迎您的使用</p>

             <!-- <?php if($user_id != null): ?> -->

             <span><a href="<?php echo U('user/logout'); ?>">退出登录</a></span>

             <!-- <?php else: ?> -->

             <span> <a href="<?php echo U('user/login'); ?>">登录</a> </span>

             <!-- <?php endif; ?> -->
            <!--<?php if($uname == null): ?>-->
             <h3>BATTLE GROUND</h3>
            <!--<?php else: ?>-->
            <h3><?php echo $uname; ?></h3>
            <!--<?php endif; ?>-->
             <ul class="am-list am-list-static am-list-border">

             <!-- <?php if(is_array($goods_category_tree) || $goods_category_tree instanceof \think\Collection || $goods_category_tree instanceof \think\Paginator): $kr = 0; $__LIST__ = $goods_category_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($kr % 2 );++$kr;?> -->

             <!-- <?php if($v[level] == 1): ?> -->

                 <li class="content-first" onclick="$('.am-offcanvas-sub').hide();$('.top_tab_<?php echo $v['id']; ?>').show();" ><?php echo $v[name]; ?> <i class="am-icon-sm am-icon-angle-right"></i></li>

             <!-- <?php endif; ?> -->

             <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

                 

             </ul>

             <div class="placeholder"></div>

             <ul class="am-list am-list-static am-list-border">

                 <li ><a href="<?php echo U('article/articleList'); ?>">资料库<i class="am-icon-sm am-icon-angle-right"></i></a></li>

                 <li ><a href="<?php echo U('/mobile/article/detail/article_id/28'); ?>">关于我们<i class="am-icon-sm am-icon-angle-right"></i></a></li>

             </ul>

         </div>

         <!-- <?php if(is_array($goods_category_tree) || $goods_category_tree instanceof \think\Collection || $goods_category_tree instanceof \think\Paginator): $kr = 0; $__LIST__ = $goods_category_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($kr % 2 );++$kr;?> -->

         <div class="am-offcanvas-sub hide top_tab_<?php echo $v['id']; ?>">

            <h2 class="sub-header">

                <i class="am-icon-sm am-icon-angle-left" onclick="$('.am-offcanvas-sub').hide();"></i>

                <!-- <?php if($v[level] == 1): ?> -->

                <?php echo $v[name]; ?>

                <!-- <?php endif; ?> -->

            </h2>

             <ul class="am-list am-list-static am-list-border">

                 <li><a href="<?php echo U('Goods/goodsList',array('id'=>$v[id])); ?>">选购全部  <?php echo $v[name]; ?> <i class="am-icon-sm am-icon-angle-right"></i></a></li>

                 <li class="title">品类 </li>

                 <!-- <?php if(is_array($v['tmenu']) || $v['tmenu'] instanceof \think\Collection || $v['tmenu'] instanceof \think\Paginator): if( count($v['tmenu'])==0 ) : echo "" ;else: foreach($v['tmenu'] as $k2=>$v2): ?> -->

                 <!-- <?php if($v2[parent_id] == $v['id']): ?> -->

                 <li> <a href="<?php echo U('Goods/goodsList',array('id'=>$v2[id])); ?>"> <?php echo $v2[name]; ?><i class="am-icon-sm am-icon-angle-right"></i></a></li>

                 <!-- <?php endif; ?> -->

                <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

                 

             </ul>

             <ul class="am-list am-list-static am-list-border">

                 <li class="title">品牌 </li>

                 <!-- <?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->

                <!-- <?php if($vo[parent_cat_id] == $v[id]): ?> -->

                 <li> <a href="<?php echo U('Goods/goodsList',array('id'=>$v['id'],'brand_id'=>$vo[id])); ?>"> <img src="__STATIC__/imgs/brand_ala.png" /><?php echo $vo[name]; ?><i class="am-icon-sm am-icon-angle-right"></i></a></li>

             	<!-- <?php endif; ?> -->

                <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

             </ul>

         </div>

         <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->





         <!-- <?php if(is_array($country) || $country instanceof \think\Collection || $country instanceof \think\Paginator): $kr = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($kr % 2 );++$kr;?> -->

         <div class="am-offcanvas-sub hide cou_tab_<?php echo $v['id']; ?>">

            <h2 class="sub-header">

                <i class="am-icon-sm am-icon-angle-left" onclick="$('.am-offcanvas').click()"></i>

                <?php echo $v[name]; ?>

            </h2>

             <ul class="am-list am-list-static am-list-border">

                 

                 <!-- <?php if(is_array($v['tmenu']) || $v['tmenu'] instanceof \think\Collection || $v['tmenu'] instanceof \think\Paginator): if( count($v['tmenu'])==0 ) : echo "" ;else: foreach($v['tmenu'] as $k2=>$v2): ?> -->

                 <!-- <?php if($v2[parent_id] == $v['id']): ?> -->

                 <li><a href="<?php echo U('Goods/country',array('id'=>$v2[id])); ?>"><?php echo $v2[name]; ?><i class="am-icon-sm am-icon-angle-right"></i></a></li>

                 <!-- <?php endif; ?> -->

                <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

                 

             </ul>

             

         </div>

         <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->





     </div>

 </div>

<!-------------------------------- header部分 -------------------------------------->
<!-- <header id="header-simple"
        data-am-widget="header"
        class="am-header am-header-default">
    <div class="am-header-left am-header-nav">
        <a href="javascript:history.go(-1)" class="">
            <i class="am-header-icon am-icon-angle-left" style="font-size: 2.2rem;"></i>
        </a>
    </div>
    <h1 class="am-header-title">
        <?php echo $article['title']; ?>
    </h1>
</header> -->
<div class="bottomPlaceholder"></div>
<div class="bottomPlaceholder"></div>
<article class="article">
    <h1 class="am-header-title" style="margin-top: 30px;text-align: center;color: #227dbb;font-size:20px;">
        <?php echo $article['title']; ?>
    </h1>
    <?php echo htmlspecialchars_decode($content); ?>
</article>

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

