function navGoto(cmd){
    str='<a href="javascript:navGoto("all");">全部> </a>';
    switch(cmd){
        case 0://all
            homeUserID=0; homeUserName=""; albumID=0; albumName="";
            break;
        case 1: //user
            albumID=0; albumName="";
            break;
        case 2://album
            break;
    }
    freshNav();
}

function freshNav(){
    str='<a href="javascript:navGoto(0);">全部> </a>';
    if(homeUserID!=0){
	    str=str + '<a href="javascript:navGoto(1);">' + homeUserName + '> </a>';
    }
    if(albumID!=0){
        str=str + '<a href="javascript:navGoto(2);">' + albumName + '></a>';
    }

    $("#NavPath").html(str);
}

function navOwn(){
}

function navSet(){
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



