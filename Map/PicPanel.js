var nowIndex=0;

function freshPanel(){
    picPath=picArray[nowIndex]['PicPath'];
    
    picW=parseInt(picArray[nowIndex]['Width']);
    
    picH=parseInt(picArray[nowIndex]['Height']);
    
    picLng=parseFloat(picArray[nowIndex]['Longitude']);
    picLat=parseFloat(picArray[nowIndex]['Latitude']);
    
    picLikeNum=parseInt(picArray[nowIndex]['LikeNum']);

    picUserID=picArray[nowIndex]['UserID'];

    if(picUserID==userID){
    }
    else{
    }

    $("#PicPanelImg").attr("src",picPath);

    divH=parseInt($("#PicPanelImgDiv").css("height"));
    divW=parseInt($("#PicPanelImgDiv").css("width"));

    $("#PicPanelImg").css("top",(divH-imgH)/2+"px");
    $("#PicPanelImg").css("left",(divW-imgW)/2+"px");

        
}



function hidePanel(){
    $("#PicPanelDiv").hide();
}

function showPanel(){
    $("#PicPanelDiv").show();
}
