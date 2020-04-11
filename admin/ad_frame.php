<?php

?>

<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="UTF-8">
		<title></title>
	</head>
    <frameset cols="150px,*,150px" border="0" bordercolor="black" noresize>
    	<frame src="side.html" scrolling="no" >
	    <frameset rows="60px,550px,*" border="0" bordercolor="black" noresize>
			<frame src="top.html" scrolling="no">
			<frameset cols="200,*" border="0" bordercolor="black" noresize>		        
		        <frame src="ad_iframe.php" scrolling="no" >
		        <frame name="iframe" src="ad_anmt_history.php">		        
	        </frameset>
	        <frame src="bottom.html" scrolling="no">
	    </frameset>
	    <frame src="side.html" scrolling="no" >
	</frameset>
	<noframes>
		<body>你的浏览器不支持框架集</body>
	</noframes>
</html>