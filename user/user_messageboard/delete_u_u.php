<?php
    include("../../connect.php");
   
    $id=$_GET['umc_id'];
   	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
   
    $sql="DELETE FROM `user_mc` WHERE id=".$id;
    $result1 = mysql_query($sql);
    if($result1){
   	    echo "<script>alert('回复已经删除！');location='user_mb_manage.php?user_name=".$user_name." ';</script>";
    }
    else{
   	    echo "<script>alert('回复删除失败！');location='user_mb_manage.php?user_name=".$user_name." ';</script>";
    }
?>