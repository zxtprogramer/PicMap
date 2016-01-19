<link href="PicBrowser.css" rel='stylesheet' type='text/css' />
<link href="../PicView/PicView.css" rel='stylesheet' type='text/css' />
<link href="../CommentView/CommentView.css" rel='stylesheet' type='text/css' />

<div class="PicBrowserDiv">

  <div class="PicViewFrame" id="PicViewFrame">

    <div class="PicViewDiv" id="PicViewDiv">
      <img src="" id="PicViewImg"/>
      <a href="javascript:viewBack();"><div class="BackDiv"></div></a>
      <a href="javascript:viewNext();"><div class="NextDiv"></div></a>
      <div class="ImgListDiv" id="ImgListDiv">
      </div>
    </div>
    

  </div>

  <div class="CommentFrame" id="CommentFrame">

    <div class="CommentViewDiv" id="CommentViewDiv">
      <ul class="CommentList" id="CommentList">
      </ul>
    
      <textarea class="ComText" id="ComText"></textarea>
      <input type="button" value="发表评论" id="ButtonComment" />
      <input type="button" value="赞" id="ButtonLike" />

    </div>

  </div>


</div>


<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="../PicView/PicView.js"></script>
<script type="text/javascript" src="../CommentView/CommentView.js"></script>

