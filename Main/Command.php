<?php
  require("../dbase/dbFunction.php");
  session_start();
  if(isset($_SESSION['UserName'])){
      $userName=$_SESSION['UserName'];
      $userID=$_SESSION['UserID'];

      if(isset($_POST['cmd'])){
          $cmd=$_POST['cmd'];
          switch($cmd){
              case 'newAlbum':
        	      $albumName=$_POST['AlbumName'];
        	      $albumDes=$_POST['AlbumDes'];
				  addAlbum($userID, $albumName, $albumDes, time());
        	      break;
          }
      }
  }
?>
