<?php
    include("../../connect.php");
   
    $id=$_GET['talkabout_id'];
    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
    
    $sql_1=" SELECT `id` FROM `visitor_comment` WhERE ta_id=".$id;//从visitor_comment中取出评论的id
    $result_1 = mysql_query($sql_1);
    $row_1 = mysql_fetch_array($result_1);
    $comment_id=$row_1['id'];
    
    $sql="DELETE FROM `user_talkabout` WHERE id=".$id;
    $result1 = mysql_query($sql);
    
    $sql_2="DELETE FROM `visitor_comment` WHERE id=".$comment_id;
    $result_2 = mysql_query($sql_2);
    
    $sql_4="DELETE FROM `user_replay` WHERE cm_id=".$comment_id;
    $result_4 = mysql_query($sql_4);

    
    if($result1){
   	    echo "<script>alert('说说已经删除！');location='user_control.php?user_name=".$user_name." ';</script>";
    }
    else{
   	    echo "<script>alert('说说删除失败！');location='user_control.php?user_name=".$user_name." ';</script>";
    }

?>