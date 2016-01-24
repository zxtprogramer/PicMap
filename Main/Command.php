<?php
require("../dbase/dbFunction.php");
session_start();

function getData($sql){
    $res=exeSQL($sql);
    $data="";
    while($row=mysql_fetch_array($res,MYSQL_ASSOC)){
	    $item="";
        foreach($row as $key=>$value){
            $keyEn=rawurlencode($key);
            $valueEn=rawurlencode($value);
            $item=$item . $keyEn . "=" . $valueEn . " ";
        }
        if($data=="")$data=trim($item);
        else $data=$data . "#" . trim($item);
    }
    return $data;
}

$ifLogin=0;
$userName=""; $userID="";
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

		case "UserRange":
		    $latMax=(double)($_POST['latMax']);
		    $latMin=(double)($_POST['latMin']);
		    $lngMax=(double)($_POST['lngMax']);
		    $lngMin=(double)($_POST['lngMin']);
            $userID=$_POST['userID'];
		    $sql="SELECT * FROM PicTable WHERE UserID=$userID AND Longitude<$lngMax AND Longitude>$lngMin AND Latitude<$latMax AND Latitude>$latMin ORDER BY $sortType LIMIT $index,$picNum";
            break;

		case "AlbumRange":
		    $latMax=(double)($_POST['latMax']);
		    $latMin=(double)($_POST['latMin']);
		    $lngMax=(double)($_POST['lngMax']);
		    $lngMin=(double)($_POST['lngMin']);
            $albumID=$_POST['albumID'];
		    $sql="SELECT * FROM PicTable WHERE AlbumID=$albumID AND Longitude<$lngMax AND Longitude>$lngMin AND Latitude<$latMax AND Latitude>$latMin ORDER BY $sortType LIMIT $index,$picNum";
            break;
	    }
        
	    print(getData($sql));
	    break;

    case 'getComment':
        $picID=$_POST['picID'];
        $sql="SELECT * FROM CommentTable WHERE PicID=$picID";
        print(getData($sql));
        break;

    case 'getAlbum':
        $albumUserID=intval($_POST['albumUserID']);
        if($albumUserID<=0){
            $sql="SELECT * FROM AlbumTable WHERE AlbumName!='Face' and AlbumName!='Default'";
        }
        else{
            $sql="SELECT * FROM AlbumTable WHERE UserID=$albumUserID";
        }
        print(getData($sql));
        break;



    case 'sendComment':
        if($ifLogin==1){
            $cmt=$_POST['cmt'];
            $picID=$_POST['picID'];
            addComment($userID, $picID, $cmt, time());
        }
        else{
        }
        break;

    case 'addLike':
        if($ifLogin==1){
            $picID=$_POST['picID'];
            addLike($userID, $picID,time());
        }
        else{
        }
 
        break;
   

	default:
	    print("Error");
	    break;
    }
}

?>
