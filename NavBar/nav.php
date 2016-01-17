<link href="nav.css" rel='stylesheet' type='text/css' />
<link href="button.css" rel='stylesheet' type='text/css' />
<link href="textinput.css" rel='stylesheet' type='text/css' />
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="nav.js"></script>




<div id="NavDiv">
<ul id="Nav">
  <li><a id="NavAll" href="javascript:navAll();">全部</a></li>
  <li><a id="NavOwn" href="javascript:navOwn()">我的</a></li>
  <li><input type="text" value="" class="textinput" /></li>
  <li><input type="button" value="搜索" class="button blue tags" /></li>
  <li><a id="NavUpload" href="javascript:navUpload()">上传</a></li>
  <li><a id="NavAlbum" href="javascript:navAlbum()">相册</a></li>
  <li><a id="NavFriend"  href="javascript:navFriend()">好友</a></li>
  <li><a id="NavMessage" href="javascript:navMessage()">消息</a></li>


  <?php
    session_start();

    if(isset($_SESSION['UserName'])){
      $userName=$_SESSION['UserName'];
      $userID=$_SESSION['UserID'];
      $str1='<li><a href="" class="LoginPart">注销</a></li>';
      $str2='<li><a href="" class="LoginPart">' . $userName . '</a></li>';
      printf($str1);
      printf($str2);
    }
    else{
      $str='<li><a href="" class="LoginPart">登录/注册</a></li>';
      printf($str);
    }
    
  ?>

</ul>
</div>
