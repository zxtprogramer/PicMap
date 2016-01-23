var nowIndex=0;

function befPic(){
    nums=picArray.length;
    nowIndex=(nowIndex-1);
    if(nowIndex<0){nowIndex=nums-1;}
    freshPanel();
}

function nextPic(){
    nums=picArray.length;
    nowIndex=(nowIndex+1)%nums;
    freshPanel();
}

function nextGroup(){
    groupNum=groupNum + 1;
    fresh();
}

function applyFun(){
    picNum=$("#PicNumText").val();

}

function freshPanel(){
    picPath=picArray[nowIndex]['PicPath'];
    
    picW=parseInt(picArray[nowIndex]['Width']);
    
    picH=parseInt(picArray[nowIndex]['Height']);
    
    picLng=parseFloat(picArray[nowIndex]['Longitude']);
    picLat=parseFloat(picArray[nowIndex]['Latitude']);
    
    picLikeNum=parseInt(picArray[nowIndex]['LikeNum']);

    picUserID=picArray[nowIndex]['UserID'];

    if(picW>0 && picH>0){

        if(picUserID==userID){
	}
	else{
	}

	$("#PicPanelImg").attr("src",picPath);

	divH=parseInt($("#PicPanelImgDiv").height());
	divW=parseInt($("#PicPanelImgDiv").width());

	rH=divH/picH;  rW=divW/picW;

	if(rH>=1 && rW>=1){
	    topPx=(divH-picH)/2;
	    leftPx=(divW-picW)/2;
	}
	else{
	    ratio=Math.min(rH,rW);
	    topPx=(divH - picH*ratio)/2;
	    leftPx=(divW - picW*ratio)/2;
	}

	$("#PicPanelImg").css("top",topPx+"px");
	$("#PicPanelImg").css("left",leftPx+"px");
    }

        
}



function hidePanel(){
    $("#PicPanelDiv").hide();
}

function showPanel(){
    $("#PicPanelDiv").show();
}
