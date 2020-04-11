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
		<link rel="stylesheet" type="text/css" href="../css/user.css"/>
		<script type="text/javascript" src="../js/user.js">
	
		</script>
	</head>
	<body style="background-image: url(../bg_image/13.jpg);background-size: 1366px,800px;background-position-y:-30px ;">
		<div id="id_div_1">			
			<span id="id_span_0"><a href="#" class="span">首页</a></span>
			    <div id="id_div_6">
			     	<ul id="ul_wel">
			     		<li><a href="user_anmt.php?user_name=<?php echo $user_name;?>" target="iframe">欢迎界面</a></li>
			     		<li><a href="user_im_check.php?user_name=<?php echo $user_name;?>" target="iframe">个人信息</a></li>
			     	</ul>
			    </div>
			<span id="id_span_1"><a href="#" class="span">说说</a></span>
			    <div id="id_div_2">
			     	<ul id="ul_talk">
			     		<li><a href="user_talkabout/user_control.php?user_name=<?php echo $user_name;?>" target="iframe">管理说说</a></li>
			     		<li><a href="user_talkabout/user_talkabout.php?user_name=<?php echo $user_name;?>" target="iframe">发表说说</a></li>
			     	</ul>
			    </div>
			<span id="id_span_2"><a href="#" class="span">相册</a></span>
			    <div id="id_div_3">
			     	<ul id="ul_album">
			     		<li><a href="user_album/user_album.php?user_name=<?php echo $user_name;?>" target="iframe">管理相册</a></li>
			     		<li><a href="user_album/user_scan_album.php?user_name=<?php echo $user_name;?>" target="iframe">查看相册</a></li>
			     	</ul>
			    </div>
			<span id="id_span_3"><a href="#" class="span">日志</a></span>
			    <div id="id_div_4">
			     	<ul id="ul_jour">
			     		<li><a href="user_journal/user_jl_manage.php?user_name=<?php echo $user_name;?>" target="iframe">管理日志</a></li>
			     		<li><a href="user_journal/user_journal.php?user_name=<?php echo $user_name;?>" target="iframe">添加日志</a></li>
			     	</ul>
			    </div>
			<span id="id_span_4"><a href="#" class="span">留言板</a></span>
			    <div id="id_div_5">
			        <ul id="ul_leave">
			     	    <li><a href="user_messageboard/user_mb_manage.php?user_name=<?php echo $user_name;?>" target="iframe">管理留言板</a></li>
			     	    <li><a href="user_messageboard/user_mb.php?user_name=<?php echo $user_name;?>" target="iframe">给管理员留言</a></li>
			        </ul>
			    </div>
			<span id="id_span_5"><a href="#" class="span">网站好友</a></span>
			    <div id="id_div_7">
			        <ul id="ul_friends">
			     	    <li><a href="user_friends/user_friends.php?user_name=<?php echo $user_name;?>" target="iframe">管理好友</a></li>
			     	    <!--<li><a href="#" target="iframe">好友聊天</a></li>-->
			        </ul>
			    </div>
			<a href="user_unset.php?user_name=<?php echo $user_name;?>" ><input type="button" id="id_input_1" value="退出登录"/></a>	
		</div>
		
	</body>
</html>