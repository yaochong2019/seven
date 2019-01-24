<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:45:"./application/admin/view/goods/_category.html";i:1524190144;s:43:"./application/admin/view/public/layout.html";i:1522351662;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="__PUBLIC__/static/css/main.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/css/page.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/font/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="__PUBLIC__/static/font/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="__PUBLIC__/static/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<style type="text/css">html, body { overflow: visible;}</style>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
<script type="text/javascript" src="__PUBLIC__/static/js/admin.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.mousewheel.js"></script>
<script src="__PUBLIC__/js/myFormValidate.js"></script>
<script src="__PUBLIC__/js/myAjax2.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
    <script type="text/javascript">
    function delfunc(obj){
    	layer.confirm('确认删除？', {
    		  btn: ['确定','取消'] //按钮
    		}, function(){
    		    // 确定
   				$.ajax({
   					type : 'post',
   					url : $(obj).attr('data-url'),
   					data : {act:'del',del_id:$(obj).attr('data-id')},
   					dataType : 'json',
   					success : function(data){
						layer.closeAll();
   						if(data==1){
   							layer.msg('操作成功', {icon: 1});
   							$(obj).parent().parent().parent().remove();
   						}else{
   							layer.msg(data, {icon: 2,time: 2000});
   						}
   					}
   				})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);
    }

    function selectAll(name,obj){
    	$('input[name*='+name+']').prop('checked', $(obj).checked);
    }

    function get_help(obj){

		window.open("http://www.jh-shop.cc/");
		return false;

        layer.open({
            type: 2,
            title: '帮助手册',
            shadeClose: true,
            shade: 0.3,
            area: ['70%', '80%'],
            content: $(obj).attr('data-url'),
        });
    }

    function delAll(obj,name){
    	var a = [];
    	$('input[name*='+name+']').each(function(i,o){
    		if($(o).is(':checked')){
    			a.push($(o).val());
    		}
    	})
    	if(a.length == 0){
    		layer.alert('请选择删除项', {icon: 2});
    		return;
    	}
    	layer.confirm('确认删除？', {btn: ['确定','取消'] }, function(){
    			$.ajax({
    				type : 'get',
    				url : $(obj).attr('data-url'),
    				data : {act:'del',del_id:a},
    				dataType : 'json',
    				success : function(data){
						layer.closeAll();
    					if(data == 1){
    						layer.msg('操作成功', {icon: 1});
    						$('input[name*='+name+']').each(function(i,o){
    							if($(o).is(':checked')){
    								$(o).parent().parent().remove();
    							}
    						})
    					}else{
    						layer.msg(data, {icon: 2,time: 2000});
    					}
    				}
    			})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);
    }

    /**
     * 全选
     * @param obj
     */
    function checkAllSign(obj){
        $(obj).toggleClass('trSelected');
        if($(obj).hasClass('trSelected')){
            $('#flexigrid > table>tbody >tr').addClass('trSelected');
        }else{
            $('#flexigrid > table>tbody >tr').removeClass('trSelected');
        }
    }
    /**
     * 批量公共操作（删，改）
     * @returns {boolean}
     */
    function publicHandleAll(type){
        var ids = '';
        $('#flexigrid .trSelected').each(function(i,o){
//            ids.push($(o).data('id'));
            ids += $(o).data('id')+',';
        });
        if(ids == ''){
            layer.msg('至少选择一项', {icon: 2, time: 2000});
            return false;
        }
        publicHandle(ids,type); //调用删除函数
    }
    /**
     * 公共操作（删，改）
     * @param type
     * @returns {boolean}
     */
    function publicHandle(ids,handle_type){
        layer.confirm('确认当前操作？', {
                    btn: ['确定', '取消'] //按钮
                }, function () {
                    // 确定
                    $.ajax({
                        url: $('#flexigrid').data('url'),
                        type:'post',
                        data:{ids:ids,type:handle_type},
                        dataType:'JSON',
                        success: function (data) {
                            layer.closeAll();
                            if (data.status == 1){
                                layer.msg(data.msg, {icon: 1, time: 2000},function(){
                                    location.href = data.url;
                                });
                            }else{
                                layer.msg(data.msg, {icon: 2, time: 2000});
                            }
                        }
                    });
                }, function (index) {
                    layer.close(index);
                }
        );
    }
</script>  

</head>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title"><a class="back" href="javascript:history.back();" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3>商品分类 - 添加修改分类</h3>
        <h5>添加或编辑商品分类</h5>
      </div>
    </div>
  </div>
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span>
    </div>
    <ul>
      <li>商品分类最多分为二级</li>
      <li>添加或者修改分类时, 应注意选择对应的上级</li>
    </ul>
  </div>
  <form action="<?php echo U('Goods/addEditCategory'); ?>" method="post" class="form-horizontal" id="category_form">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="t_mane"><em>*</em>分类名称</label>
        </dt>
        <dd class="opt">
          <input type="text" placeholder="名称" class="input-txt" name="name" value="<?php echo $goods_category_info['name']; ?>">
          <span class="err" id="err_name" style="color:#F00; display:none;"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="t_mane"><em>*</em>手机分类名称</label>
        </dt>
        <dd class="opt">
          <input type="text" placeholder="手机分类名称" class="input-txt" name="mobile_name" value="<?php echo $goods_category_info['mobile_name']; ?>">
          <span class="err" id="err_mobile_name" style="color:#F00; display:none;"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit" colspan="2">
          <label class="" for="s_sort">上级分类</label>
        </dt>
        <dd class="opt">
          <div id="gcategory">
            <select name="parent_id_1" id="parent_id_1" onblur="get_category(this.value,'parent_id_2','0');" class="class-select valid">
                <option value="0">顶级分类</option>
                <?php if(is_array($cat_list) || $cat_list instanceof \think\Collection || $cat_list instanceof \think\Paginator): if( count($cat_list)==0 ) : echo "" ;else: foreach($cat_list as $key=>$v): ?>                                            
                    <option value="<?php echo $v[id]; ?>"><?php echo $v[name]; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>                                            
            </select>                     
          </div>
          <p class="notic">如果设置为第二级, 只选择第一级即可</p>
        </dd>
      </dl>
	  <dl class="row">
        <dt class="tit">
          <label for="t_mane"><em>*</em>导航显示</label>
        </dt>
        <dd class="opt">
          <div class="onoff">
            <label for="goods_category1" class="cb-enable <?php if($goods_category_info[is_show] == 1): ?>selected<?php endif; ?>">是</label>
            <label for="goods_category0" class="cb-disable <?php if($goods_category_info[is_show] == 0): ?>selected<?php endif; ?>">否</label>
            <input id="goods_category1" name="is_show" value="1" type="radio" <?php if($goods_category_info[is_show] == 1): ?> checked="checked"<?php endif; ?>>
            <input id="goods_category0" name="is_show" value="0" type="radio" <?php if($goods_category_info[is_show] == 0): ?> checked="checked"<?php endif; ?>>
          </div>
          <p class="notic">是否在导航栏显示</p>
        </dd>        
      </dl>    
      
	  <!--  <dl class="row">
        <dt class="tit" colspan="2">
          <label class="" for="s_sort">分类分组</label>
        </dt>
        <dd class="opt">
          <div>
              <select name="cat_group" id="cat_group" class="form-control">
                <option value="0">0</option>                                        
                <option value='1' <?php if($goods_category_info[cat_group] == 1): ?> selected='selected'<?php endif; ?>>1</option>"
                <option value='2' <?php if($goods_category_info[cat_group] == 2): ?> selected='selected'<?php endif; ?>>2</option>"
                <option value='3' <?php if($goods_category_info[cat_group] == 3): ?> selected='selected'<?php endif; ?>>3</option>"
                <option value='4' <?php if($goods_category_info[cat_group] == 4): ?> selected='selected'<?php endif; ?>>4</option>"
                <option value='5' <?php if($goods_category_info[cat_group] == 5): ?> selected='selected'<?php endif; ?>>5</option>"
                <option value='6' <?php if($goods_category_info[cat_group] == 6): ?> selected='selected'<?php endif; ?>>6</option>"
                <option value='7' <?php if($goods_category_info[cat_group] == 7): ?> selected='selected'<?php endif; ?>>7</option>"
                <option value='8' <?php if($goods_category_info[cat_group] == 8): ?> selected='selected'<?php endif; ?>>8</option>"
                <option value='9' <?php if($goods_category_info[cat_group] == 9): ?> selected='selected'<?php endif; ?>>9</option>"
                <option value='10' <?php if($goods_category_info[cat_group] == 10): ?> selected='selected'<?php endif; ?>>10</option>"
                <option value='11' <?php if($goods_category_info[cat_group] == 11): ?> selected='selected'<?php endif; ?>>11</option>"
                <option value='12' <?php if($goods_category_info[cat_group] == 12): ?> selected='selected'<?php endif; ?>>12</option>"
                <option value='13' <?php if($goods_category_info[cat_group] == 13): ?> selected='selected'<?php endif; ?>>13</option>"
                <option value='14' <?php if($goods_category_info[cat_group] == 14): ?> selected='selected'<?php endif; ?>>14</option>"
                <option value='15' <?php if($goods_category_info[cat_group] == 15): ?> selected='selected'<?php endif; ?>>15</option>"
                <option value='16' <?php if($goods_category_info[cat_group] == 16): ?> selected='selected'<?php endif; ?>>16</option>"
                <option value='17' <?php if($goods_category_info[cat_group] == 17): ?> selected='selected'<?php endif; ?>>17</option>"
                <option value='18' <?php if($goods_category_info[cat_group] == 18): ?> selected='selected'<?php endif; ?>>18</option>"
                <option value='19' <?php if($goods_category_info[cat_group] == 19): ?> selected='selected'<?php endif; ?>>19</option>"
                <option value='20' <?php if($goods_category_info[cat_group] == 20): ?> selected='selected'<?php endif; ?>>20</option>"
              </select>                             
          </div>
          <p class="notic">有时候左侧菜单栏同一行显示多个分类, 所以给他们一个分组</p>
        </dd>
      </dl> -->
      <dl class="row">
        <dt class="tit">
          <label for="t_sort"><em>*</em>排序</label>
        </dt>
        <dd class="opt">
          <input type="text" class="t_mane" name="sort_order" id="t_sort" value="<?php echo $goods_category_info['sort_order']; ?>">
          <span class="err" style="color:#F00; display:none;" id="err_sort_order"></span>
          <p class="notic">根据排序进行由小到大排列显示。</p>
        </dd>
      </dl>
	                         
      <div class="bot"><a id="submitBtn" class="ncap-btn-big ncap-btn-green" href="JavaScript:void(0);" onClick="ajax_submit_form('category_form','<?php echo U('Goods/addEditCategory?is_ajax=1'); ?>');">确认提交</a></div>
    </div>
    <input type="hidden" name="id" value="<?php echo $goods_category_info['id']; ?>">
  </form>
</div>
<script>  
    
/** 以下是编辑时默认选中某个商品分类*/
$(document).ready(function(){
	<?php if($level_cat['2'] > 0): ?>	
		 // 如果当前是二级分类就让一级父id默认选中
		 $("#parent_id_1").val('<?php echo $level_cat[1]; ?>'); 
		 get_category('<?php echo $level_cat[1]; ?>','parent_id_2','0');		 
	<?php endif; if($level_cat['3'] > 0): ?>
		 // 如果当前是三级分类就一级和二级父id默认 都选中
		 $("#parent_id_1").val('<?php echo $level_cat[1]; ?>');		 	
		 get_category('<?php echo $level_cat[1]; ?>','parent_id_2','<?php echo $level_cat[2]; ?>');	
	<?php endif; ?>	
});
 
// 将品牌滚动条里面的 对应分类移动到 最上面
//javascript:document.getElementById('category_id_3').scrollIntoView();
var typeScroll = 0;
function spec_scroll(o){
	var id = $(o).val();	
	//if(!$('#type_id_'+id).is('dt')){
		//return false;
	//} 	 
	$('#ajax_brandList').scrollTop(-typeScroll);
	var sp_top = $('#type_id_'+id).offset().top; // 标题自身往上的 top
	var div_top = $('#ajax_brandList').offset().top; // div 自身往上的top
	$('#ajax_brandList').scrollTop(sp_top-div_top); // div 移动
	typeScroll = sp_top-div_top;
}

function img_call_back(fileurl_tmp)
{
  $("#image").val(fileurl_tmp);
  $("#img_a").attr('href', fileurl_tmp);
  $("#img_i").attr('onmouseover', "layer.tips('<img src="+fileurl_tmp+">',this,{tips: [1, '#fff']});");
}
</script>
</body>
</html>