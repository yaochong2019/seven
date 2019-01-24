<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:45:"./template/mobile/new2/goods/ajaxComment.html";i:1526442218;}*/ ?>
<!-- <?php if($count > 0): ?> -->
<!-- <?php if(is_array($commentlist) || $commentlist instanceof \think\Collection || $commentlist instanceof \think\Paginator): if( count($commentlist)==0 ) : echo "" ;else: foreach($commentlist as $k=>$v): ?> -->
<article class="am-comment">
    <a href="javascript:void(0)">
        <img src="<?php echo (isset($v['head_pic']) && ($v['head_pic'] !== '')?$v['head_pic']:'__STATIC__/images/headPic.jpg'); ?>" class="am-comment-avatar" alt=""  width="48" height="48"/>
    </a>
    <div class="am-comment-main">
        <header class="am-comment-hd">
            <div class="am-comment-meta">
                <a href="#link-to-user" class="am-comment-author"><?php echo getsubstr($v['username'],0,6); ?></a>
                <span class="comment-stars"> <i class="am-icon-star"></i> <i class="am-icon-star"></i> <i class="am-icon-star-half"></i> <i class="am-icon-star-o"></i> <i class="am-icon-star-o"></i></span>
                <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><?php echo date("Y-m-d H:i:s",$v['add_time']); ?></time>
            </div>
        </header>

        <div class="am-comment-bd">
            <p><?php echo htmlspecialchars_decode($v['content']); ?></p>
            <!--<volist name="$v['img']" id="v2" >-->
            <img src="<?php echo $v2; ?>" alt="">
            <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
            <!--<?php if($v['is_add_content'] == 1): ?>-->
            <div class="comment-add">
                <p>后续追加</p>
                <p>不错不错</p>
                <!--<?php if(is_array($v['img']) || $v['img'] instanceof \think\Collection || $v['img'] instanceof \think\Paginator): if( count($v['img'])==0 ) : echo "" ;else: foreach($v['img'] as $key=>$v2): ?>-->
                <img src="__STATIC__/imgs/pro_3.jpg" alt="">
                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
            </div>
            <!--<?php endif; ?>-->
        </div>
    </div>
</article>
<!-- </foreach> -->
<!-- <?php else: ?> -->
<!-- <?php endif; ?>-->