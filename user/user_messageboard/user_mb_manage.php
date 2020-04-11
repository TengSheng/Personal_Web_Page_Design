<?php
	session_name("admin");
	session_start();

	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    if(isset($_POST["submit1"]) && $_POST["submit1"] == "回复留言"){    	
    	
    	$comment=$_POST["comment"];
    	$vmb_id=$_POST["vmb_id"];
    	$sql2 = "INSERT INTO `user_mc`(`name`,`date`,`content`,`vmb_id`) VALUES ('$name',now(),'$comment','$vmb_id')";
        $result2 = mysql_query($sql2);       
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
				border-radius: 20px;
				margin-bottom: -5px;
			}
			#id_tr{
				display: block;
			}
			#id_sub{
				margin-bottom: 5px;
				position: absolute;
				right: 10px;				
			}
			a{
		    	text-decoration: none;
		    	color: black;
		    }
		     a:hover{
		     	color: blue;
                text-decoration:underline;
            }
            .a_delete{
            	position: absolute;
		    	right: 5px;
            }
			.span_page{
				position: absolute;
				top: 0px;
				right: 5px;
			}
		</style>
		<script type="text/javascript">
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
		    	$page_size=1;
		    	$sql_5=" select count(*) as total from `visitor_mb` WHERE name='$name' order by id desc ";
			    $result_5 = mysql_query($sql_5); 
			    $message_count=mysql_result($result_5,0,"total");
			    $page_count=ceil(($message_count)/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		<?php 
			$sql_4=" SELECT * FROM `visitor_mb` WHERE name='$name' order by id desc limit $offset,$page_size";
			$result_4 = mysql_query($sql_4); 
		?>	
		<form action="" method="post" name="myform" >
			<?php 
				$sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			    $res_insert1 = mysql_query($sql_insert1);
			    $row_insert1 = mysql_fetch_array($res_insert1);
			?>
		<table border="0" cellspacing="1" cellpadding="5" width="500px" bgcolor="aqua" style="position: absolute;top: 70px;left: 400px;">
		<?php 
//			$sql=" SELECT `id`, `date`, `content` FROM `visitor_mb` WhERE name='$name' ORDER BY id DESC";
//			$result = mysql_query($sql); 
			while($row = mysql_fetch_array($result_4) )
			{
				$mb_id=$row['id'];
				$sql_select_1 = "SELECT `friend_name` FROM `visitor_mb` WHERE name='$name' AND id='$mb_id' ";
			    $res_select_1 = mysql_query($sql_select_1);
			    $row_select_1 = mysql_fetch_array($res_select_1);
			    $f_name=$row_select_1['friend_name'];
			   
				$sql_select_2 = "SELECT `headimg` FROM `user_information` WHERE name='$f_name' ";
			    $res_select_2 = mysql_query($sql_select_2);
			    $row_select_2 = mysql_fetch_array($res_select_2);
		?>
		<form action="" method="post" name="myform1">	
			<br />
		    <tr bgcolor="white">			
			    <td >
			    	留言时间：<?php echo $row['date']?>
		    		<a href="delete_u_v.php?vmb_id=<?php echo $row['id']?>&user_name=<?php echo $user_name;?>" class="a_delete">
		    			<img src="../../bg_image/18.jpg" style="width: 27px;height: 30px;"/>
		    		</a>
			    </td>
		    </tr>
		    <tr bgcolor="white">
		    	<td style="position: relative;">
		    		<img src="../<?php echo $row_select_2['headimg'] ?>" class="headimg"/>
		    		<?php echo $row_select_1['friend_name'];?>&nbsp;留言：<?php echo htmltocode($row['content'])?>
		    	</td>			
		    </tr>
		    <?php
		        $sql1=" SELECT `id`,`vmb_id`,`date`,`content` FROM `user_mc` WhERE name='$name' ";
			    $result1 = mysql_query($sql1);
			    if(mysql_num_rows($result1))
			    { 
		            while($row1 = mysql_fetch_array($result1)){	 
		            	if($row1['vmb_id']==$row['id']) 
		            	{ 		   
		    ?>
		    <tr>		    	
		    	<td>
		    		<?php echo $row1['date']?>
		    		<a href="delete_u_u.php?umc_id=<?php echo $row1['id']?>&user_name=<?php echo $user_name;?>" class="a_delete">
		    			<img src="../../bg_image/18.jpg" style="width: 27px;height: 30px;"/>
		    		</a>
		    	</td>		    			    		
		    </tr>
		    <tr>
		    	<td style="position: relative;">
		    		<img src="../<?php echo $row_insert1['headimg'] ?>" class="headimg"/>
		    		&nbsp;回复:<?php echo htmltocode($row1['content'])?>
		    	</td>	 
		    </tr>
		    <?php
		                }
		    ?>
		    <tr>
		    	<td><input type="hidden" name="vmb_id" style="width: 100px;height: 50px;" value="<?php echo $row['id']?>"/></td>
		    </tr>
		    <?php
		            } 
		        
		        }
		    ?>
		    <tr id="id_tr">
		    	<td><textarea name="comment" placeholder="请回复留言" style="width: 500px;height: 100px;"></textarea><br />
		    	<input type="submit" name="submit1" value="回复留言"/></td>
		    </tr>
		    
		</form>
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
		    		echo "<a href='user_mb_manage.php?page=".($page_count)."&user_name=".($user_name)." '>尾页|</a>";
		    		echo "<a href='user_mb_manage.php?page=".($page+1)."&user_name=".($user_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='user_mb_manage.php?page=".($page-1)."&user_name=".($user_name)." '>上一页|</a>";
		    		echo "<a href='user_mb_manage.php?page=".($page+1)."&user_name=".($user_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='user_mb_manage.php?page=1&user_name=".($user_name)." '>首页|</a>";
		    		echo "<a href='user_mb_manage.php?page=".($page-1)."&user_name=".($user_name)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span>
            </td>
		</tr>
	</table>
</form>
	</body>
</html>

