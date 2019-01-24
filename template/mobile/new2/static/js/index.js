/****************************侧边栏start**********************************/
$('#header-side').on('click',function(e){
    if($(e.target).hasClass('content-first') || $(e.target).parent().hasClass('content-first')){
        $('#header-side .am-offcanvas-content').addClass('hide');
        $('#header-side .am-offcanvas-sub').removeClass('hide');
    }else if($(e.target).hasClass('am-icon-angle-left')){
        $('#header-side .am-offcanvas-content').removeClass('hide');
        $('#header-side .am-offcanvas-sub').addClass('hide');
    }
}).on('close.offcanvas.amui',function(){
    setTimeout(function(){
        $('#header-side .am-offcanvas-content').removeClass('hide');
        $('#header-side .am-offcanvas-sub').addClass('hide');
    },500)

});
/****************************侧边栏end**********************************/

/****************************头部start**********************************/
$('#subHeader').on('click',function(e){
    if($(e.target).hasClass('title-mask') || $(e.target).parent().hasClass('title-mask')){
        $('#subHeader .title-mask').addClass('hide');
        $('#subHeader input').focus();
    }
});
$('#subHeader input').on('blur',function(){
    $('#subHeader input').val('');
    $('#subHeader .title-mask').addClass('am-animation-fade').removeClass('hide');
});
/****************************头部end**********************************/


/****************************轮播图start**********************************/
$('#carousel').swiper({
    pagination: '#carousel .swiper-pagination',
    paginationClickable: true,
    spaceBetween: 30
});
/****************************轮播图end**********************************/


/****************************国家馆start**********************************/
$('#nationalPavilion .item').on('click',function(e){
    $('#header-side .am-offcanvas-content').addClass('hide');
    $('#header-side .am-offcanvas-sub').removeClass('hide');
    $('#header-side').offCanvas('open');
});
/****************************国家馆end**********************************/



/****************************倒计时start**********************************/
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
/****************************倒计时start**********************************/

/****************************图片上传start**********************************/
function imgChange(obj1, obj2) {
    //获取点击的文本框
    var file = document.getElementById("file");
    //存放图片的父级元素
    var imgContainer = document.getElementsByClassName(obj1)[0];
    //获取的图片文件
    var fileList = file.files;
    //文本框的父级元素
    var input = document.getElementsByClassName(obj2)[0];
    var imgArr = [];
    //遍历获取到得图片文件
    for (var i = 0; i < fileList.length; i++) {
        var imgUrl = window.URL.createObjectURL(file.files[i]);
        imgArr.push(imgUrl);
        var img = document.createElement("img");
        img.setAttribute("src", imgArr[i]);
        var imgAdd = document.createElement("div");
        imgAdd.setAttribute("class", "z_addImg");
        imgAdd.appendChild(img);
        imgContainer.insertBefore(imgAdd,input);
    }
}

/****************************图片上传start**********************************/