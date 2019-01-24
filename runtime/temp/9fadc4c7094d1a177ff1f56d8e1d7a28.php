<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:42:"./application/admin/view/goods/_brand.html";i:1527472030;s:43:"./application/admin/view/public/layout.html";i:1522351662;}*/ ?>
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
<div class="page">
  <div class="fixed-bar">
    <div class="item-title"><a class="back" href="javascript:history.back();" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3>品牌详情</h3>
        <h5>品牌添加与管理</h5>
      </div>
    </div>
  </div>
    <!--表单数据-->
    <form method="post" id="addEditBrandForm" >
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="ac_name"><em>*</em>品牌名称</label>
        </dt>
        <dd class="opt">
          <input type="text" placeholder="名称" class="input-txt" name="name" value="<?php echo $brand['name']; ?>">
		  <span class="err" id="err_name" style="color:#F00; display:none;"></span>
            <p class="notic"></p>
        </dd>
      </dl>
	  <dl class="row">
        <dt class="tit">
          <label for="ac_name">品牌网址</label>
        </dt>
        <dd class="opt">
          <input type="text" class="input-txt" name="url" value="<?php echo $brand['url']; ?>">
		  <span  class="err" id="err_url" style="color:#F00; display:none;"></span>                                                     
          <p class="notic"></p>
        </dd>
      </dl>      
	  <dl class="row">
        <dt class="tit" colspan="2">
          <label class="" for="s_sort">所属分类</label>
        </dt>
        <dd class="opt">
          <div id="gcategory">
           <select name="parent_cat_id" id="parent_id_1" onblur="get_category(this.value,'parent_id_2','0');"  onchange="get_category(this.value,'parent_id_2','0');" class="form-control" >
                <option value="0">请选择分类</option> 
                <?php if(is_array($cat_list) || $cat_list instanceof \think\Collection || $cat_list instanceof \think\Paginator): if( count($cat_list)==0 ) : echo "" ;else: foreach($cat_list as $key=>$v): ?>	                                                                                    
                    <option value="<?php echo $v[id]; ?>"  <?php if($v[id] == $brand[parent_cat_id]): ?> selected="selected" <?php endif; ?>><?php echo $v[name]; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>                                            
            </select>
            <select name="cat_id" id="parent_id_2"  class="form-control" style="width:250px;">
            <option value="0">请选择分类</option>
            </select>
          </div>
        </dd>
      </dl>

      <dl class="row">
        <dt class="tit">
          <label>品牌logo</label>
        </dt>
        <dd class="opt">
          <div class="input-file-show">
              <span class="show">
                  <a id="img_a" target="_blank" class="nyroModal" rel="gal" href="<?php echo $brand['logo']; ?>">
                    <i id="img_i" class="fa fa-picture-o" onmouseover="layer.tips('<img src=<?php echo $brand['logo']; ?>>',this,{tips: [1, '#fff']});" onmouseout="layer.closeAll();"></i>
                  </a>
              </span>
              <span class="type-file-box">
                  <input type="text" id="logo" name="logo" value="<?php echo $brand['logo']; ?>" class="type-file-text">
                  <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                  <input class="type-file-file" onClick="GetUploadify(1,'','brand','img_call_back')" size="30" hidefocus="true" nc_type="change_site_logo"
                         title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
              </span>
          </div>
          <span class="err"></span>
          <p class="notic">请上传图片格式文件</p>
        </dd>
      </dl>
                 		 		       
      <dl class="row">
        <dt class="tit">
          <label for="ac_sort">排序</label>
        </dt>
        <dd class="opt">
          <input type="text" placeholder="排序" name="sort" value="<?php echo $brand['sort']; ?>" class="input-txt">
          <span class="err" id="err_sort" style="color:#F00; display:none;"></span>
            <p class="notic"></p>
        </dd>
      </dl>
	  <dl class="row">
        <dt class="tit">
          <label for="ac_sort">品牌描述</label>
        </dt>
        <dd class="opt">
          
          <textarea rows="4" cols="60" name="desc" class="input-txt"><?php echo $brand['desc']; ?></textarea>
          <span class="err" id="err_desc" style="color:#F00; display:none;"></span>                
          <p class="notic"></p>
        </dd>
      </dl>	
                              
      <div class="bot"><a href="JavaScript:void(0);" onClick="verifyForm();" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
    </div>
        <input type="hidden" name="id" value="<?php echo $brand['id']; ?>">
        <input type="hidden" name="p" value="<?php echo $_GET[p]; ?>">   
  </form>
</div>
<script>
// 判断输入框是否为空
//function checkName(){
//	var name = $("#addEditBrandForm").find("input[name='name']").val();
//    if($.trim(name) == '')
//	{
//		$("#err_name").show();
//		return false;
//	}
//	return true;
//}

function verifyForm(){
    $('span.err').show();
    $.ajax({
        type: "POST",
        url: "<?php echo U('Admin/Goods/addEditBrand'); ?>",
        data: $('#addEditBrandForm').serialize(),
        dataType: "json",
        error: function () {
            layer.alert("服务器繁忙, 请联系管理员!");
        },
        success: function (data) {
            if (data.status == 1) {
                layer.msg(data.msg, {icon: 1});
                location.href = "<?php echo U('Admin/Goods/brandList'); ?>";
            } else {
                layer.msg(data.msg, {icon: 2});
                $.each(data.result, function (index, item) {
                    $('#err_' + index).text(item).show();
                });
            }
        }
    });
}


window.onload = function(){
    var brand_cat_id = parseInt('<?php echo $brand['cat_id']; ?>');
	if(brand_cat_id > 0 ){
		get_category($("#parent_id_1").val(),'parent_id_2',brand_cat_id);	 
	}		
}
function img_call_back(fileurl_tmp)
{
  $("#logo").val(fileurl_tmp);
  $("#img_a").attr('href', fileurl_tmp);
  $("#img_i").attr('onmouseover', "layer.tips('<img src="+fileurl_tmp+">',this,{tips: [1, '#fff']});");
}
</script>
</body>
</html>