<?php
$dbVersion="V0";
$dbHost="localhost";
$dbUser="zxt";
$dbPwd="t";
$dbName="PM_" . $dbVersion;

$dbRoot="root";
$dbRootPwd="1qaz2wsx";

function createDB(){
    global $dbHost, $dbUser, $dbPwd, $dbName, $dbRoot, $dbRootPwd;
    $con = connectDB($dbHost, $dbRoot, $dbRootPwd);

    $sql = "CREATE DATABASE $dbName";
    if(mysql_query($sql, $con)){
        mysql_query("GRANT ALL ON $dbName.* TO $dbUser@'%'", $con);
        mysql_query("GRANT create routine ON $dbName" . ".*" . "TO $dbUser@'%'", $con);

    }
    else{printf("Create Database Failed\n");}
    mysql_close($con);

}

function clearDB(){
    global $dbHost, $dbUser, $dbPwd, $dbName, $dbRoot, $dbRootPwd;
    $con = connectDB($dbHost, $dbRoot, $dbRootPwd);

    $sql = "DROP DATABASE $dbName";
    mysql_query($sql, $con);
    mysql_close($con);
}


function connectDB($host, $name, $pwd){
    $con = mysql_connect($host, $name, $pwd);
    if(!$con){
        print("connect error\n");
    }
    return $con;
}

function exeSQL($sql){
    global $dbHost, $dbUser, $dbPwd, $dbName;
    $con=connectDB($dbHost, $dbUser, $dbPwd);
    mysql_select_db($dbName, $con);
    $result=mysql_query($sql, $con);
    mysql_close($con);
    return $result;
}

function createTable($xmlFile){
    $xml=simplexml_load_file($xmlFile);

    foreach ($xml->children() as $table){
	$tableName=$table->getName();
	$itemArray=array();
	foreach ($table->children() as $tableItem){
	    $itemName=$tableItem->getName();
	    $item=$tableItem;
	    array_push($itemArray, $itemName . " " . $item);
	}
	$sql="CREATE TABLE $tableName (" . join(",", $itemArray) . ")";
	//echo $sql . "\n";
	if(!exeSQL($sql)){echo "Create table $tableName failed\n";}
		
    }
}



function init(){
    clearDB();
    createDB();
    createTable("DbDesign.xml");
}



function addUser($userName, $password, $email, $gender){
    if(checkUser($userName, $email)>0) return;
    $sql="INSERT INTO UserInfoTable (UserName Password Email Gender) VALUES('$userName','$password','$email','$gender')";
    if(!exeSQL($sql)){printf("add user $userName failed");}
}

function setUserInfo($userID, $infoArray){
}


function addAlbum($userID, $albumName, $des, $createTime){
    $sql="INSERT INTO AlbumTable (UserID AlbumName Description CreateTime) VALUES('$userID', '$albumName', '$des', '$createTime')";
    if(!exeSQL($sql)){printf("add album $albumName failed");}
}

function addComment($userID, $picID, $comment, $createTime){
    $sql="INSERT INTO CommentTable (UserID PicID Comment CreateTime) VALUES('$userID', '$picID', '$comment', '$createTime')";
    if(!exeSQL($sql)){printf("add comment failed");}
}

function addMessage($fromID, $toID, $sendTime, $msgType, $message){
    $sql="INSERT INTO CommentTable (FromID toID SendTime MsgType Message) VALUES('$fromID', '$toID', '$sendTime', $msyType', '$message')";
    if(!exeSQL($sql)){printf("add message failed");}
}

function addPic($userID, $picName, $des, $picPath, $shootTime, $uploadTime, $longitude, $latitude, $likeNum, $albumID){
    $sql="INSERT INTO PicTable (UserID PicName Description PicPath ShootTime UploadTime Longitude Latitude LikeNum AlbumID) VALUES('$userID, $picName, $des, $picPath, $shootTime, $uploadTime, $longitude, $latitude, $likeNum, $albumID')";
    if(!exeSQL($sql)){printf("add pic error");}
}

function addFiend($fromID, $toID, $type, $createTime){
    $sql="INSERT INTO FriendTable (FromID toID Type CreateTime) VALUES('$fromID', '$toID', '$type', $createTime')";
    if(!exeSQL($sql)){printf("add message failed");}
}





function checkUser($userName, $email){
    $sql="SELECT UserID FROM UserInfoTable WHERE UserName='$userName' or Email='$email'";
    $reault=exeSQL($sql);
    $row=mysql_fetch_away($result);
    if(empty($row))return 0;
    else return 1;
}



init();



?>
