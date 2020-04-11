<?php
    session_name("admin");
	session_start();
	
	var_dump($_SESSION);
	
	$user_name=$_GET['user_name'];
	unset($_SESSION[$user_name]);
	
	if(!isset($_SESSION[$user_name]))
	{
//	{
//		$tiaozhuan='../login_1.php';//页面地址
//		header('top.location:'.$tiaozhuan);//跳转页面
//	}
?>
<script>
	if(window.confirm('您确定要退出吗？')) {
		top.location = '../login_1.php';
	}
</script>
<?php 
   }
?>