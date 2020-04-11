<?php
    include("../../connect.php");
   
    $id=$_GET['comment_id'];
   
    $sql="DELETE FROM `visitor_comment` WHERE id=".$id;
    $result = mysql_query($sql);
   
    $sql_4="DELETE FROM `user_replay` WHERE cm_id=".$id;
    $result_4 = mysql_query($sql_4);
   
   if($result){
   	echo "<script>alert('评论已经删除！');location='ad_ta_manage.php';</script>";
   }
   else{
   	echo "<script>alert('评论删除失败！');location='ad_ta_manage.php';</script>";
   }
?>