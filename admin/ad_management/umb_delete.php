<?php
    include("../../connect.php");
   
    $id=$_GET['umb_id'];
   
    $sql="DELETE FROM `user_mb` WHERE id=".$id;
    $result1 = mysql_query($sql);
   
    $sql_1="DELETE FROM `admin_mc` WHERE umb_id=".$id;
    $result_1 = mysql_query($sql_1);
   
    if($result1){
   	    echo "<script>alert('留言已经删除！');location='ad_mb_manage.php';</script>";
    }
    else{
   	    echo "<script>alert('留言删除失败！');location='ad_mb_manage.php';</script>";
   }
?>