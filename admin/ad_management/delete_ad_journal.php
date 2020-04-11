<?php
   include("../../connect.php");
   
   $id=$_GET['journal_id'];
   
   $sql="DELETE FROM `user_journal` WHERE id=".$id;
   $result1 = mysql_query($sql);
   if($result1){
   	echo "<script>alert('日志已经删除！');location='ad_journal.php';</script>";
   }
   else{
   	echo "<script>alert('日志删除失败！');location='ad_journal.php';</script>";
   }
?>