var nowStatus="NavAll";
var barIDList=["NavAll", "NavOwn", "NavUpload", "NavAlbum", "NavFriend", "NavMessage"];

setStatus();

function setStatus(){

    for(var i=0;i<barIDList.length;i=i+1){
	item=barIDList[i];

	if(item==nowStatus){
	    $("#" + item).css("background","#42A4E0");
	}
	else{
	    $("#" + item).css("background","#2E88C0");
	}
    }
}

function navAll(){
    nowStatus="NavAll";
    setStatus();
}

function navOwn(){
    nowStatus="NavOwn";
    setStatus();
}

function navUpload(){
    nowStatus="NavUpload";
    setStatus();

}

function navAlbum(){
    nowStatus="NavAlbum";
    setStatus();
}

function navFriend(){
    nowStatus="NavFriend";
    setStatus();
}

function navMessage(){
    nowStatus="NavMessage";
    setStatus();
}
