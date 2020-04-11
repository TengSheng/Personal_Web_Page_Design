<?php
    session_name("admin");
	session_start();
	$adname=$_SESSION['adname'];
	
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
		    	width: 820px;
		    	position: absolute;
		    	top: 50px;
		    	left: 20px;
		    }
			.div_image{
				width: 200px;height: 150px;
				border: 1px solid black;
				text-align: center;
			}
			.div_album{
				float: left;
			}
			#id_div_add{
				width: 300px;height: 200px;
				border: 1px solid black;
				background: white;
				display: none;
				
				position: absolute;
				top: 100px;
				left: 200px;
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
	<body style="background-image: url(../../bg_image/05.jpg);background-size: 1100px;position: relative;">
		<hr />
		 <?php
		    if($page==""){
		    	$page=1;
		    }
		    if(is_numeric($page))
		    {
		    	$page_size=4;
		    	$sql_5=" select count(*) as total from `user_album` order by id desc ";
			    $result_5 = mysql_query($sql_5); 
			    $message_count=mysql_result($result_5,0,"total");
			    $page_count=ceil(($message_count)/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		<?php 
			$sql_4=" SELECT * FROM `user_album` order by id desc limit $offset,$page_size";
			$result_4 = mysql_query($sql_4); 
		?>	
	<div class="class_album">			
		
		<?php
//		    $sql_1 = "SELECT `id`,`album`, `description`, `date`, `name` FROM `user_album` ";
//		    $result_1 = mysql_query($sql_1);  		    
		    while($row_1 = mysql_fetch_array($result_4))
		    {
		    	$album_name=$row_1['album'];
		    	$sql_3="SELECT `name`, `file`, `date`, `type` FROM `user_image` WHERE album_name='$album_name' ORDER BY id DESC";
			    $result_3 = mysql_query($sql_3); 
			    if($row_3 = mysql_fetch_array($result_3) )
			    {
		?>
		<div class="div_album">
			<div class="div_image"><img src="../<?php echo $row_3['file']?>" width="200px" height="150px"/></div>
			<div class="">
				<span id="">用户：</span><?php echo $row_1['name']?><br />
				<span id="">相册：</span><?php echo $row_1['album']?><br />
			    <span id="">描述：</span><?php echo $row_1['description']?><br />			    
			    <a href="ad_image.php?album_id=<?php echo $row_1['id']?>" >
			    	<input type="button" value="管理照片" />
			    </a>
			    <a href="delete_ad_album.php?album_id=<?php echo $row_1['id']?>&album_name=<?php echo $row_1['album']?>" >
			    	<input type="button" value="删除相册" />
			    </a>
			</div>
		</div>		
		<?php
		        }else{
		?>
		<div class="div_album">
			<div class="div_image">请添加照片</div>
			<div class="">
				<span id="">用户：</span><?php echo $row_1['name']?><br />
				<span id="">相册：</span><?php echo $row_1['album']?><br />
			    <span id="">描述：</span><?php echo $row_1['description']?><br />
			    <a href="ad_image.php?album_id=<?php echo $row_1['id']?>" >
			    	<input type="button" value="管理照片" />
			    </a>
			    <a href="delete_ad_album.php?album_id=<?php echo $row_1['id']?>&album_name=<?php echo $row_1['album']?>" >
			    	<input type="button" value="删除相册" />
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
		    		echo "<a href='ad_album.php?page=".($page_count)." '>尾页|</a>";
		    		echo "<a href='ad_album.php?page=".($page+1)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='ad_album.php?page=".($page-1)." '>上一页|</a>";
		    		echo "<a href='ad_album.php?page=".($page+1)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='ad_album.php?page=1 '>首页|</a>";
		    		echo "<a href='ad_album.php?page=".($page-1)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span> 
		</div> 
	</div>	
	</body>
</html>
