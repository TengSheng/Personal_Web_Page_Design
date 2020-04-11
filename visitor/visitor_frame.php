<?php
    $id=$_GET['id'];
    $friend_name=$_GET['friend_name'];
?>

<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="UTF-8">
		<title></title>
	</head>
    
	    <frameset rows="600px,*" border="0" bordercolor="black" noresize>
	    	<!--<frame src="top.html" scrolling="no">-->
			
			<frameset rows="100px,*" border="0" bordercolor="black" noresize>	
				<frame src="visitor_iframe.php?id=<?php echo $id;?>&friend_name=<?php echo $friend_name;?>" scrolling="no" >	        
		        <frame name="visitor_iframe" src="visitor_welcome.php?id=<?php echo $id;?>&friend_name=<?php echo $friend_name;?>">	        
	        </frameset>
	        <frame src="bottom.html" scrolling="no">
	    </frameset>
	    <frame src="side.html" scrolling="no" >
	
	<noframes>
		<body>你的浏览器不支持框架集</body>
	</noframes>
</html>