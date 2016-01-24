<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html  xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
	<link href="main.css" rel='stylesheet' type='text/css' />
    <title>PicMap</title>
  </head>

  <body>
    <script type=text/javascript>
      var userID=0, userName="";
      var homeUserID=0, homeUserName="";
      var albumID=0, albumName="";
    </script>

    <div id="NavDiv">
	  <ul id="Nav">
	    <?php
		  session_start();
		  $str='';
		  if(isset($_SESSION['UserName'])){
		      $userName=$_SESSION['UserName'];
			  $userID=$_SESSION['UserID'];

			  if(isset($_GET['HomeUserName'])){
			      $homeUserName=$_GET['HomeUserName'];
			  }
			  else{
			      $homeUserName=$userName;
			  }

			  $str='<li id="NavPath"><a href="javascript:navGoto(\"all\");">全部></a></li>' .
			  	   '<li><input type="text" value="" class="textinput" /></li>' .
				   '<li><input type="button" value="搜索" class="" /></li>' .
				   '<li><a id="NavOwn" href="javascript:navOwn()" class="NavSmallText">' . $userName . '</a></li>' .
				   '<li><a id="NavSet" href="javascript:navSet()" class="NavSmallText">设置</a></li>' .
				   '<li><a href="javascript:navLogout()" class="NavSmallText">注销</a></li>';
		  }
		  else{
			  $str='<li id="NavPath"><a href="javascript:navGoto(\"all\");">全部></a></li>' .
			  	   '<li><input type="text" value="" class="textinput" /></li>' .
				   '<li><input type="button" value="搜索" class="button blue tags" /></li>' .
				   '<li><a href="javascript:navLogin()" class="NavSmallText">登录</a></li>' . 
				   '<li><a href="javascript:navRegister()" class="NavSmallText">注册</a></li>'; 
		  }
		  $str=$str . "<script type=text/javascript>var userName=\"$userName\"; var userID=\"$userID\";</script>";
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

