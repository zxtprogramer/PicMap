var map;
var mouseLng, mouseLat;
var lngMax,lngMin,latMax,latMin;

var picArray=new Array();
var picMarker=new Array();

//show pic method;
var picNum=20;
var groupNum=0;
var sortType="PicID";
var selectType="AllRange";
var para="";
//////////////////////

function getBounds(){
    bounds=map.getBounds().toString();
    bArr=bounds.split(';');
    ws=bArr[0].split(',');
    en=bArr[1].split(',');
    lngMin=Math.min(parseFloat(ws[0]),parseFloat(en[0]));
    lngMax=Math.max(parseFloat(ws[0]),parseFloat(en[0]));
    latMin=Math.min(parseFloat(ws[1]),parseFloat(en[1]));
    latMax=Math.max(parseFloat(ws[1]),parseFloat(en[1]));

}


function getPic(num, groupNum, sortType, selectType, para){
    var xmlhttp;
    picATmp=new Array();
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
	if(xmlhttp.readyState==4 && xmlhttp.status==200){
	    res=xmlhttp.responseText;
	    picList=res.split("#");
	    for(var i=0;i<picList.length;i++){
		picATmp[i]=new Array();
		picInfo=picList[i].split(" ");
		for(var j=0;j<picInfo.length;j++){
		    key=decodeURIComponent(picInfo[j].split("=")[0]);
		    value=decodeURIComponent(picInfo[j].split("=")[1]);
		    picATmp[i][key]=value;
		}
	    }
	}
    };

    xmlhttp.open("POST", "../Main/Command.php",false);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("cmd=getPic&picNum=" + num + "&groupNum=" + groupNum + "&sortType=" + sortType + "&selectType=" + selectType + "&" + para);
    
    return picATmp;
}

function getPicPara(){
    switch(selectType){
        case "All":
            para="";
            break;
        case "AllRange":
            para="lngMax=" + lngMax + "&lngMin=" + lngMin + "&latMax=" + latMax + "&latMin=" + latMin;
            break;
    }
}

function initMap(){
    map=new AMap.Map('MapContainer',{resizeEnable:true, zoom:12, center:[116.39,39.9]});
    AMap.event.addListener(map,"moveend",_onMoveend);
    AMap.event.addListener(map,"dragend",_onMoveend);
    AMap.event.addListener(map,"zoomend",_onMoveend);
    AMap.event.addListener(map,"touchend",_onMoveend);
    AMap.event.addListener(map,"click",_onClick);

}

function _onClick(e){
    mouseLng=e.lnglat.getLng();
    mouseLat=e.lnglat.getLat();
}

function _onMoveend(e){
    getBounds();
    getPicPara();
    picArray=getPic(picNum, groupNum, sortType, selectType, para);
    freshPic();
}
function _onDragend(e){
    getBounds();
    getPicPara();
    picArray=getPic(picNum, groupNum, sortType, selectType, para);
    freshPic();

}
function _onZoomend(e){
    getBounds();
    getPicPara();
    picArray=getPic(picNum, groupNum, sortType, selectType, para);
    freshPic();
}
function _onTouchend(e){
    getBounds();
    getPicPara();
    picArray=getPic(picNum, groupNum, sortType, selectType, para);
    freshPic();
}


function freshPic(){
    for(var i=0;i<picMarker.length;i++){
	picMarker[i].setMap();
    }
     for(var i=0;i<picArray.length;i++){
	userID=picArray[i]['UseID'];
	picW=picArray[i]['Width'];
	picH=picArray[i]['Height'];
	
	picLng=parseFloat(picArray[i]['Longitude']);
	picLat=parseFloat(picArray[i]['Latitude']);
	
	picSnapPath=picArray[i]['PicPath']+"_snap.jpg";
	picLikeNum=picArray[i]['LikeNum'];
	
	picInfo='<div class="SnapDiv" id="SnapDiv' + i + '"><img onclick="javascript:onClickMarker(' + i + ')" class="SnapImg" src="' + picSnapPath + '" /></div>';
	picMarker[i]=new AMap.Marker({position:[picLng,picLat]});
    picMarker[i].setLabel({title:"hello", offset:new AMap.Pixel(15,10), content:picInfo});
	picMarker[i].setMap(map);
    }
    
}


function onClickMarker(index){
}

initMap();

