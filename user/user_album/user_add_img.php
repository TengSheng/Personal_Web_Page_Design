<?php
	session_name("admin");
	session_start();

	$user_name=$_GET['user_name'];
//  $name=$_SESSION[$user_name];	
	
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
		    	width: 920px;
		    	position: absolute;
		    	top: 50px;
		    	left: 200px;
		    }
			.div_image{
				width: 300px;height: 250px;
				border: 1px solid black;
				border-radius: 5px;
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
				width: 920px;height: 25px;
				border: 1px solid black;
				
				position: absolute;
				top: 350px;
				left: 0px;
			}
			.span_page{
				
				position: absolute;
				top: 0px;
				right: 10px;
			}
		</style>
		<script type="text/javascript">
		    function pic_chk(){
		        if(myform.tpmc.value=="")
				{
					alert("请填写图片名称！");
					myform.tpmc.focus();
					return false;
				}
				if(myform.file.value=="")
				{
					alert("请选择图片！");
					myform.file.focus();
					return false;
				}
	        }
		</script>
	</head>
	<body style="background-image: url(../../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		 <?php
		    if($page==""){
		    	$page=1;
		    }
		    if(is_numeric($page))
		    {
		    	$page_size=3;
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
		<a href="user_album.php?user_name=<?php echo $user_name;?>"><input type="button" value="返回上一页" /></a>		
		<hr />
		<form name="myform" action="user_new_img.php?album_id=<?php echo $album_id?>" method="post" enctype="multipart/form-data" onsubmit="return pic_chk();">
			
	           图片名称:<input type="text" name="tpmc" />
	           上传路径:<input type="file" name="file" value="" style="border: 1px solid black;"/>
	
	
	    <input type="submit" name="submit_tj" value="提交" />
        </form>
        <hr />
        <?php 
			while($row = mysql_fetch_array($result_4) )
			{		
		?>
		<div class="div_image">
			<img src="../<?php echo $row['file']?>" style="width: 300px;height: 225px;border-radius: 5px;"/><br />
			<div class="div_date">
				上传日期：<?php echo $row['date']?>
				<span id="span_delete">
					<a href="delete_image.php?image_id=<?php echo $row['id']?>&album_id=<?php echo $album_id?>"><input type="button" name="delete" value="删除"/></a>
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
		    		echo "<a href='user_add_img.php?page=".($page_count)."&album_id=".($album_id)."&album_name=".($album_name)."&user_name=".($user_name)." '>尾页|</a>";
		    		echo "<a href='user_add_img.php?page=".($page+1)."&album_id=".($album_id)."&album_name=".($album_name)."&user_name=".($user_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='user_add_img.php?page=".($page-1)."&album_id=".($album_id)."&album_name=".($album_name)."&user_name=".($user_name)." '>上一页|</a>";
		    		echo "<a href='user_add_img.php?page=".($page+1)."&album_id=".($album_id)."&album_name=".($album_name)."&user_name=".($user_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='user_add_img.php?page=1&album_id=".($album_id)."&album_name=".($album_name)."&user_name=".($user_name)." '>首页|</a>";
		    		echo "<a href='user_add_img.php?page=".($page-1)."&album_id=".($album_id)."&album_name=".($album_name)."&user_name=".($user_name)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span> 
		</div> 
	</div>
	</body>
</html>
