<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html  xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <link href="Album.css" rel='stylesheet' type='text/css' />
  <title>Album</title>
  </head>

  <body>

  <div class="Mask" id="NewAlbumDivMask"></div>

  <div class="NewAlbumDiv" id="NewAlbumDiv">
    <h1>新建相册</h1>
    <h2>相册名</h2>
    <input type="text" id="NewAlbumName" name="NewAlbumName" />
    <h2>描述</h2>
    <input type="text" id="NewAlbumDes" name="NewAlbumDes" />
    <input type="button" class="" value="新建" onclick="newAlbum()" /> 
    <input type="button" class="" value="取消" onclick="newAlbumHide()"/> 
  </div>

  <div class="AlbumBar">
  <?php
    session_start();
	$userName=$_SESSION['UserName'];
	$homeUserName=$_GET['HomeUserName'];
	//$str='<script type="text/javascript">var userName="' . $userName . '"; var homeUserName="' . $homeUserName . '";</script>';
	//printf($str);
	$str="";
	if($userName==$homeUserName){
		$str='<span class="AlbumTitle"><a href="javascript:showAlbum()">我的相册</a></span>';
		$str=$str . '<span class="AlbumTitle"><a href="javascript:recentPic()">最近照片</a></span>';
		$str=$str . '<span class="AlbumTitle"><a href="javascript:newAlbumShow()">新建相册</a></span>';
	}
	else{
		$str='<span class="AlbumTitle">' . $homeUserName . '的相册' . '</span>';
		$str=$str . '<span class="AlbumTitle">最近照片</span>';
	}

	printf($str);
  ?>

  </div>
    

    <ul class="AlbumUL" id="AlbumUL">

    <?php
      require("../dbase/dbFunction.php");
      $homeUserID=getUserID($homeUserName);
      function createAlbumItem($index, $albumName, $imgPath, $createTime){
          $str='<li><div class="AlbumItemDiv" id="AlbumItemDiv' . $index . '">' . 
               '<div class="AlbumImgDivB1"></div>' .
               '<div class="AlbumImgDivB2"></div>' .
               '<div class="AlbumImgDiv">' .
               '  <img src="' . $imgPath . '" />' .
               '</div>' .
               '  <span class="AlbumItemTitle">' . $albumName . ' (' . $createTime . ')' . '</span>' .
               '</div></li>';
          return $str;
      } 
    
      $sql="SELECT * FROM AlbumTable WHERE UserID='$homeUserID'";
      $res=exeSQL($sql);
      $index=0;
      while($row=mysql_fetch_array($res)){
          $index=$index + 1;
          $albumID=$row['AlbumID'];
          $albumName=$row['AlbumName'];
          $createTime=date("Y/m/d",$row['CreateTime']);
          $picNum=$row['PicNum'];
          $facePicID=$row['FacePicID'];

          $sql2="SELECT PicPath FROM PicTable WHERE AlbumID=$albumID LIMIT 0,1";
          $res2=exeSQL($sql2);
          $row2=mysql_fetch_array($res2);
          $facePicPath=$row2[0]."_snap.jpg";
          $str=createAlbumItem($index, $albumName, $facePicPath, $createTime); 
          printf($str);
      }
    ?>
    
<!--
      <li>
	    <div class="AlbumItemDiv">
          <div class="AlbumImgDivB1" id="AlbumImg0"></div>
          <div class="AlbumImgDivB2" id="AlbumImg0"></div>
          <div class="AlbumImgDiv" id="AlbumImg0">
            <img src="/images/0.JPG" />
    	  </div>
            <span>hello</span>
    	</div>
      </li>
-->


    </ul>
  </body>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="Album.js"></script>

</html>

