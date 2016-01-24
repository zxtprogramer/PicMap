function navGoto(cmd){
    switch(cmd){
        case 0://all
            homeUserID=0; homeUserName=""; albumID=0; albumName="";
            selectType="AllRange";
            break;
        case 1: //user
            albumID=0; albumName="";
            selectType="UserRange";
            break;
        case 2://album
            selectType="AlbumRange";
            break;
    }
    freshNav();
    rangeChangeFresh();
    
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
  window.location="../Login/Logout.php";
}

function navLogin(){
  window.location="../Login/Login.php";
}

function navRegister(){
  window.location="../Register/Register.php";
}
