<?php
    include("../../connect.php");
   
    $id=$_GET['vmb_id'];
    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
   
    $sql="DELETE FROM `visitor_mb` WHERE id=".$id;
    $result1 = mysql_query($sql);
   
    $sql_1="DELETE FROM `user_mc` WHERE vmb_id=".$id;
    $result_1 = mysql_query($sql_1);
   
    if($result1){
    	echo "<script>alert('留言已经删除！');location='user_mb_manage.php?user_name=".$user_name." ';</script>";
    }
    else{
   	    echo "<script>alert('留言删除失败！');location='user_mb_manage.php?user_name=".$user_name." ';</script>";
   }
?>