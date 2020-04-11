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
    
    if(isset($_POST["submit"]) && $_POST["submit"] == "新建相册"){
        
    	$albumname=$_POST["albumname"];
    	$description=$_POST["description"];
    	
    	$sql_2 = "SELECT `id`,`album`, `description`, `date` FROM `user_album` WHERE 1";
		$result_2 = mysql_query($sql_2);
		$i=1;	    
		while($row_2 = mysql_fetch_array($result_2))
		{
			if($row_2['album']==$albumname)
			{
				echo "<script>alert('相册名不可重复');</script>";
				$i=0;
			}
        }
        if($i==1)
        {
        	$sql = "INSERT INTO `user_album`(`album`,`description`, `date`, `name`) VALUES ('$albumname','$description',now(),'$name')";
            $result = mysql_query($sql); 
        }
   }
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
		    .class_album{
		    	width: 860px;
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
				width: 860px;height: 25px;
				border: 1px solid black;
				
				position: absolute;
				top: 300px;
				left: 0px;
			}
			.span_page{
				
				position: absolute;
				top: 0px;
				right: 10px;
			}
		</style>
	    <script>		
	    window.onload=function(){
	    	var oDiv=document.getElementById('id_div_add');
	    	var oBtn1=document.getElementById('id_btn_1');
			var oForm=document.getElementById('id_form');
			
			var oBtn2=document.getElementById('id_btn_2');
			
			oForm.onsubmit=function(){
				if(myform.albumname.value=="")
				{
					alert("必须填写相册名称！");
					myform.albumname.focus();
					return false;
				}
			}
			
			oBtn1.onclick=function(){
					oDiv.style.display='block';

			}
			oBtn2.onclick=function(){
					oDiv.style.display='none';

			}
		}


		</script>
	</head>
	<body style="background-image: url(../../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
	<div class="class_album">			
		
		<input type="button" id="id_btn_1" value="添加相册" />
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
		<div id="id_div_add">
		    <form action="" class="class_form" id="id_form" method="post" name="myform" >
			
			    <div class="">
				    <span id="">相册名称：</span><input type="text" name="albumname"/>
			    </div>
                <div class="">
				    <span id="">相册描述：</span><input type="text" name="description"/>
			    </div>
			
			    <input type="submit" name="submit" value="新建相册"/><input type="button" id="id_btn_2" value="关闭" />		
		    </form>
		</div>
		
		<?php 
			$sql_4=" SELECT * FROM `user_album` WHERE name='$name' order by id desc limit $offset,$page_size";
			$result_4 = mysql_query($sql_4); 
		?>		
		
		<?php
//		    $sql_1 = "SELECT `id`,`album`, `description`, `date` FROM `user_album` WHERE name='$name' ";
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
			<div class="div_image"><img src="../<?php echo $row_3['file']?>" style="width: 200px;height: 150px;border-radius: 5px;"/></div>
			<div class="">
				<span id="">相册：</span><?php echo $row_1['album']?><br />
			    <span id="">描述：</span><?php echo $row_1['description']?><br />
			    <a href="user_add_img.php?album_id=<?php echo $row_1['id']?>&user_name=<?php echo $user_name;?>" >
			    	<input type="button" value="添加照片" />
			    </a>
			    <a href="user_del_album.php?album_id=<?php echo $row_1['id']?>&album_name=<?php echo $row_1['album']?>&user_name=<?php echo $user_name;?>" >
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
				<span id="">相册：</span><?php echo $row_1['album']?><br />
			    <span id="">描述：</span><?php echo $row_1['description']?><br />
			    <a href="user_add_img.php?album_id=<?php echo $row_1['id']?>&user_name=<?php echo $user_name;?>" >
			    	<input type="button" value="添加照片" />
			    </a>
			    <a href="user_del_album.php?album_id=<?php echo $row_1['id']?>&album_name=<?php echo $row_1['album']?>&user_name=<?php echo $user_name;?>" >
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
		    		echo "<a href='user_album.php?page=".($page_count)."&user_name=".($user_name)." '>尾页|</a>";
		    		echo "<a href='user_album.php?page=".($page+1)."&user_name=".($user_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='user_album.php?page=".($page-1)."&user_name=".($user_name)." '>上一页|</a>";
		    		echo "<a href='user_album.php?page=".($page+1)."&user_name=".($user_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='user_album.php?page=1&user_name=".($user_name)." '>首页|</a>";
		    		echo "<a href='user_album.php?page=".($page-1)."&user_name=".($user_name)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span> 
		</div> 
	</div>	
	</body>
</html>
