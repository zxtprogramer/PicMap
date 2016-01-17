var commentList=new Array();

commentList[0]=new Array();
commentList[0]["UserName"]="zxt";
commentList[0]["Time"]="2016-1-17";
commentList[0]["Description"]="hell,world";
commentList[0]["HeadImg"]="";

commentList[1]=new Array();
commentList[1]["UserName"]="zxt";
commentList[1]["Time"]="2116-1-17";
commentList[1]["Description"]="hahahidddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddda";
commentList[1]["HeadImg"]="";

commentList[2]=new Array();
commentList[2]["UserName"]="zxt";
commentList[2]["Time"]="2226-2-27";
commentList[2]["Description"]="hahahidddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddda";
commentList[2]["HeadImg"]="";



function createCommentItem(index, userName, time, des, headImg){
    $con="<div id=\"ComItem" + index + "\" class=\"CommentItemDiv\">";
    $con=$con + "<div class=\"ComHeadImgDiv\"><img class=\"ComHeadImg\" src=\"" + headImg + "\" />";
    $con=$con + "<div class=\"ComDesDiv\"><h1>" + userName + "</h1><br />";
    $con=$con + "<h2>" + des + "</h2>";
    $con=$con + "</div>";
    return $con;
}

function showComment(){
    for(var i=0;i<commentList.length;i++){
        index=i;
        userName=commentList[i]['UserName'];
        time=commentList[i]['Time'];
        des=commentList[i]['Description'];
        headImg=commentList[i]['HeadImg'];
        $("#begin").append(createCommentItem(index,userName,time,des,headImg));
        
    }
}


showComment();


