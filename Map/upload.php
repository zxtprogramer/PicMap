<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>

   <script type="text/javascript" src="js/jquery.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">

    <link href="css/upload.css" rel='stylesheet' type='text/css' />
    <title>upload</title>

</head>

<body>

<form class="" action="../Main/Command.php" method="post" enctype="multipart/form-data">
  上传<br />
  文件: <input type="file" name="file" id="file" value=""/><br />
  相册: <input type="text" name="upAlbumName" id="upAlbumName" value=""/><br />
  位置: <input type="text" name="upPicPos" id="upPicPos" /><br />
  备注: <input type="text" name="upPicDes" id="upPicDes" /><br />
  <input type="submit" value="上传" class=""/>
  <input type="button" value="取消" class="" onclick="javascript:parent.navUploadPicHide()"/>
  <input type="hidden" name="cmd" value="uploadPic" />
  <input type="hidden" name="upAlbumID" id="upAlbumID" value=""/><br />
</form>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript">
  var albumID=parent.albumID;
  var albumName=parent.albumName;
  $("#upAlbumName").attr("value", albumName);
  $("#upAlbumID").attr("value", albumID);
</script>


</body>

</html>
