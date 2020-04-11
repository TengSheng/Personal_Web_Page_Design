<?php
	session_name("admin");
	session_start();

    $user_name=$_GET['user_name'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../css/visitor.css"/>
		<!--<script type="text/javascript" src="visitor.js">
			
		</script>-->
	</head>
	<body style="background-image: url(../../bg_image/13.jpg);background-size: 1366px,800px;background-position-y: -30px;">
		<div id="id_div_1">			
			<span id="id_span_0"><a href="visitor_welcome.php?user_name=<?php echo $user_name;?>" target="visitor_iframe">首页</a></span>
			<span id="id_span_1"><a href="visitor_talkabout.php?user_name=<?php echo $user_name;?>" target="visitor_iframe">说说</a></span>			    
			<span id="id_span_2"><a href="visitor_scan_album.php?user_name=<?php echo $user_name;?>" target="visitor_iframe">相册</a></span>			    
			<span id="id_span_3"><a href="visitor_journal.php?user_name=<?php echo $user_name;?>" target="visitor_iframe">日志</a></span>			    
			<span id="id_span_4"><a href="visitor_mb.php?user_name=<?php echo $user_name;?>" target="visitor_iframe">留言板</a></span>			
			<a href="visitor_unset.php?user_name=<?php echo $user_name;?>" ><input type="button" id="id_span_5" value="退出登录"/></a>					
		</div>
		
	</body>
</html>