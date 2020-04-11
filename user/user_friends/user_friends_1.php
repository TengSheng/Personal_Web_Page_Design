<?php
	session_name("admin");
	session_start();
	
    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    
    $friends_id=$_GET['friends_id'];
    $user_id=$_GET['user_id'];
    if($_GET['friends_id']&&$_GET['user_id'])
    {
    	$sql="UPDATE `user_friends` SET `accept`='yes',`inform_read`='yes' WHERE id=".$friends_id;
    	$result = mysql_query($sql); 
    	$sql_1="UPDATE `user_friends` SET `accept`='yes',`inform_read`='yes' WHERE user_id=".$user_id;
    	$result_1 = mysql_query($sql_1); 
    	echo "<script>alert('接受好友添加！');history.go(-1);</script>";
    }
    
    
?>