<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html  xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <link href="Album.css" rel='stylesheet' type='text/css' />
  <title>Album</title>
  </head>

  <body>

  <div class="NewAlbumDiv">
    <h1>新建相册</h1>
	<h2>相册名</h2>
	<input type="">
	<h2>描述</h2>
	<input type="">
     
  </div>

  <div class="AlbumBar">
  <?php
    session_start();
	$userName=$_SESSION['UserName'];
	$homeUserName=$_GET['HomeUserName'];
	$str="";
	if($userName==$homeUserName){
		$str='<span class="AlbumTitle">我的相册</span>';
		$str=$str . '<span class="AlbumTitle">最近照片</span>';
		$str=$str . '<span class="AlbumTitle">新建相册</span>';
	}
	else{
		$str='<span class="AlbumTitle">' . $homeUserName . '的相册' . '</span>';
		$str=$str . '<span class="AlbumTitle">最近照片</span>';
	}
	printf($str);
  ?>

  </div>
    

    <ul class="AlbumUL" id="AlbumUL">
    
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

    </ul>
  </body>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="Album.js"></script>

</html>

