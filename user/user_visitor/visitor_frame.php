<?php
	session_name("admin");
	session_start();

    $user_name=$_GET['user_name'];

?>

<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="UTF-8">
		<title></title>
	</head>
    
	    <frameset rows="600px,*" border="0" bordercolor="black" noresize>
			
			<frameset rows="100px,*" border="0" bordercolor="black" noresize>	
				<frame src="visitor_iframe.php?user_name=<?php echo $user_name;?>" scrolling="no" >	        
		        <frame name="visitor_iframe" src="visitor_welcome.php?user_name=<?php echo $user_name;?>">
	        </frameset>
	        <frame src="bottom.html" scrolling="no">
	    </frameset>
	    <frame src="side.html" scrolling="no" >
	
	<noframes>
		<body>你的浏览器不支持框架集</body>
	</noframes>
</html>