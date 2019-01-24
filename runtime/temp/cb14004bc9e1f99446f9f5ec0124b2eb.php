<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./template/mobile/new2/cart/cart2.html";i:1542558914;s:45:"./template/mobile/new2/public/header_old.html";i:1526495718;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>填写订单--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
    <link rel="stylesheet" href="__STATIC__/old/css/style.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/old/css/iconfont.css"/>
    <script src="__STATIC__/old/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    <!--<script src="__STATIC__/js/zepto-1.2.0-min.js" type="text/javascript" charset="utf-8"></script>-->
    <script src="__STATIC__/old/js/style.js" type="text/javascript" charset="utf-8"></script>
    <script src="__STATIC__/old/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__STATIC__/old/js/layer.js"  type="text/javascript" ></script>
    <script src="__STATIC__/old/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="__STATIC__/css/style.css">
</head>
<body class="g4">

<style>
    div.cuptyp{
        box-sizing: content-box;
        border: 2px solid transparent;
    }
    div.checked {
        border: 2px solid #e23435;
    }
    .phoneclck{
        /*部分手机不能点击问题*/
        cursor: pointer
    }
</style>


<div class="classreturn loginsignup ">
    <div class="content">
        <div class="ds-in-bl return">
            <a href="javascript:history.go(-1)"><img src="__STATIC__/old/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>提交订单</span>
        </div>
    </div>
</div>
<form name="cart2_form" id="cart2_form" method="post">
    <input type="hidden" name="coupon_id" value=""/>
    <!--立即购买才会用到-s-->
    <input type="hidden" name="action" value="<?php echo \think\Request::instance()->param('action'); ?>">
    <input type="hidden" name="goods_id" value="<?php echo \think\Request::instance()->param('goods_id'); ?>">
    <!-- <?php if(is_array($cartList) || $cartList instanceof \think\Collection || $cartList instanceof \think\Paginator): $keys = 0; $__LIST__ = $cartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($keys % 2 );++$keys;?> -->
    <!-- <?php if($cart['ispack'] == 1): ?> -->
    <input type="hidden" name="pgoods_id[<?php echo $cart['goods_id']; ?>]" value="<?php echo $cart['goods_id']; ?>">
    <!-- <?php endif; ?> -->
    <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
	<input type="hidden" name="zhuituan" value="<?php echo (isset($zhuituan) && ($zhuituan !== '')?$zhuituan:'0'); ?>">
    <!-- <?php if($group_id != null): ?> -->
    <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
    <!-- <?php endif; ?> -->
    <input type="hidden" name="item_id" value="<?php echo \think\Request::instance()->param('item_id'); ?>">
    <!--<input type="hidden" name="goods_num" value="<?php echo \think\Request::instance()->param('goods_num'); ?>">-->
	<input type="hidden" name="goods_num" value="<?php echo $cart['goods_num']; ?>">
    <!--立即购买才会用到-e-->
    <div class="edit_gtfix">
        <a href="<?php echo U('Mobile/User/address_list',array('source'=>'cart2')); ?>">
            <div class="namephone fl">
                <div class="top">
                    <div class="le fl"><?php echo $address['consignee']; ?></div>
                    <div class="lr fl"><?php echo $address['mobile']; ?></div>
                </div>
                <div class="bot">
                    <i class="dwgp"></i>
                    <span><?php echo $address['address']; ?></span>
                </div>
                <input type="hidden" value="<?php echo $address['address_id']; ?>" name="address_id" /> <!--收货地址id-->
            </div>
            <div class="fr youjter">
                <i class="Mright"></i>
            </div>

        </a>
    </div>

    <!--商品信息-s-->
    <div class="ord_list fill-orderlist p">
        <div class="maleri30">
            <?php if(is_array($cartList) || $cartList instanceof \think\Collection || $cartList instanceof \think\Paginator): $i = 0; $__LIST__ = $cartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i;?>
                <div class="shopprice">
                    <div class="img_or fl"><img src="<?php echo goods_thum_images($cart[goods_id],100,100); ?>"/></div>
                    <div class="fon_or fl">
                        <h2 class="similar-product-text"><?php echo $cart[goods_name]; ?></h2>
                        <div><?php echo $cart[spec_key_name]; ?></div>
                    </div>
                    <div class="price_or fr">
                        <p class="red"><span>￥</span><span><?php echo $cart[goods_fee]; ?></span></p>
                        <p class="ligfill">x<?php echo $cart[goods_num]; ?></p>
                    </div>
                </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <!--商品信息-e-->

    <!--支持配送,发票信息-s-->
    <div class="information_dr">
        <div class="maleri30">
            <div class="invoice list7">
                <div class="myorder p">
                    <div class="content30">
                        <a class="takeoutps" href="javascript:void(0)">
                            <div class="order">
                                <div class="fl">
                                    <span>支持配送</span>
                                </div>
                                <div class="fr">
                                    <span id="postname" style="line-height: 1.2rem;">不选择，则按默认配送方式</span>
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--
            <div class="invoice list7">
                <div class="myorder p">
                    <div class="content30">
                        <a class="invoiceclickin" href="javascript:void(0)">
                            <div class="order">
                                <div class="fl">
                                    <span>发票信息</span>
                                </div>
                                <div class="fr">
                                    <span>纸质发票-个人<br>非图书商品-不开发票</span>
                                    <input class="txt1" style='display:none;' type="text" name="invoice_title" />
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div id="invoice" class="invoice list7" style="display: none;">
                <div class="myorder p">
                    <div class="content30">
                        <div class="incorise">
                            <span>发票抬头：</span>
                            <input type="text" name="" id="" value="" placeholder="xx单位或xx个人" />
                        </div>
                    </div>
                </div>
            </div>-->

            <script type="text/javascript">


                function get_invoice(){
                    var str="";
                    $.get("<?php echo U('Cart/invoice'); ?>", function(json) {
                        var data = eval("(" + json + ")");
                        if (data.status > 0) {

                            if(data.result.invoice_title==""){
                                $('#monad').hide();

                            }else{
                                $('#invoice_title').val(data.result.invoice_title);
                                $("#invoice_desc").val(data.result.invoice_desc);
                                $("#taxpayer").val(data.result.taxpayer);
                                str="纸质（"+data.result.invoice_title+"-明细）";
                                $("#danwei").attr("checked","checked");
                            }
                            if(data.result.invoice_title=="个人"){
                                $("#geren").attr("checked","checked");
                                $('#invoice_title').val("");
                                $("#invoice_desc").val("");
                                $("#taxpayer").val("");
                                $('#monad').hide();
                                $(".invoice_title").html("纸质（个人-明细）");
                                str="纸质（个人-明细）";
                            }
                            if (data.result.invoice_desc == "不开发票") {
                                $('#invoice_title').val("");
                                $("#invoice_desc").val(data.result.invoice_desc);
                                $("#taxpayer").val("");
                                $("#noincorises").attr("checked","checked");
                                str="不开发票";
                            }else{
//                        $('#monad,#invoice').show();
                                $("#detail").attr("checked","checked");
                            }
                            $(".invoice_title").html(str);

                        }else{
                            $("#geren").attr("checked","checked");
                            $('#monad').hide();
                            $("#noincorises").attr("checked","checked");
                        }
                    });
                }


            </script>


            <!--使用余额、积分-s-->

            <!--使用余额、积分-e-->
        </div>
    </div>
    <!--支持配送,发票信息-s-->



    <!--卖家留言-s-->
    <div class="customer-messa">
        <div class="maleri30">
            <p>用户备注（50字）</p>
            <textarea class="tapassa" onkeyup="checkfilltextarea('.tapassa','50')" name="user_note" rows="" cols="" placeholder="选填"></textarea>
            <span class="xianzd"><em id="zero">50</em>/50</span>
        </div>
    </div>
    <!--卖家留言-e-->

    <!--订单金额-s-->
    <div class="information_dr ma-to-20">
        <div class="maleri30">
            <div class="xx-list">
                <p class="p">
                    <span class="fl">商品金额：</span>
                    <span class="fr red"><span>￥</span><span><?php echo $cartPriceInfo['total_fee']; ?></span>元</span>
                </p>
                <p class="p">
                    <span class="fl">配送费用：</span>
                    <span class="fr red" ><span>￥</span><span id="postFee">0</span>元</span>
                </p>
                <p class="p">
                    <span class="fl">使用余额：</span>
                    <span class="fr red" ><span>-￥</span><span id="balance">0</span>元</span>
                </p>
                <p class="p">
                    <span class="fl">优惠活动：</span>
                    <span class="fr red" ><span>-￥</span><span id="order_prom_amount">0</span>元</span>
                </p>
            </div>
        </div>
    </div>
    <!--订单金额-e-->

    <!--提交订单-s-->
    <div class="mask-filter-div" style="display: none;"></div>
    <div class="payit fillpay ma-to-200">
        <div class="fr submit_price">
		
		<!-- <?php if($shiming_is == 1): ?> -->
            <!-- <?php if($user['usercode'] == null): ?> -->
                <a class="pay-btn editBasicMsg2" href="<?php echo U('user/editBasicMessage2'); ?>">请先实名认证</a>
            <!-- <?php elseif($user['paypwd'] == null): ?> -->
                <a class="pay-btn editBasicMsg2" href="<?php echo U('user/editBasicMessage2'); ?>">请先设置支付密码</a>
            <!-- <?php else: ?> -->
                <a href="javascript:void(0)" onclick="submit_order()">提交订单</a>
            <!-- <?php endif; ?> -->
        <!-- <?php else: ?> --> 
			<!-- <?php if($user['paypwd'] == null): ?> -->
                <a class="pay-btn editBasicMsg2" href="<?php echo U('user/editBasicMessage2'); ?>">请先设置支付密码</a>
            <!-- <?php else: ?> -->
                <a href="javascript:void(0)" onclick="submit_order()">提交订单</a>
            <!-- <?php endif; ?> -->
		<!-- <?php endif; ?> -->		
        </div>
        <div class="fl">
            <p><span class="pmo">应付金额：</span>￥<span id="payables"></span><span></span></p>
        </div>
    </div>
    <!--提交订单-e-->

    <!--配送弹窗-s-->
    <div class="losepay closeorder" style="display: ;">
        <div class="maleri30">
            <div class="l_top">
                <span>配送方式</span>
                <em class="turenoff"></em>
            </div>
            <div class="resonco">
                <?php if(is_array($shippingList) || $shippingList instanceof \think\Collection || $shippingList instanceof \think\Paginator): if( count($shippingList)==0 ) : echo "" ;else: foreach($shippingList as $k=>$v): ?>
                    <label >
                        <div class="radio">
                            <span class='che <?php if($k == 0): ?>check_t<?php endif; ?>' postname='<?php echo $v['name']; ?>'>
                                <i></i>
                                <input type="radio" id="<?php echo $v['code']; ?>" name="shipping_code" id="<?php echo $v['code']; ?>" value="<?php echo $v['code']; ?>" style="display: none;" <?php if($k == 0): ?> checked="checked" <?php endif; ?> onclick="ajax_order_price()" class="c_checkbox_t" />
                                <span><?php echo $v['name']; ?></span>
                                <!--<span>￥<?php echo $v['freight']; ?></span>-->
                            </span>
                        </div>
                    </label>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="submits_de bagrr" >确认</div>
    </div>
    <!--配送弹窗-e-->
</form>
<!--优惠券弹窗-s-->
<div class="chooseebitcard newchoosecar coupongg" >
    <div class="choose-titr">
        <span>店铺：<em id="cl"></em></span>
        <i class="closer" onclick="closer()"></i>
    </div>
    <div class="soldout_cp p" id="emptyCoupon" style="display: none">
        <img class="nmy" src="__STATIC__/old/images/nmy.png" alt="" />
        <p class="nzw">当前店铺暂无可使用的优惠券</p>
    </div>
    <div class="c_uscoupon">
        <div class="maleri30">
            <div class="no_get_coupon">
                <p class="canus">可用优惠劵<span>（以下是当前店铺可使用的优惠劵）</span></p>
                <?php if(is_array($userCartCouponList) || $userCartCouponList instanceof \think\Collection || $userCartCouponList instanceof \think\Paginator): $k = 0; $__LIST__ = $userCartCouponList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$userCoupon): $mod = ($k % 2 );++$k;?>
                    <div class="cuptyp" onclick="checkCoupon(this)" data-couponid="<?php echo $userCoupon[id]; ?>" data-conponname="<?php echo $userCoupon['coupon'][name]; ?>">
                        <a href="javascript:;">
                            <div class="le_pri">
                                <h1><em>￥</em><?php echo round($userCoupon['coupon'][money],0); ?></h1>
                                <p>满<?php echo $userCoupon['coupon'][condition]; ?>元可用</p>
                            </div>
                            <div class="ri_int">
                                <div class="to_two">
                                    <span class="ba">商城券</span>
                                    <span><?php echo $userCoupon['coupon'][name]; ?></span>
                                </div>
                                <div class="bo_two">
                                    <span class="cp9">有效期：<?php echo date('Y.m.d',$userCoupon['coupon'][use_start_time]); ?>-<?php echo date('Y.m.d',$userCoupon['coupon'][use_end_time]); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>
<!--优惠券弹窗-e-->
<script type="text/javascript">
    $(document).ready(function(){

        showPostName();
        //显示隐藏支付密码
        $(document).on('change', '#pay_points,#user_money', function() {
            var user_money = $.trim($('#user_money').val());
            var pay_points = $.trim($('#pay_points').val());
            if ((user_money !== '' && user_money >0) || (pay_points !== '' || pay_points >0)) {
                $('#paypwd_view').show();
            } else {
                $('#paypwd_view').hide();
            }
        });
        //有使用余额，积分就得用密码
        if($('#user_money').val() > 0 || $('#pay_points').val() > 0){
            $('#paypwd_view').show();
        }
        $('.radio .che').bind('click',function(){
            //选择配送方式
            $(this).addClass('check_t')
                .parent().parent().siblings('label').find('.che').removeClass('check_t');
            //选择配送方式显示到支持配送栏
            showPostName()
        });
        ajax_order_price(); // 计算订单价钱
    });

    //显示选择的物流公司
    function showPostName(){
        $('#postname').text($('.radio .check_t').attr('postname'));
    }

    //兑换优惠券
    function wield(){
        var couponCode = $('#couponCode').val();
        if(couponCode !=''){
            $.ajax({
                type : "POST",
                url:'/index.php?m=Home&c=Cart&a=cartCouponExchange&t='+Math.random(),
                data : {coupon_code:couponCode},
                dataType: "json",
                success: function(data){
                    if(data.status != 1){
                        showErrorMsg(data.msg);
                        // 登录超时
                        if(data.status == -100){
                            location.href ="<?php echo U('Mobile/User/login'); ?>";
                            return false;
                        }
                    }else{
                        showErrorMsg(data.msg);
                        window.location.href=''
                    }
                }
            });
        }else{
            showErrorMsg('请输入兑换码！');
        }
    }
    // 获取订单价格
    function ajax_order_price()
    {
        $.ajax({
            type : "POST",
            url:'/index.php?m=Mobile&c=Cart&a=cart3&act=order_price&t='+Math.random(),
            data : $('#cart2_form').serialize(),
            dataType: "json",
            success: function(data){
                if(data.status == -3 || data.status == -4){
                    showErrorMsg(data.msg);
                    refresh_price(data);
                    $('.submit_price a').addClass("disable");
                }else if(data.status != 1){
                    //执行有误
                    $('#coupon_div').show();
                    showErrorMsg(data.msg);
                    // 登录超时
                    if(data.status == -100){
                        location.href ="<?php echo U('Mobile/User/login'); ?>";
                        return false;
                    }
                }else{
                    $('.submit_price a').removeClass("disable");
                    refresh_price(data);
                }

            }
        });
    }

    function refresh_price(data){
        $("#balance").text(data.result.balance);// 余额
        $("#pointsFee").text(data.result.pointsFee);// 积分支付
        $("#order_prom_amount").text(data.result.order_prom_amount);// 订单 优惠活动
        $("#postFee").text(data.result.postFee); // 物流费
        if(data.result.couponFee == null){
            $("#couponFee").text(0);// 优惠券
        }else{
            $("#couponFee").text(data.result.couponFee);// 优惠券
        }
        $("#payables").text(data.result.payables);// 应付
    }

    // 提交订单
    ajax_return_status = 1; // 标识ajax 请求是否已经回来 可以进行下一次请求
    function submit_order() {
        if($('.submit_price a').hasClass("disable")){
            return;
        }
        if (ajax_return_status == 0)
            return false;
        ajax_return_status = 0;
        $.ajax({
            type: "POST",
            url: "<?php echo U('Mobile/Cart/cart3'); ?>",//+tab,
            data: $('#cart2_form').serialize() + "&act=submit_order",// 你的formid
            dataType: "json",
            success: function (data) {
                if (data.status != '1') {
                    showErrorMsg(data.msg);  //执行有误
                    // 登录超时
                    if (data.status == -100)
                        location.href = "<?php echo U('Mobile/User/login'); ?>";

                    ajax_return_status = 1; // 上一次ajax 已经返回, 可以进行下一次 ajax请求

                    return false;
                }
                $("#postFee").text(data.result.postFee); // 物流费
                if(data.result.couponFee == null){
                    $("#couponFee").text(0);// 优惠券
                }else{
                    $("#couponFee").text(data.result.couponFee);// 优惠券
                }
                $("#balance").text(data.result.balance);// 余额
                $("#pointsFee").text(data.result.pointsFee);// 积分支付
                $("#payables").text(data.result.payables);// 应付
                $("#order_prom_amount").text(data.result.order_prom_amount);// 订单 优惠活动
                showErrorMsg('订单提交成功，跳转支付页面!');
                location.href = "/index.php?m=Mobile&c=Cart&a=cart4&order_id=" + data.result;
            }
        });
    }

    $(function(){
        get_invoice();
        //显示配送弹窗
        $('.takeoutps').click(function(){
            cover()
            $('.mask-filter-div').show();
            $('.losepay').show();
        })
        //关闭选择物流
        $('.turenoff').click(function(){
            undercover()
            $('.mask-filter-div').hide();
            $('.losepay').hide();
        })

        $('.submits_de').click(function(){
            $('.mask-filter-div').hide();
            $('.losepay').hide();
        })

        //显示隐藏使用发票信息
        $('.invoiceclickin').click(function(){
            get_invoice();
            $('#invoice').toggle(300);
        })
//        //显示隐藏使用余额/积分
//        $('.remain').click(function(){
//            $('#balance-li').toggle(300);
//        })
    })

    //优惠券
    $(function(){
        $(document).on('click','.coupon_click',function(){
            cover();
            $('.coupongg').show();
            $('html,body').addClass('ovfHiden');
            var coupon_length = <?php echo count($userCartCouponList); ?>;
            if(coupon_length == 0){
                $('.soldout_cp').show();
                $('.no_get_coupon').hide();
            }else{
                $('.no_get_coupon').show();
                $('.soldout_cp').hide();
            }
        })
    })

    //关闭优惠券弹窗
    function closer(){
        undercover();
        $('.newchoosecar').hide();
        $('html,body').removeClass('ovfHiden');
    }

    //选择优惠券
    function checkCoupon(obj){
        $(obj).toggleClass('checked').siblings('.cuptyp').removeClass('checked')
        if($(obj).hasClass('checked')){
            var conponname = $(obj).data('conponname');
            var couponid = $(obj).data('couponid');
            $('.counpn_name').text(conponname); //优惠券名称显示出来
            $("input[name^='coupon_id']").val(couponid);  //优惠券ID写到隐藏表单
        }else{
            $("input[name^='coupon_id']").val('');  //优惠券ID写到隐藏表单
            $('.counpn_name').text('未使用');
        }
        closer();
        ajax_order_price();
    }
</script>
</body>
</html>