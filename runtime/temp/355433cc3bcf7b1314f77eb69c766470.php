<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/pc/jinghui/goods/ajaxComment.html";i:1526951838;}*/ ?>
<!--<?php if($commentlist == null): ?>-->
<div style="width: 100%;height: 300px;margin: 20px auto;text-align: center;line-height: 300px;">
                        暂时没有评论！
                    </div>
<!--<?php else: ?>-->
<!--<?php if(is_array($commentlist) || $commentlist instanceof \think\Collection || $commentlist instanceof \think\Paginator): $i = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>-->
<div class="comment-item" id="content">
<!--<?php if($v[is_anonymous] == 1): ?>-->
<img class="avatar" src="__STATIC__/images/headPic.jpg"/>
<div class="item-right" style="text-align:left;">
<div class="username">匿名用户</div>
<!--<?php else: ?>-->
<img class="avatar" src="<?php echo (isset($v['head_pic']) && ($v['head_pic'] !== '')?$v['head_pic']:'__STATIC__/images/headPic.jpg'); ?>" alt="">
<div class="item-right">
<div class="username"><?php echo getsubstr($v['username'],0,6); ?></div>
<!--<?php endif; ?>-->
<div class="comment-level" data-level="<?php echo $v['goods_rank']; ?>"></div>
<div class="content">
<div class="text"><?php echo htmlspecialchars_decode($v['content']); ?></div>
<div class="img-list">
<!--<?php if(is_array($v['img']) || $v['img'] instanceof \think\Collection || $v['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>-->
<img src="<?php echo $v2; ?>"  alt=""/>
<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
</div>
<div id="img_<?php echo $v['comment_id']; ?>"><span><?php echo date("Y-m-d H:i:s",$v['add_time']); ?></span>
</div>
</div>
		<!--<?php if($v['is_add_content'] == 1): ?>-->
		<div class="after-add-comment" style="margin-left: 30px;">
		<div class="title">后续追加</div>
		<div class="content">
		<div class="text">1111</div>
		<div class="img-list">
		<!--<?php if(is_array($v['img']) || $v['img'] instanceof \think\Collection || $v['img'] instanceof \think\Paginator): if( count($v['img'])==0 ) : echo "" ;else: foreach($v['img'] as $key=>$v2): ?>-->
		<img src="<?php echo $v2; ?>" alt="">
		<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
		</div>
		</div>
		</div>
		</div>
		<!--<?php endif; ?>-->
	</div>
</div>
<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
<div><?php echo $page; ?></div>
<!--<?php endif; ?>-->
<script type="text/javascript">
//用户评价评分
	function userCommentLevel(){
	    var commentItem = $(".comment-level");
        commentItem.each(function(index){
            var level = $(this).attr("data-level");
            $(this).raty({
                readOnly: true,
                score: level,
                hints:['糟糕','差劲','正常','良好','华丽'],
                path: '__STATIC__/vendor/raty/images/'
            });
        })
	}
	userCommentLevel()
</script>