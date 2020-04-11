<?php
    include("../../connect.php");
   
    $id=$_GET['journal_id'];
    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
   
    $sql="DELETE FROM `user_journal` WHERE id=".$id;
    $result1 = mysql_query($sql);
    if($result1){
   	   echo "<script>alert('日志已经删除！');location='user_jl_manage.php?user_name=".$user_name." ';</script>";
    }
    else{
   	    echo "<script>alert('日志删除失败！');location='user_jl_manage.php?user_name=".$user_name." ';</script>";
    }
?>