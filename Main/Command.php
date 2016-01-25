<?php
require("../dbase/dbFunction.php");
session_start();

function uploadPic(){
    global $userID;
    if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/bmp")
    || ($_FILES["file"]["type"] == "image/pjpeg"))){
    
        $filename=$_FILES["file"]["name"];
        $tmpfile=$_FILES["file"]["tmp_name"];
        $md5=md5_file($tmpfile);

        $dirPath="/var/www/html/PicMap/Data/" . $userID;
        if(!file_exists($dirPath)){
            mkdir($dirPath);
        }
        $path="/var/www/html/PicMap/Data/" . $userID . "/" . $md5 ."_". $filename;
        $path2="/PicMap/Data/" . $userID . "/" . $md5 ."_". $filename;
        move_uploaded_file($tmpfile, $path);
    
    
        $snapPath=$path . "_snap.jpg";
        $cmd="convert -resize 150x100 " . $path . " " . $snapPath;
        system($cmd);
    
        $picDes=$_POST['upPicDes'];
        $picPos=$_POST['upPicPos'];
        $picAlbumID=$_POST['upAlbumID'];

        $longitude=split(",", $picPos)[0];
        $latitude=split(",", $picPos)[1];
        $picSize=getimagesize($path);
        addPic($userID, $filename,$picSize[0],$picSize[1],$picDes,$path2,time(),time(),$longitude,$latitude,0,$picAlbumID);
    }
    header("Location: ../Map/upload.php");
}



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

    case 'uploadPic':
        if($ifLogin==1){
            uploadPic();
        }
        break;

	default:
	    print("Error");
	    break;
    }
}

?>
