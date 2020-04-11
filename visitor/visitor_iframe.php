<?php
    $id=$_GET['id'];
    $friend_name=$_GET['friend_name'];
    
    include("../connect.php");
    
    if($_GET['id'])
    {
        $sql_1="SELECT `name` FROM `user` WHERE id=".$id;
	    $result_1=mysql_query($sql_1);
	    $row_1 = mysql_fetch_array($result_1);

	    $name=$row_1['name'];
	    echo $name;
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/visitor.css"/>
		<style type="text/css">
			.headimg{				
				width: 30px;height: 30px;
				border: 1px solid black;
				border-radius: 15px;
				margin-bottom: -5px;
			}
		</style>
		<script type="text/javascript" src="../js/visitor.js">
			
		</script>
	</head>
	<body style="background-image: url(../bg_image/13.jpg);background-size: 1366px,800px;background-position-y:-30px ;">
		<div id="id_div_1">	
			<?php
			    $sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			    $res_insert1 = mysql_query($sql_insert1);
			    $row_insert1 = mysql_fetch_array($res_insert1);
			?>
			<span id="id_span_6">
				<img src="<?php echo $row_insert1['headimg'];?>" class="headimg"/><?php echo $name;?>
			</span>
			<span id="id_span_0">
				<a href="visitor_welcome.php?id=<?php echo $id;?>&friend_name=<?php echo $friend_name;?>" target="visitor_iframe">首页</a>
			</span>
			<span id="id_span_1">
				<a href="visitor_talkabout.php?id=<?php echo $id;?>&friend_name=<?php echo $friend_name;?>" target="visitor_iframe">说说</a>
			</span>			    
			<span id="id_span_2">
				<a href="visitor_scan_album.php?id=<?php echo $id;?>&friend_name=<?php echo $friend_name;?>" target="visitor_iframe">相册</a>
			</span>			    
			<span id="id_span_3">
				<a href="visitor_journal.php?id=<?php echo $id;?>&friend_name=<?php echo $friend_name;?>" target="visitor_iframe">日志</a>
			</span>			    
			<span id="id_span_4">
				<a href="visitor_mb.php?id=<?php echo $id;?>&friend_name=<?php echo $friend_name;?>" target="visitor_iframe">留言板</a>
			</span>			
		</div>
		
	</body>
</html>