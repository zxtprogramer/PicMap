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
    $con="<li id=\"ComItem" + index + "\" " + "> <img class=\"ComHeadImg\" src=\"" + headImg + "\" />";
    $con=$con + "<span class=\"NameSpan\">" + userName + "</span> ";
    $con=$con + "<span class=\"DesSpan\">" + time + "<br />" + des + "</span>";
    $con=$con + "</li><br /><br />";
    return $con;
}


function showComment(){
        $("#CommentList").empty();
    for(var i=0;i<commentList.length;i++){
        index=i;
        userName=commentList[i]['UserName'];
        time=commentList[i]['Time'];
        des=commentList[i]['Description'];
        headImg=commentList[i]['HeadImg'];
        $("#CommentList").append(createCommentItem(index,userName,time,des,headImg));
        
    }
    $("#ComItem0").css("background","#abb");
    $("#ComItem0").css("height","100px");
    $("#ComItem0").css("margin","0px");
}


showComment();


