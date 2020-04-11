<?php

   include("../connect.php");
   
   $id=$_GET['anmt_id'];
   
   $sql="DELETE FROM `ad_announcement` WHERE id=".$id;
   $result1 = mysql_query($sql);
   if($result1){
   	echo "<script>alert('公告已经删除！');location='ad_anmt_history.php';</script>";
   }
   else{
   	echo "<script>alert('公告删除失败！');location='ad_anmt_history.php';</script>";
   }
?>