var nowStatus="NavAll";
var barIDList=["NavAll", "NavHomeUser", "NavAlbum", "NavFriend", "NavMessage", "NavSet"];

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

function navHomeUser(){
    nowStatus="NavHomeUser";
    setStatus();
}

function navOwn(){
}

function navAlbum(){
    nowStatus="NavAlbum";
    setStatus();
    $("#MainIframe").attr("src","../Album/Album.php?HomeUserName=" + homeUserName);
}

function navFriend(){
    nowStatus="NavFriend";
    setStatus();
    $("#MainIframe").attr("src","../Friend/Friend.php");
}

function navMessage(){
    nowStatus="NavMessage";
    setStatus();
}

function navSet(){
    nowStatus="NavSet";
    setStatus();
}

function navLogout(){
  $("#MainIframe").attr("src","../Login/Logout.php");
}

function navLogin(){
  $("#MainIframe").attr("src","../Login/Login.php");
}

function navRegister(){
  $("#MainIframe").attr("src","../Register/Register.php");
}



