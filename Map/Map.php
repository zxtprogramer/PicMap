<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html  xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
      <link href="Map.css" rel='stylesheet' type='text/css' />
      <link href="PicPanel.css" rel='stylesheet' type='text/css' />
    <title>Map</title>
  </head>

  <body>
    <div id="PicPanelDiv" class="PicPanelDiv">
      <div id="PicPanelToolDiv" class="PicPanelToolDiv">
	<a href="javascript:befPic()">Bef</a>
	<a href="javascript:nextPic()">Next</a>
	<a href="javascript:nextGroup()">换一批</a>
	排序
	<select id="SortTypeSel" onclick="">
	  <option value="ShootTime">时间</option>
	  <option value="LikeNum">好评</option>
	  <option value="Rand">随机</option>
	</select>
	数目
	<input type="text" id="PicNumText" value="20" />
	<input type="button" id="Apply" onclick="applyFun()" value="应用" />
	
      </div>

      <div id="PicPanelImgDiv" class="PicPanelImgDiv">
	<img id="PicPanelImg" class="PicPanelImg" src="" />
      </div>

      <div id="PicPanelCmtDiv" class="PicPanelCmtDiv">
      </div>
      
    </div>
    
    <div id="MapContainer" tabindex="0" />
  </body>


  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=605574e6236d5b46cff5ddfe4ac9f437"></script>
  <script type="text/javascript" src="PicPanel.js"></script>
  <script type="text/javascript" src="Map.js"></script>

</html>

