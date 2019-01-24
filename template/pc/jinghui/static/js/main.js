/**
 * Created by Administrator on 2018/3/6 0006.
 */

//二级菜单弹出
function showSubMenu(){

    var nav = $("#navList");
    var oLi = nav.find("li");
    oLi.each(function(index,item){
        var hasActiveClass = $(this).hasClass("active");
        $(this).hover(function() {
            $(this).find(".son-menu").fadeIn();
            if( !hasActiveClass ) $(this).addClass("active");
        }, function() {
            $(this).find(".son-menu").hide();
            if( !hasActiveClass ) $(this).removeClass("active");
        });
    })

}
showSubMenu();

function showCateSubMenu(){

    var cate = $("#main-cate");
    var item = cate.find(".item");
    var allCateSonMenu = $(".cate-son-menu");
    item.each(function(index,item){
        var _this;
        var timer = null;
        var sonMenu = $(this).find(".cate-son-menu");

        $(this).hover(function() {
            _this = this;
            allCateSonMenu.hide();
            $(_this).addClass("active");
            sonMenu.show();
            clearTimeout(timer);
        }, function() {
            timer = setTimeout(function(){
                clearTimeout(timer);
                $(_this).removeClass("active");
                sonMenu.hide();
            },500)
        });

        sonMenu.hover(function() {
            $(this).show();
            $(_this).addClass("active");
            clearTimeout(timer);
        }, function() {
            timer = setTimeout(function(){
                clearTimeout(timer);
                $(_this).removeClass("active");
                sonMenu.hide();
            },500)
        });


    })

}
showCateSubMenu();

//计数器
function inputNumber(obj,max,callback){

    var minus = $(obj).find(".minus-btn");
    var plus = $(obj).find(".plus-btn");
    var input = $(obj).find(".number");
    var initNum = 1;

    addDisabled();

    plus.on("click",function(){
        initNum = input.val();
        initNum++;
        if( initNum > max ){
            initNum = max;
        }
        input.val(initNum);
        addDisabled();
    });

    minus.on("click",function(){
        initNum = input.val();
        initNum--;
        if( initNum < 1 ){
            initNum = 1;
        }
        input.val(initNum);
        addDisabled();
    });

    input.keyup(function(){
        if(!/^[+]{0,1}(\d+)$/.test($(this).val())){
            $(this).val(initNum)
        }
        if( parseInt($(this).val()) === 0 ){
            $(this).val(1);
        }
        if( parseInt($(this).val()) > max ){
            $(this).val(max);
        }
        addDisabled();
    });

    function addDisabled(){
        var val = parseInt(input.val());
        if( callback && callback instanceof Function ){
            callback(val);
        }
        if( val === 1 ){
            minus.addClass("disabled");
        }else if( val === max ){
            plus.addClass("disabled");
        }else{
            minus.removeClass("disabled");
            plus.removeClass("disabled");
        }
    }

}


function initTab(obj){
    var aItem = $(obj).find(".tab-title a");
    var tabItem = $(obj).find(".tab-item");
    var current = 0;
    aItem.each(function(index,item){
        $(this).on('click',function(){
            current = index;
            changeTab(current);
			$(".tips").text('');
        })
    });
    function changeTab(n){
        aItem.removeClass("active").eq(n).addClass("active");
        tabItem.hide();
        tabItem.eq(n).show();
    }
    changeTab(current);
}


/**
 * 倒计时
 * @param {String} futureDate yyyy-MM-dd hh:mm:ss  2018-3-10 23:23:23
 * @param {String} obj
 */
function countdown(futureDate,obj){

    var leftTime = new Date(futureDate) - new Date();
    var timer = null;
    var day,hour,minute,second;
    if ( leftTime >= 0 ) {
        day = Math.floor(leftTime/1000/60/60/24);
        hour = Math.floor(leftTime/1000/60/60%24);
        minute = Math.floor(leftTime/1000/60%60);
        second = Math.floor(leftTime/1000%60);
        if( day > 0 ){
            $(obj).html(day+"<span>天</span> "+addZero(hour)+" : "+addZero(minute)+" : "+addZero(second))
        }else{
            $(obj).html(addZero(hour)+" : "+addZero(minute)+" : "+addZero(second))
        }
        timer = setInterval(function(){
            return countdown(futureDate,obj)
        },1000);
    }else{
        $(obj).html("00 : 00 : 00");
        clearInterval(timer);
    }

    function addZero(i){
        if(i < 10){
            i = "0" + i;
        }
        return i;
    }

}


function uploadImage(fileObj,imgShowObj){

    $(fileObj).change(function() {
        var filePath = $(this).val();
        var imgHtml = '';
        for(var i = 0; i < this.files.length; i++) {
            objUrl = getObjectURL(this.files[i]);
            var extStart = filePath.lastIndexOf(".");
            var ext = filePath.substring(extStart, filePath.length).toUpperCase();
            if(ext != ".BMP" && ext != ".PNG" && ext != ".GIF" && ext != ".JPG" && ext != ".JPEG") {
                layer.msg("图片限于bmp,png,gif,jpeg,jpg格式");
                return false;
            } else {
                imgHtml = "<div class='list-item'><img class='upload-img' src='" + objUrl + "' /><a class='remove-img' href='javascript:;'><i class='iconfont icon-close'></i></a></div>";
                $(imgShowObj).append(imgHtml);
                $(".remove-img").on("click",function(){
                    $(this).closest(".list-item").remove();
                    return false;
                });
            }
        }
        return true;
    });


    function getObjectURL(file) {
        var url = null;
        if(window.createObjectURL != undefined) {
            url = window.createObjectURL(file);
        } else if(window.URL != undefined) {
            url = window.URL.createObjectURL(file);
        } else if(window.webkitURL != undefined) {
            url = window.webkitURL.createObjectURL(file);
        }
        return url;
    }



}
