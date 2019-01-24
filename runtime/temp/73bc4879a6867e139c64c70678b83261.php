<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:51:"./template/mobile/new2/goods/ajaxtimeLimitShop.html";i:1522351444;}*/ ?>
<!-- <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
<div class="am-u-sm-6 am-u-md-4 item" onclick="location.href='<?php echo U('Goods/goodsInfo',array('id'=>$vo[goods_id])); ?>'">
    <div class="pro-img">
        <img src="<?php echo $vo['original_img']; ?>" />
    </div>
    <div class="pro-intro">
        <?php echo $vo['html']; ?>
        <span class="price">
             <i>¥</i><?php echo $vo['cx_price']; ?>
        </span>
        <span class="add">
            加入购物车
        </span>
        <input type="number" min="1" max="50" value="1">
    </div>
</div>
<!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->