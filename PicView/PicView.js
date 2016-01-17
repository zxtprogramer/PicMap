imgList=new Array();
imgList[0]="/images/0.JPG"
imgList[1]="/images/1.JPG"
imgList[2]="/images/2.JPG"
imgList[3]="/images/3.JPG"
imgList[4]="/images/4.JPG"
imgList[5]="/images/5.JPG"
imgList[6]="/images/6.JPG"
imgList[7]="/images/7.JPG"
imgList[8]="/images/8.JPG"
imgList[9]="/images/9.JPG"
nowIndex=0;

function setSize(){
    divW=$("#PicViewDiv").width();
    divH=$("#PicViewDiv").height();
    $("#PicViewImg").css("max-width",(divW-100)+"px");
    $("#PicViewImg").css("max-height",(divH-200)+"px");

    imgW=$("#PicViewImg").width();
    imgH=$("#PicViewImg").height();

    $("#PicViewImg").css("max-width",(divW-100)+"px");
    $("#PicViewImg").css("left",(divW-imgW)/2 + "px");
    $("#PicViewImg").css("top",(divH-150-imgH)/2 + "px");

}


function initImgListDiv(){
    var conStr="<ul>";
    for(var i=0;i<imgList.length;i++){
        conStr=conStr + "<li><img id=\"ImgID" + i + "\" src=\"" + imgList[i] + "\" /></li>";
    }
    conStr=conStr + "</ul>";
    $("#ImgListDiv").append(conStr);

    for(var i=0;i<imgList.length;i++){
        $("#ImgID" + i).click(function(event){nowIndex=parseInt(event.target.id.substr(5));showPic();});
    }
}


function showPic(){
    $("#PicViewImg").attr("src",imgList[nowIndex]);
    for(var i=0;i<imgList.length;i++){
        $("#ImgID" + i).css("border","3px solid white");
    }
    $("#ImgID" + nowIndex).css("border","3px solid red");
    setSize();
}


function viewBack(){
    if(nowIndex<=0){
        nowIndex=imgList.length; 
    }
    else{
        nowIndex=nowIndex - 1;
    }
    showPic();
}


function viewNext(){
    if(nowIndex>=imgList.length-1){
        nowIndex=0; 
    }
    else{
        nowIndex=nowIndex + 1;
    }
    showPic();
}


$(window).resize(function(){setSize();showPic();});
initImgListDiv();
showPic();


