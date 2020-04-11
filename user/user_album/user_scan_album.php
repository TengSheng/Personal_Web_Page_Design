<?php
    session_name("admin");
	session_start();
    
    $user_name=$_GET['user_name']; 	
    $name=$_SESSION[$user_name];

	
    include("../../connect.php");
    
    if(isset($_GET['page'])) 
    {
    	$page=$_GET['page'];
    }else{
    	$page=1;
    }
    
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
		    .class_album{
		    	width: 920px;
		    	position: absolute;
		    	top: 50px;
		    	left: 250px;
		    }
			.div_image{
				width: 200px;height: 150px;
				border: 1px solid black;
				text-align: center;
				margin-right: 10px;
				border-radius: 5px;
			}
			.div_album{
				float: left;
			}
			a{
				text-decoration: none;
				color: #000000;
			}
			a:hover{
		     	color: red;
            }
			.div_page{
				width: 820px;height: 25px;
				border: 1px solid black;
				
				position: absolute;
				top: 250px;
				left: 0px;
			}
			.span_page{
				
				position: absolute;
				top: 0px;
				right: 10px;
			}
		</style>

	</head>
	<body style="background-image: url(../../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />	
		
		 <?php
		    if($page==""){
		    	$page=1;
		    }
		    if(is_numeric($page))
		    {
		    	$page_size=4;
		    	$sql_5=" select count(*) as total from `user_album` WHERE name='$name' order by id desc ";
			    $result_5 = mysql_query($sql_5); 
			    $message_count=mysql_result($result_5,0,"total");
			    $page_count=ceil(($message_count)/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		<?php 
			$sql_4=" SELECT * FROM `user_album` WHERE name='$name' order by id desc limit $offset,$page_size";
			$result_4 = mysql_query($sql_4); 
		?>	
	<div class="class_album">		
		<hr />
		<?php		    
		    while($row_1 = mysql_fetch_array($result_4))
		    {
		    	$album_name=$row_1['album'];
		    	$sql_3="SELECT * FROM `user_image` WHERE album_name='$album_name' ORDER BY id DESC";
			    $result_3 = mysql_query($sql_3); 
			    if($row_3 = mysql_fetch_array($result_3))
			    {
		?>
		<div class="div_album">
			<div class="div_image">
	        <?php 
				if($row_3['album_name']=="个人照片")
				{				
		    ?>
				<img src="../<?php echo $row_3['file']?>" width="110px" height="150px"/>
			<?php
			    }else{
			?>
			    <img src="../<?php echo $row_3['file']?>" width="200px" height="150px"/>
			<?php
			    }
			?>
			</div>
			<div class="">
				<span id="">相册：</span><?php echo $row_1['album']?><br />
			    <span id="">描述：</span><?php echo $row_1['description']?><br />
			    <a href="user_scan_image.php?album_id=<?php echo $row_1['id']?>&user_name=<?php echo $user_name;?>" >
			    	<input type="button" value="查看照片" />
			    </a>
			</div>
		</div>		
		<?php
		        }else{
		?>
		<div class="div_album">
			<div class="div_image">请添加照片</div>
			<div class="">
				<span id="">相册：</span><?php echo $row_1['album']?><br />
			    <span id="">描述：</span><?php echo $row_1['description']?><br />
			    <a href="user_scan_image.php?album_id=<?php echo $row_1['id']?>&user_name=<?php echo $user_name;?>" >
			    	<input type="button" value="查看照片" />
			    </a>
			</div>
		</div>	
		<?php
			      }
			}
		?>
		<div id="" style="clear: all;"></div>
	    <div class="div_page">	    		
	                   页次：<?php echo $page?>/<?php echo $page_count?>页记录：<?php echo $message_count?>条	
	        <span class="span_page">         		        
		    <?php
		        if($page==1&&$page_count>1)
		    	{		    		    
		    		echo "<a href='user_scan_album.php?page=".($page_count)."&user_name=".($user_name)." '>尾页|</a>";
		    		echo "<a href='user_scan_album.php?page=".($page+1)."&user_name=".($user_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='user_scan_album.php?page=".($page-1)."&user_name=".($user_name)." '>上一页|</a>";
		    		echo "<a href='user_scan_album.php?page=".($page+1)."&user_name=".($user_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='user_scan_album.php?page=1&user_name=".($user_name)." '>首页|</a>";
		    		echo "<a href='user_scan_album.php?page=".($page-1)."&user_name=".($user_name)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span> 
		</div> 
	</div>	
	</body>
</html>
