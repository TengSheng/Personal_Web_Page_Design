<?php
    session_name("admin");
	session_start();
	$adname=$_SESSION['adname'];
	
    include("../connect.php");
    
    $admin_id=$_GET['admin_id'];
     if(isset($_GET['admin_id']))
    {
    	$sql = "SELECT * FROM `user` WHERE id=".$admin_id;  
        $result = mysql_query($sql);  
        $row = mysql_fetch_array($result);
                
   	    if($row['login_limit']=="yes")
   	    {
   	        $sql_1="UPDATE `user` SET `login_limit`='no' WHERE id=".$admin_id;
   	        $res_insert_1 = mysql_query($sql_1);
   	        if($res_insert_1){
   	            echo "<script>alert('用户登录权限禁止！'); history.go(-1);</script>";
   	        }
   	    }else{
   	    	$sql_2="UPDATE `user` SET `login_limit`='yes' WHERE id=".$admin_id;
   	        $res_insert_2 = mysql_query($sql_2);
   	        if($res_insert_2){
   	            echo "<script>alert('用户登录权限允许！'); history.go(-1);</script>";
   	        }
   	    }
   	}
 ?>