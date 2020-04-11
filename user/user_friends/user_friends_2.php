<?php
	session_name("admin");
	session_start();
	
    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    
    $id=$_GET['friends_id'];
    if($_GET['friends_id'])
    {
    	$sql="UPDATE `user_friends` SET `inform_read`='yes' WHERE id=".$id;
    	$result = mysql_query($sql); 
    	echo "<script>alert('消息已读！');history.go(-1);</script>";
    }
?>