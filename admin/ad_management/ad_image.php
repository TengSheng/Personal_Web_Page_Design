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
    
    if(isset($_GET['album_id']))
    {
    	$album_id=$_GET['album_id'];
    	
    	$sql_1 = "SELECT `album` FROM `user_album` WHERE id='$album_id' ";//取出指定相册的相册名
        $result_1 = mysql_query($sql_1); 
        $row_1 = mysql_fetch_array($result_1);
        $album_name=$row_1['album'];
    }

    if(isset($_GET['album_name']))
    {
        $album_name=$_GET['album_name'];
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
				float: left;
			}
			.div_date{
				text-align: left;
				position: relative;
			}
			.div_name{
				
			}
			#span_delete{
				position: absolute;
				right: 5px;
				bottom: 1px;
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
		<a href="ad_album.php"><input type="button" value="返回上一页" /></a>
		<hr />
		 <?php
		    if($page==""){
		    	$page=1;
		    }
		    if(is_numeric($page))
		    {
		    	$page_size=4;
		    	$sql_5=" select count(*) as total from `user_image` WHERE album_name='$album_name' order by id desc ";
			    $result_5 = mysql_query($sql_5); 
			    $message_count=mysql_result($result_5,0,"total");
			    $page_count=ceil(($message_count)/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		<?php 
			$sql_4=" SELECT * FROM `user_image` WHERE album_name='$album_name' order by id desc limit $offset,$page_size";
			$result_4 = mysql_query($sql_4); 
		?>
	<div class="class_album">		
        <hr />
        <?php 
//			$sql="SELECT `id`,`name`, `file`, `date`, `type` FROM `user_image` WHERE album_name='$album_name' ";
//			$result = mysql_query($sql); 
			while($row = mysql_fetch_array($result_4) )
			{		
		?>
		<div class="div_image">
			<img src="../<?php echo $row['file']?>" width="200px" height="150px"/><br />
			<div class="div_date">
				<?php echo $row['date']?>
				<span id="span_delete">
					<a href="delete_ad_image.php?image_id=<?php echo $row['id']?>&album_id=<?php echo $album_id?>"><input type="button" name="delete" value="删除"/></a>
				</span>
			</div>
		</div>		
		
		<?php
		}
		?>
		<div id="" style="clear: all;"></div>
	    <div class="div_page">	    		
	                   页次：<?php echo $page?>/<?php echo $page_count?>页记录：<?php echo $message_count?>条	
	        <span class="span_page">         		        
		    <?php
		        if($page==1&&$page_count>1)
		    	{		    		    
		    		echo "<a href='ad_image.php?page=".($page_count)."&album_name=".($album_name)." '>尾页|</a>";
		    		echo "<a href='ad_image.php?page=".($page+1)."&album_name=".($album_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='ad_image.php?page=".($page-1)."&album_name=".($album_name)." '>上一页|</a>";
		    		echo "<a href='ad_image.php?page=".($page+1)."&album_name=".($album_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='ad_image.php?page=1&album_name=".($album_name)." '>首页|</a>";
		    		echo "<a href='ad_image.php?page=".($page-1)."&album_name=".($album_name)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span> 
		</div> 
	</div>
	</body>
</html>
