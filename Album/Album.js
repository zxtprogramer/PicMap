function newAlbumShow(){
    wH=$(window).height();
    wW=$(window).width();
	dW=$("#NewAlbumDiv").width();
	dH=$("#NewAlbumDiv").height();

    $("#NewAlbumDiv").css("left",(wW-dW)/2 + "px");
    $("#NewAlbumDiv").css("top",(wH-dH)/2 + "px");

	$("#NewAlbumDiv").css("visibility","visible");
	$("#NewAlbumDivMask").css("visibility","visible");
}

function newAlbumHide(){
	$("#NewAlbumDiv").css("visibility","hidden");
	$("#NewAlbumDivMask").css("visibility","hidden");
}

function showAlbum(){
    window.location.href="Album.php?HomeUserName=" + homeUserName;
}

function newAlbum(){
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();
    var albumName=$("#NewAlbumName").val()
    var albumDes=$("#NewAlbumDes").val()

    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            newAlbumHide();
	        showAlbum();
        }
    }   

    xmlhttp.open("POST", "../Main/Command.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("cmd=newAlbum&AlbumName=" + albumName + "&AlbumDes=" + albumDes);

}
