<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:38:"./template/pc/jinghui/index/index.html";i:1542429252;s:40:"./template/pc/jinghui/public/header.html";i:1542287950;s:40:"./template/pc/jinghui/public/footer.html";i:1534148398;}*/ ?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="renderer" content="webkit" />

    <meta name="keyword" content="" />

    <meta name="description" content="" />

    <title>净会-<?php echo $tpshop_config['shop_info_store_title']; ?></title>

    <link rel="stylesheet" href="__STATIC__/css/normalize.css">

    <link rel="stylesheet" href="__STATIC__/css/iconfont.css">

    <link rel="stylesheet" href="__STATIC__/vendor/swiper/css/swiper.min.css">

    <link rel="stylesheet" href="__STATIC__/css/main.css">

    <script src="__PUBLIC__/js/global.js"></script>

    <script src="__STATIC__/vendor/jquery.min.js"></script>

    <script src="__PUBLIC__/js/pc_common.js"></script>

    <script src="__STATIC__/vendor/layer/layer.js"></script>

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
<style>
#main-cate .item:hover img{
border-bottom:none;
}
</style>
</head>

<body>

<!--header-->

<header class="header">

    <div class="container clearfix">

        <div class="header-left fl clearfix">

            <a class="logo" href="/">Logo</a>

            <img src="__STATIC__/images/basic/subject.png" alt="">

        </div>

        <div class="header-right fr clearfix">

            <div class="fast-menu fr" <?php if($user['user_id'] != null): ?> style="width: 140px;" <?php endif; ?>>

                <!--<?php if($user['user_id'] == null): ?>-->

                <a href="<?php echo U('Home/user/login'); ?>">登录</a><span>|</span>

                <a href="<?php echo U('Home/content/index'); ?>">客服</a><span>|</span>

                <a href="<?php echo U('Home/Order/order_list'); ?>">订单</a><br>

                <a href="<?php echo U('/Home/Article/detail/article_id/28'); ?>">我们</a><span>|</span>

                <!--<a href="<?php echo U('Home/Order/order_list'); ?>">订单</a>-->

                <!--<a href="<?php echo U('Home/article/about'); ?>">我们</a><span>|</span>-->

                <a href="<?php echo U('Home/article/articleList'); ?>">资料</a><span>|</span>

                <a href="<?php echo U('Home/cart/index'); ?>" class="cart"><i class="iconfont"><img src="__STATIC__/images/pc_shop.png" alt=""></i><span class="badge shop-nums" id="cart_quantity">0</span></a>

                <!--<a href="<?php echo U('Home/cart/index'); ?>" class="cart"><i class="iconfont icon-cart"></i><span class="badge shop-nums" id="cart_quantity">12</span></a>-->

                <!--<?php else: ?>-->
                <div class="login-info" style="margin-top:-22px;">
                    <a href="<?php echo U('Home/user/index'); ?>" style="overflow: hidden;height: 20px;width: 70%;"><?php echo !empty($user['nickname'])?$user['nickname'] :$user['username']; ?></a><br>

                    <a href="<?php echo U('Home/user/logout'); ?>">退出</a><span>|</span>

                    <a href="<?php echo U('Home/content/index'); ?>">客服</a><span>|</span>

                    <a href="<?php echo U('Home/Order/order_list'); ?>">订单</a>

                    <a href="<?php echo U('/Home/Article/detail/article_id/28'); ?>">我们</a><span>|</span>

                    <a href="<?php echo U('Home/article/articleList'); ?>">资料</a><span>|</span>

                    <a href="<?php echo U('Home/cart/index'); ?>" class="cart"><i class="iconfont"><img src="__STATIC__/images/pc_shop.png" alt=""></i><span class="badge shop-nums" id="cart_quantity"><?php echo $car_num; ?></span></a>
                </div>
                <!--<?php endif; ?>-->



            </div>

            <div class="header-search fr">

                <form id="searchForm" method="get" action="<?php echo U('Home/Goods/search'); ?>">

                    <input placeholder="输入想要的商品或品牌" class="text ecsc-search-input" type="text" autocomplete="off" name="q" id="q" value="<?php echo \think\Request::instance()->param('q'); ?>" />

                    <button type="submit" class="btn">搜索</button>

                    <script src="__STATIC__/vendor/jquery.min.js"></script>

                    <script type="text/javascript">

                    ;(function($){

                        $.fn.extend({

                            donetyping: function(callback,timeout){

                                timeout = timeout || 1e3;

                                var timeoutReference,

                                        doneTyping = function(el){

                                            if (!timeoutReference) return;

                                            timeoutReference = null;

                                            callback.call(el);

                                        };

                                return this.each(function(i,el){

                                    var $el = $(el);

                                    $el.is(':input') && $el.on('keyup keypress',function(e){

                                        if (e.type=='keyup' && e.keyCode!=8) return;

                                        if (timeoutReference) clearTimeout(timeoutReference);

                                        timeoutReference = setTimeout(function(){

                                            doneTyping(el);

                                        }, timeout);

                                    }).on('blur',function(){

                                        doneTyping(el);

                                    });

                                });

                            }

                        });

                    })(jQuery);

                    function searchWord(words){

                        $('#q').val(words);

                        $('#searchForm').submit();

                    }

                    function search_key(){

                        var search_key = $.trim($('#q').val());

                        if(search_key != ''){

                            $.ajax({

                                type:'post',

                                dataType:'json',

                                data: {key: search_key},

                                url:"<?php echo U('Home/Api/searchKey'); ?>",

                            });

                        }

                    }

                </script>

                </form>

            </div>

        </div>

    </div>

</header>

<!--nav-->

<nav class="nav">

    <div class="container">

        <ul class="list" id="navList">

            <li>

                <a href="<?php echo U('index/index'); ?>">首页</a>

            </li>

            <!-- <?php if(is_array($goods_category_tree) || $goods_category_tree instanceof \think\Collection || $goods_category_tree instanceof \think\Paginator): $kr = 0; $__LIST__ = $goods_category_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($kr % 2 );++$kr;?> -->

            <?php if($v[level] == 1): ?>

            <li >

                <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id])); ?>" title="<?php echo $v[name]; ?>"><?php echo $v[name]; ?></a>

                <?php endif; ?>

                <div class="son-menu clearfix">

                    <div class="son-menu-cate fl">

                        <div class="title">品类</div>

                        <div class="list">

                            <?php if(is_array($v['tmenu']) || $v['tmenu'] instanceof \think\Collection || $v['tmenu'] instanceof \think\Paginator): if( count($v['tmenu'])==0 ) : echo "" ;else: foreach($v['tmenu'] as $k2=>$v2): if($v2[parent_id] == $v['id']): ?>

                            <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id])); ?>" target="_blank"><?php echo $v2[name]; ?></a>

                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>

                        </div>

                    </div>

                    <div class="son-menu-brand fr">

                        <div class="title">品牌</div>

                        <div class="brand-list">

                            <div class="scroll-list-btn">

                               <a class="food-brand-list-up" href="javascript:;"><i class="iconfont brand-icon-up"><img src="__STATIC__/images/brand-icon.png" alt=""></i></a>

                            </div>

                            <div class="food-sub-menu-scroll">

                                <div class="content swiper-wrapper">

                                    

                                    <?php $ji = 1?>

                                   <!-- <?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $_keys = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($_keys % 2 );++$_keys;?>  -->



                                    <!-- <?php if($vo[parent_cat_id] == $v[id]): ?> -->

                                    <?php if($ji % 8 == 1){?>

                                    <div class="list swiper-slide">

                                    <?php }?>

                                        <a href="<?php echo U('Goods/goodsList',array('id'=>$v['id'],'brand_id'=>$vo[id])); ?>" style="height: 66px;">

                                            <img src="<?php echo $vo[logo]; ?>" alt="<?php echo $vo[name]; ?>" width="100%" style="height: 40px;">

                                            <p style="padding: 0;margin: 0;box-sizing: border-box;"><?php echo $vo[name]; ?></p>

                                        </a>

                                    <?php  if($ji % 8 == 0){?>

                                    </div>

                                    <?php } $ji++;?>

                                    <!-- <?php endif; ?> -->



                                    <?php  if($_keys == count($brand)){?>

                                    </div>

                                    <?php } ?>



                                    <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

                                    

                            </div>

                            

                            

                        </div>

                        <div class="scroll-list-btn">

                                <a class="food-brand-list-down" href="javascript:;"><i class="iconfont brand-icon-down"><img src="__STATIC__/images/brand-icon.png" alt=""></i></a>

                            </div>

                    </div>

                </div>

            </li>

            <li>

            <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

            <li class="last">

                <a href="<?php echo U('Goods/timeLimitShop'); ?>">限时购</a>

            </li>

        </ul>

        <script type="text/javascript">

        $('#navList a').each(function(){

            if ($(this)[0].href==String(window.location)) {

                $(this).parent().addClass('active');

            }

        });

        </script>

    </div>

</nav>

<!--banner-->

<section id="banner" class="container">

    <div class="banner-scroll">

        <div class="swiper-wrapper">

        <!--<?php $pid =2;$ad_position = M("ad_position")->cache(true,JHSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1547683200 and end_time > 1547683200 ")->order("orderby desc")->cache(true,JHSHOP_CACHE_TIME)->limit("5")->select();
if(is_array($ad_position) && !in_array($pid,array_keys($ad_position)) && $pid)
{
  M("ad_position")->insert(array(
         "position_id"=>$pid,
         "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ",
         "is_open"=>1,
         "position_desc"=>CONTROLLER_NAME."页面",
  ));
  delFile(RUNTIME_PATH); // 删除缓存
  \think\Cache::clear();  
}


$c = 5- count($result); //  如果要求数量 和实际数量不一样 并且编辑模式
if($c > 0 && I("get.edit_ad"))
{
    for($i = 0; $i < $c; $i++) // 还没有添加广告的时候
    {
      $result[] = array(
          "ad_code" => "/public/images/not_adv.jpg",
          "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid",
          "title"   =>"暂无广告图片",
          "not_adv" => 1,
          "target" => 0,
      );  
    }
}
foreach($result as $key=>$v1):       
    
    $v1[position] = $ad_position[$v1[pid]]; 
    if(I("get.edit_ad") && $v1[not_adv] == 0 )
    {
        $v1[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; // 广告半透明的样式
        $v1[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v1[ad_id]";        
        $v1[title] = $ad_position[$v1[pid]][position_name]."===".$v1[ad_name];
        $v1[target] = 0;
    }
    ?>-->

            <div class="swiper-slide" style="width: 1500px;">

            <a href="<?php echo $v1[ad_link]; ?>" <?php if($v1['target'] == 1): ?>target="_blank"<?php endif; ?>>

                <img src="<?php echo $v1[ad_code]; ?>" title="<?php echo $v1[title]; ?>" alt="<?php echo $v1[title]; ?>" width="100%">

            </a>

            </div>

        <!--<?php endforeach; ?>-->

        </div>

        <!-- Add Pagination -->
        <div class="banner-pagination"></div>

        <div class="banner-button banner-button-next"><i class="iconfont icon-more"></i></div>

        <div class="banner-button banner-button-prev"><i class="iconfont icon-back"></i></div>

    </div>

</section>

<!--main cate-->

<section id="main-cate" class="container">

    <div class="cont clearfix">

    <!--<?php if(is_array($country) || $country instanceof \think\Collection || $country instanceof \think\Paginator): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->

        <div class="item">

            <?php if($vo[level] == 1): ?>
			<a href="<?php echo U('Home/Goods/country',array('id'=>$vo[id])); ?>">
            <span><img src="<?php echo $vo[image]; ?>" alt="<?php echo $vo[name]; ?>"></span>
			</a>
            <?php endif; ?>

            <!--<div class="cate-son-menu">

                <div class="list">-->

                <!--<?php if(is_array($vo['tmenu']) || $vo['tmenu'] instanceof \think\Collection || $vo['tmenu'] instanceof \think\Paginator): if( count($vo['tmenu'])==0 ) : echo "" ;else: foreach($vo['tmenu'] as $k2=>$vo2): ?>-->

                    <?php if($vo2[parent_id] == $vo['id']): ?>

                    <!--<a href="<?php echo U('Home/Goods/country',array('id'=>$vo2[id])); ?>"><?php echo $vo2[name]; ?></a>

                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>-->

                <!--</div>

            </div>-->

        </div>

    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->

    </div>

</section>

<?php if($cateList['recommend'] != null): ?>

<div class="container">

    <section class="home-product" id="special-product">

        <div class="title">

            <span class="name">特色产品</span>

            <div class="btn">

                <a class="special-product-prev" href="javascript:;"><i class="iconfont icon-back"></i></a>

                <span class="special-product-scroll-page">1/6</span>

                <a class="special-product-next" href="javascript:;"><i class="iconfont icon-more"></i></a>

            </div>

        </div>

        <div class="cont special-product-scroll">

            <div class="swiper-wrapper">

            <?php if(is_array($cateList['recommend']) || $cateList['recommend'] instanceof \think\Collection || $cateList['recommend'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cateList['recommend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ng): $mod = ($i % 2 );++$i;?>

                <div class="swiper-slide list-item stop-swiping">

                    <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$ng[goods_id])); ?>">

                        <div class="img">

                            <img src="<?php echo goods_thum_images($ng[goods_id],200,200); ?>" alt="">

                        </div>

                    </a>

                        <div class="product-name" style="margin-bottom: 10px;">

                            <?php echo getSubstr($ng[goods_name],0,15); ?>

                        </div>

                        <div class="product-handle" style="margin-bottom: 20px;">

                            <span class="price">￥<i><?php echo $ng[shop_price]; ?></i></span>

                            <div class="add-cart">

                                <input value="1" id="num_<?php echo $ng[goods_id]; ?>" class="cnt" type="text" />

                                <a class="addCartBtn" href="javascript:;" onclick="AjaxAddCart(<?php echo $ng[goods_id]; ?>,$('#num_'+<?php echo $ng[goods_id]; ?>).val());">加入购物车</a>

                            </div>

                        </div>

                </div>

            <?php endforeach; endif; else: echo "" ;endif; ?>

            </div>

        </div>

    </section>

</div>

<?php endif; ?>

<!--new product-->

<?php if($cateList['new'] != null): ?>

<div class="container" style="margin-top:20px;">

    <section class="home-product" id="hot-product">

        <div class="title">

            <span class="name">新品上市</span>

            <div class="btn">

                <a class="special-product-prev" href="javascript:;"><i class="iconfont icon-back"></i></a>

                <span class="special-product-scroll-page">1/6</span>

                <a class="special-product-next" href="javascript:;"><i class="iconfont icon-more"></i></a>

            </div>

        </div>

        <div class="cont special-product-scroll">

            <div class="swiper-wrapper">

                <!--<?php if(is_array($cateList['new']) || $cateList['new'] instanceof \think\Collection || $cateList['new'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cateList['new'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ng): $mod = ($i % 2 );++$i;?>-->

                <div class="swiper-slide list-item stop-swiping">

                    <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$ng[goods_id])); ?>">

                        <div class="img">

                            <img src="<?php echo goods_thum_images($ng[goods_id],200,200); ?>" alt="">

                        </div>

                    </a>

                        <div class="product-name" style="margin-bottom: 10px;">

                            <?php echo getSubstr($ng[goods_name],0,15); ?>

                        </div>

                        <div class="product-handle" style="margin-bottom: 20px;">

                            <span class="price">￥<i><?php echo $ng[shop_price]; ?></i></span>

                            <div class="add-cart">

                                <input value="1" id="num_<?php echo $ng[goods_id]; ?>" class="cnt" type="text" />

                                <a class="addCartBtn" href="javascript:;" onclick="AjaxAddCart(<?php echo $ng[goods_id]; ?>,$('#num_'+<?php echo $ng[goods_id]; ?>).val());">加入购物车</a>

                            </div>

                        </div>

                </div>

                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->

            </div>

        </div>

    </section>

</div>

<?php endif; ?>

<!--product advantage-->

<div class="container">

    <div class="advantage clearfix">

        <div class="item">

            <div class="icon icon1"></div>

            <div class="text">

                <div class="s1">商品保障</div>

                <div class="s2">海外自采 海关监管</div>

            </div>

        </div>

        <div class="item">

            <div class="icon icon2"></div>

            <div class="text">

                <div class="s1">低价保障</div>

                <div class="s2">全新模式 性价比最高</div>

            </div>

        </div>

        <div class="item">

            <div class="icon icon3"></div>

            <div class="text">

                <div class="s1">速度保障</div>

                <div class="s2">最快2小时出仓</div>

            </div>

        </div>

        <div class="item">

            <div class="icon icon4"></div>

            <div class="text">

                <div class="s1">退货保障</div>

                <div class="s2">直接退货到国内地址</div>

            </div>

        </div>

    </div>
</div>
    <!--footer-->
<div class="container" style="max-width:none;padding:0;">
<footer class="footer">

    <div id="foot">

        <p class="p" style="margin-bottom: 20px;font-size:15px; ">

        <a href="<?php echo U('/Home/Article/detail/article_id/28'); ?>">关于我们</a><span>|</span>

              <a href="<?php echo U('/Home/Article/detail/article_id/37'); ?>">服务条款</a><span>|</span>

              <a href="<?php echo U('/Home/Article/detail/article_id/30'); ?>">免责声明</a><span>|</span>

              <a href="<?php echo U('/Home/Article/detail/article_id/31'); ?>">隐私声明</a><span>|</span>

              <a href="<?php echo U('/Home/Article/detail/article_id/32'); ?>">帮助中心</a><span>|</span>
              
              <a href="<?php echo U('/Home/Content/index'); ?>">联系我们</a><span>|</span>

            <?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article` where cat_id = 5 and is_open=1");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from `__PREFIX__article` where cat_id = 5 and is_open=1"); 
                                    S("sql_".$md5_key,$sql_result_v,86400);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>

                <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v[article_id])); ?>"><?php echo $v[title]; ?></a>

                <span>|</span>

            <?php endforeach; ?>

        </p>

        <div>

        <p class="p">

        服务热线：<?php echo $tpshop_config['shop_info_phone']; ?>&nbsp&nbsp 邮箱：contact@pure-seven.com&nbsp&nbsp

        </p>
        <script>
			var myDate = new Date();
			var nowyear = myDate.getFullYear();
		</script>
		
        <p class="p copyright">Copyright&nbsp@&nbsp2018 浙江净会电子商务有限公司&nbsp<?php echo $tpshop_config['shop_info_record_no']; ?></p>

        </div>


</footer>
</div>




<script src="__STATIC__/vendor/swiper/js/swiper.min.js"></script>

<script src="__STATIC__/js/main.js"></script>

<script>

        new Swiper('.brand', {

            direction: 'vertical',

            autoHeight: true,

            slidesPerView: 4,

            spaceBetween: 0,

            slidesPerGroup: 4,

            navigation: {

                nextEl: '.food-brand-list-up',

                prevEl: '.food-brand-list-down'

            },

            observeParents:true

        });

    //二级菜单下的品牌滚动

    new Swiper('.food-sub-menu-scroll', {

        direction: 'vertical',

        autoHeight: true,

        navigation: {

            nextEl: '.food-brand-list-up',

            prevEl: '.food-brand-list-down'

        },

        observer:true,

        observeParents:true

    });



    //banner

    new Swiper('.banner-scroll', {

        autoHeight: true,

        navigation: {

            nextEl: '.banner-button-next',

            prevEl: '.banner-button-prev'

        },
        pagination: {
            el: '.banner-pagination',
            clickable: true,
      },

    });


    //特色产品

    function specialProductScrollInit(){



        var obj = $("#special-product");

        var page = obj.find(".special-product-scroll-page");

        var items = obj.find(".list-item");

        var currentPage = 1;

        var specialProTotalPage = Math.ceil(items.length/5);



        page.html(currentPage+"/"+specialProTotalPage);



        new Swiper('#special-product .special-product-scroll', {

            slidesPerView: 5,

            spaceBetween: 0,

            slidesPerGroup: 5,

            navigation: {

                nextEl: '#special-product .special-product-next',

                prevEl: '#special-product .special-product-prev'

            },

            on:{

                slideChangeTransitionEnd: function(){

                    currentPage = Math.ceil(this.activeIndex/5)+1;

                    page.html(currentPage+"/"+specialProTotalPage);

                }

            },
            noSwiping : true,
            noSwipingClass : 'stop-swiping',

        });

    }

    specialProductScrollInit();

    //新品上市

    function hotProductScrollInit(){

        var obj = $("#hot-product");

        var page = obj.find(".special-product-scroll-page");

        var items = obj.find(".list-item");

        var currentPage = 1;

        var specialProTotalPage = Math.ceil(items.length/5);

        page.html(currentPage+"/"+specialProTotalPage);



        new Swiper('#hot-product .special-product-scroll', {

            slidesPerView: 5,

            spaceBetween: 0,

            slidesPerGroup: 5,

            navigation: {

                nextEl: '#hot-product .special-product-next',

                prevEl: '#hot-product .special-product-prev'

            },

            on:{

                slideChangeTransitionEnd: function(){

                    currentPage = Math.ceil(this.activeIndex/5)+1;

                    page.html(currentPage+"/"+specialProTotalPage);

                }

            },
            noSwiping : true,
            noSwipingClass : 'stop-swiping',

        });

    }

    hotProductScrollInit();
</script>

</body>

</html>