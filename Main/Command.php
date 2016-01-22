<?php
require("../dbase/dbFunction.php");
session_start();

$ifLogin=0;
if(isset($_SESSION['UserName'])){
    $userName=$_SESSION['UserName'];
    $userID=$_SESSION['UserID'];
    $ifLogin=1;
}

if(isset($_POST['cmd'])){

    $cmd=$_POST['cmd'];
    switch($cmd){
        case 'newAlbum':
	    if($ifLogin){
		$albumName=$_POST['AlbumName'];
		$albumDes=$_POST['AlbumDes'];
		addAlbum($userID, $albumName, $albumDes, time());
	    }
            break;
	    
	case 'getPic':
	    $picNum=(int)($_POST['picNum']);
	    $groupNum=(int)($_POST['groupNum']);
	    $sortType=$_POST['sortType'];
	    $selectType=$_POST['selectType'];
	    
	    $index=$picNum*$groupNum;
	    $sql="";
	    switch($selectType){
                case "All":
		    $sql="SELECT * FROM PicTable ORDER BY $sortType LIMIT $index,$picNum";
		    break;
		case "AllRange":
		    $latMax=(double)($_POST['latMax']);
		    $latMin=(double)($_POST['latMin']);
		    $lngMax=(double)($_POST['lngMax']);
		    $lngMin=(double)($_POST['lngMin']);
		    $sql="SELECT * FROM PicTable WHERE Longitude<$lngMax AND Longitude>$lngMin AND Latitude<$latMax AND Latitude>$latMin ORDER BY $sortType LIMIT $index,$picNum";
		    break;
	    }
	    
	    
	    $res=exeSQL($sql);
	    $data="";
	    while($row=mysql_fetch_array($res,MYSQL_ASSOC)){
		$item="";
		foreach($row as $key=>$value){
		    $keyEn=urlencode($key);
		    $valueEn=urlencode($value);
		    $item=$item . $keyEn . "=" . $valueEn . " ";
		}
		if($data=="")$data=trim($item);
		else $data=$data . "#" . trim($item);
	    }
	    print("$data");


	    break;

	default:
	    print("Error");
	    break;
    }
}

?>
