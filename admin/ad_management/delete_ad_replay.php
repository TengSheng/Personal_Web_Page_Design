<?php
   include("../../connect.php");
   
   $id=$_GET['replay_id'];
   
   $sql="DELETE FROM `user_replay` WHERE id=".$id;
   $result = mysql_query($sql);
   if($result){
   	echo "<script>alert('回复已经删除！');location='ad_ta_manage.php';</script>";
   }
   else{
   	echo "<script>alert('回复删除失败！');location='ad_ta_manage.php';</script>";
   }
?>