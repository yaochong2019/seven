<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:50:"./template/pc/jinghui/goods/ajaxtimeLimitShop.html";i:1522351358;}*/ ?>
<!-- <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
<div class="product-item">
    <a href="<?php echo U('Goods/goodsInfo',array('id'=>$vo[goods_id])); ?>">
        <div class="img">
            <img src="<?php echo $vo['original_img']; ?>" alt="">
        </div>
        <div class="product-name">
            <?php echo $vo['goods_name']; ?>
        </div>
        <div class="product-handle">
            <span class="price">$<i><?php echo $vo['cx_price']; ?></i></span>
            <!-- <span class="old-price">$<?php echo $vo['shop_price']; ?></span> -->
            <div class="add-cart">
                <button data-id="1" class="addCartBtn">加入购物车</button>
            </div>
        </div>
    </a>
</div>
<!-- <?php endforeach; endif; else: echo "" ;endif; ?>