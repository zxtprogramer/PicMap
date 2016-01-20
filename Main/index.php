<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html  xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
	<link href="main.css" rel='stylesheet' type='text/css' />
    <title>PicMap</title>
  </head>

  <body>
    <div id="NavDiv">
	  <ul id="Nav">
	    <?php
		  session_start();
		  $str='';
		  //$_SESSION['UserName']="zxt";
		  if(isset($_SESSION['UserName'])){
		      $userName=$_SESSION['UserName'];
			  $userID=$_SESSION['UserID'];

			  if(isset($_GET['HomeUserName'])){
			      $homeUserName=$_GET['HomeUserName'];
			  }
			  else{
			      $homeUserName=$userName;
			  }

			  $str='<li><a id="NavAll" href="javascript:navAll();">全部</a></li>' .
			       '<li><a id="NavHomeUser" href="javascript:navHomeUser()">' . $homeUserName . '</a></li>' .
				   '<li><a id="NavAlbum" href="javascript:navAlbum()">相册</a></li>' .
				   '<li><a id="NavFriend"  href="javascript:navFriend()">好友</a></li>' .
			  	   '<li><input type="text" value="" class="textinput" /></li>' .
				   '<li><input type="button" value="搜索" class="button blue tags" /></li>' .
				   '<li><a id="NavMessage" href="javascript:navMessage()" class="NavSmallText">消息</a></li>' .
				   '<li><a id="NavOwn" href="javascript:navOwn()" class="NavSmallText">' . $userName . '</a></li>' .
				   '<li><a href="javascript:navLogout()" class="NavSmallText">注销</a></li>';
		  }
		  else{
			  $str='<li><a id="NavAll" href="javascript:navAll();">全部</a></li>' .
			  	   '<li><input type="text" value="" class="textinput" /></li>' .
				   '<li><input type="button" value="搜索" class="button blue tags" /></li>' .
				   '<li><a href="javascript:navLogin()" class="NavSmallText">登录</a></li>' . 
				   '<li><a href="javascript:navRegister()" class="NavSmallText">注册</a></li>'; 
		  }
		  printf($str);
		?>
	  </ul>
	</div>
	<div id="MainDiv">
	  <iframe id="MainIframe" src="../Map/Map.php">
	  </iframe>
	</div>

  </body>

  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="NavBar.js"></script>


</html>

