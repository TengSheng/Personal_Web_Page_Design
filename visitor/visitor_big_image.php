<?php
    $id_1=$_GET['id'];
    $friend_name=$_GET['friend_name'];
    
	include("../connect.php");
	
	$sql_7="SELECT `name` FROM `user` WHERE id=".$id_1;
	$result_7=mysql_query($sql_7);
	$row_7 = mysql_fetch_array($result_7);

	$name=$row_7['name'];
    
    $image_id=$_GET['image_id'];
    $album_id=$_GET['album_id'];
    
    if($_GET['image_id'])
    {
    	$sql="SELECT `name`, `file`, `date`, `type`, `album_name` FROM `user_image` WHERE id=".$image_id;
    	$result = mysql_query($sql); 
        $row = mysql_fetch_array($result);
        $album_name = $row['album_name'];
    }
//  $album_name=$_GET['album_name'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			.a_return{
            	position: absolute;
            	top: 10px;
		    	left: 10px;
            }
		</style>
	</head>
	<body style="position: relative;background: white;">
		<a href="visitor_scan_image.php?album_id=<?php echo $album_id;?>&album_name=<?php echo $album_name;?>&id=<?php echo $id_1?>&friend_name=<?php echo $friend_name;?>">
	        <input type="button" value="返回上一页" />
	   </a>
		<?php 
		    $sql_1="SELECT `album_name` FROM `user_image` WHERE id=".$image_id;
    	    $result_1 = mysql_query($sql_1); 
            $row_1 = mysql_fetch_array($result_1);
            if($row_1['album_name']=="个人照片")
            {
        ?>
        <img src="<?php echo $row['file'];?>" style=" width:370px; height:500px;position: absolute;top:20px;left: 500px;border-radius:5px;"/>
        <?php
            }
            else{
		?>
		<img src="<?php echo $row['file'];?>" style=" width:800px; height:500px;position: absolute;top:20px;left: 250px;border-radius:5px;"/>
        <?php            	
            }
		?>
	</body>
</html>
