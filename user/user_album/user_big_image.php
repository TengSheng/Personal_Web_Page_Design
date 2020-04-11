<?php
	session_name("admin");
	session_start();

	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];	
	
    include("../../connect.php");
    
    $image_id=$_GET['image_id'];
    $album_id=$_GET['album_id'];
    
    if($_GET['image_id'])
    {
    	$sql="SELECT `name`, `file`, `date`, `type`, `album_name` FROM `user_image` WHERE id=".$image_id;
    	$result = mysql_query($sql); 
        $row = mysql_fetch_array($result);
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body style="position: relative;background: whitesmoke;">
		<a href="user_scan_image.php?album_id=<?php echo $album_id;?>&user_name=<?php echo $user_name;?>" style="position: absolute;top: 10px;left: 10px;">
			<input type="button" value="返回上一页" />
		</a>
		<?php 
		    $sql_1="SELECT `name`, `file`, `date`, `type`, `album_name` FROM `user_image` WHERE id=".$image_id;
    	    $result_1 = mysql_query($sql_1); 
            $row_1 = mysql_fetch_array($result_1);
            if($row_1['album_name']=="个人照片")
            {
        ?>
        <img src="../<?php echo $row['file'];?>" style=" width:370px; height:500px;position: absolute;top:20px;left: 500px;border-radius:5px;"/>
        <?php
            }
            else{
		?>
		<img src="../<?php echo $row['file'];?>" style=" width:800px; height:500px;position: absolute;top:20px;left: 250px;border-radius:5px;"/>
        <?php            	
            }
		?>
	</body>
</html>
