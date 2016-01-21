<?php
require("../dbase/dbFunction.php");

$sql="SELECT * FROM AlbumTable WHERE UserID=1";
$res=exeSQL($sql);
$index=0;
while($row=mysql_fetch_array($res)){
    $index=$index + 1;
    $albumName=$row['AlbumName'];
    $createTime=$row['CreateTime'];
    $picNum=$row['PicNum'];
    $facePicID=$row['FacePicID'];
    //print $albumName . " " . $createTime . " " . $picNum . " ". $facePicID;

}   

print date("Y/m/d",time());


?>
