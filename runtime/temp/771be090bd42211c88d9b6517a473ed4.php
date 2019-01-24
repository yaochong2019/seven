<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"./application/admin/view/order/ajax_return_list.html";i:1522351662;}*/ ?>
<table>
 	<tbody>
 	<?php if(empty($list) == true): ?>
 		<tr data-id="0">
	        <td class="no-data" align="center" axis="col0" colspan="50">
	        	<i class="fa fa-exclamation-circle"></i>没有符合条件的记录
	        </td>
	     </tr>
	<?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
  	<tr>
        <td class="sign" axis="col0">
          <div style="width: 24px;"><i class="ico-check"></i></div>
        </td>
        <td align="left" abbr="order_sn" axis="col3" class="">
          <div style="text-align: left; width: 160px;" class=""><a href="<?php echo U('Admin/order/detail',array('order_id'=>$items['order_id'])); ?>"><?php echo $items['order_sn']; ?></a></div>
        </td>
        <td align="left" abbr="consignee" axis="col4" class="">
          <div style="text-align: left; width: 260px;" class=""><?php echo getSubstr($goods_list[$items['goods_id']],0,50); ?></div>
        </td>
        <td align="center" abbr="article_show" axis="col5" class="">
          <div style="text-align: center; width: 100px;" class="">
          		<?php if($items[type] == 0): ?>仅退款<?php endif; if($items[type] == 1): ?>退货退款<?php endif; if($items[type] == 2): ?>换货<?php endif; ?>
           </div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 160px;" class=""><?php echo date('Y-m-d H:i',$items['addtime']); ?></div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align:left; width: 100px;" class="">
              <?php echo $state[$items[status]]; ?>
          </div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: left; width: 120px;" class="">
          	<a class="btn green" href="<?php echo U('Admin/order/return_info',array('id'=>$items['id'])); ?>" data-toggle="tooltip" title="" ><i class="fa fa-list-alt"></i>查看</a>
            <a class="btn red" href="javascript:void(0);" data-url="<?php echo U('Admin/order/return_del',array('id'=>$items['id'])); ?>" onclick="delfunc(this)"   id="button-delete6" ><i class="fa fa-trash-o"></i>删除</a>
          </div>
        </td>
         <td align="" class="" style="width: 100%;">
            <div>&nbsp;</div>
          </td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </tbody>
</table>
<div class="row">
    <div class="col-sm-6 text-left"></div>
    <div class="col-sm-6 text-right"><?php echo $page; ?></div>
</div>
<script>
    $(".pagination  a").click(function(){
        var page = $(this).data('p');
        ajax_get_table('search-form2',page);
    });
      
    $('.ftitle>h5').empty().html("(共<?php echo $pager->totalRows; ?>条记录)");
</script>