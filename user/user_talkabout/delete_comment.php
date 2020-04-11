<?php
    include("../../connect.php");
   
    $id=$_GET['comment_id'];
    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
   
    $sql="DELETE FROM `visitor_comment` WHERE id=".$id;
    $result1 = mysql_query($sql);
   
    $sql_2="DELETE FROM `user_replay` WHERE cm_id=".$id;
    $result_2 = mysql_query($sql_2);
    
    if($result1){
    	echo "<script>alert('评论已经删除！');location='user_control.php?user_name=".$user_name." ';</script>";
    }
    else{
   	    echo "<script>alert('评论删除失败！');location='user_control.php?user_name=".$user_name." ';</script>";
    }
?>