<?php
	session_name("admin");
	session_start();

	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    
    if(isset($_POST["submit"]) && $_POST["submit"] == "发布留言")
    {
    	$content=$_POST["content"];
    	$user_name=$_GET['user_name'];
    	$sql = "INSERT INTO `user_mb`(`date`,`content`,`name`) VALUES (now(),'$content','$user_name')";
        $result = mysql_query($sql);
    }

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
		*{margin: 0px;padding: 0px;}
			.headimg{				
				width: 30px;height: 30px;
				border: 1px solid black;
				border-radius: 15px;
				margin-bottom: -5px;
			}
			a{
		    	text-decoration: none;
		    	color: black;
		    }
		     a:hover{
		     	color: blue;
                text-decoration:underline;
            }
			.span_page{
				position: absolute;
				top: 0px;
				right: 5px;
			}
		</style>
		<script>
			
			function CheckPost(){				
				if(myform.content.value=="")
				{
					alert("必须填写内容！");
					myform.content.focus();
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
		    	$sql_5=" select count(*) as total from `user_mb` WHERE name='$name' order by id desc ";
			    $result_5 = mysql_query($sql_5); 
			    $message_count=mysql_result($result_5,0,"total");
			    $page_count=ceil(($message_count)/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		<?php 
			$sql_4=" SELECT * FROM `user_mb` WHERE name='$name' order by id desc limit $offset,$page_size";
			$result_4 = mysql_query($sql_4); 
		?>
		<form action="" method="post" name="myform" onsubmit="return CheckPost();" style="position: relative;"> 
	        <?php 
				$sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			    $res_insert1 = mysql_query($sql_insert1);
			    $row_insert1 = mysql_fetch_array($res_insert1);
			?>
	        <textarea name="content" style="width: 500px;height: 100px;position: absolute;top: 10px;left: 400px;" placeholder="说点什么吧"></textarea><br />
	        <input type="submit" name="submit" value="发布留言" style="position: absolute;top: 115px;left: 400px;"/>
        </form> 
        <table border="0" cellspacing="1" cellpadding="5" width="510px" bgcolor="aqua" style="position: absolute;top: 160px;left: 400px;">
		<?php 
			while($row = mysql_fetch_array($result_4) )
			{			
		?>
		    <tr bgcolor="white">			
			    <th >当前用户：
			    	<img src="../<?php echo $row_insert1['headimg'] ?>" class="headimg"/>
			    	&nbsp;<?php echo $row['name']?>&nbsp;&nbsp;时间：<?php echo $row['date']?> 
			    </th>
		    </tr>
		    <tr bgcolor="white">
		    	<td >留言内容：<?php echo htmltocode($row['content'])?></td>			
		    </tr>
		    <?php
		        $sql1=" SELECT `id`,`umb_id`,`date`,`content` FROM `admin_mc`  ";
			    $result1 = mysql_query($sql1);
			    if(mysql_num_rows($result1))
			    { 
		            while($row1 = mysql_fetch_array($result1)){	 
		            	if($row1['umb_id']==$row['id']) 
		            	{ 		   
		    ?>
		    <tr>		    	
		    	<td><?php echo $row1['date']?></td>		    			    		
		    </tr>
		    <tr>
		    	<td>管理员回复：<?php echo htmltocode($row1['content'])?></td>	 
		    </tr>
		    <?php
		                }
		    ?>
		    <tr>
		    	<td><input type="hidden" name="umb_id" style="width: 100px;height: 50px;" value="<?php echo $row['id']?>"/></td>
		    </tr>
		    <tr>
		    	<td><input type="hidden" name="user_name" style="width: 100px;height: 50px;" value="<?php echo $row['name']?>"/></td>
		    </tr>
		    <?php
		            } 
		        
		        }
		    ?>
		    <tr >
		    	<td>
		    		<hr /><br />
		    	</td>
		    </tr>
		<?php
		}
		?>
	    <tr>
	    	<td style="position: relative;">	    		
	                   页次：<?php echo $page?>/<?php echo $page_count?>页记录：<?php echo $message_count?>条	
	        <span class="span_page">         		        
		    <?php
		        if($page==1&&$page_count>1)
		    	{		    		    
		    		echo "<a href='user_mb.php?page=".($page_count)." '>尾页|</a>";
		    		echo "<a href='user_mb.php?page=".($page+1)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='user_mb.php?page=".($page-1)." '>上一页|</a>";
		    		echo "<a href='user_mb.php?page=".($page+1)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='user_mb.php?page=1 '>首页|</a>";
		    		echo "<a href='user_mb.php?page=".($page-1)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span>
            </td>
		</tr>
	</table>
	</body>
</html>

