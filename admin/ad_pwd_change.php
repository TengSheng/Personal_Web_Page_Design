<?php
    session_name("admin");
	session_start();
	$adname=$_SESSION['adname'];
	
    include("../connect.php");
    
    $admin_id=$_GET['admin_id'];
     if(isset($_GET['admin_id']))
    {
   	    $sql_1="UPDATE `user` SET `pwd`='123456' WHERE id=".$admin_id;
   	    $res_insert_1 = mysql_query($sql_1);
   	    if($res_insert_1){
   	        echo "<script>alert('用户密码已经重置！'); history.go(-1);</script>";
   	    }

   	}
 ?>