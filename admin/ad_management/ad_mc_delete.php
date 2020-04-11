<?php
   include("../../connect.php");
   
   $id=$_GET['comment_id'];
   
   $sql="DELETE FROM `admin_mc` WHERE id=".$id;
   $result1 = mysql_query($sql);
   if($result1){
   	echo "<script>alert('回复已经删除！');location='ad_mb_manage.php';</script>";
   }
   else{
   	echo "<script>alert('回复删除失败！');location='ad_mb_manage.php';</script>";
   }
?>