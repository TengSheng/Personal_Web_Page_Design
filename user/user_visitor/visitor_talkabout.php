<?php
	session_name("admin");
	session_start();

	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    if(isset($_POST["submit1"]) && $_POST["submit1"] == "评论"){
        	    	
    $comment=$_POST["comment"];
    $ta_id=$_POST["ta_id"];
    
    $sql2 = "INSERT INTO `visitor_comment`(`name`,`date`,`content`,`ta_id`) VALUES ('$name',now(),'$comment','$ta_id')";
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
            td{
            	position: relative;
            }
			.span_page{
				position: absolute;
				top: 0px;
				right: 5px;
			}
		</style>
	</head>
	<body style="background-image: url(../../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		<form action="" method="post" name="myform" >
		 <?php
		    if($page==""){
		    	$page=1;
		    }
		    if(is_numeric($page))
		    {
		    	$page_size=3;
		    	$sql_5=" select count(*) as total from `user_talkabout` WHERE name='$name' order by id desc ";
			    $result_5 = mysql_query($sql_5); 
			    $message_count=mysql_result($result_5,0,"total");
			    $page_count=ceil(($message_count)/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		<?php 
			$sql_4=" SELECT * FROM `user_talkabout` WHERE name='$name' order by id desc limit $offset,$page_size";
			$result_4 = mysql_query($sql_4); 
		?>	
		<table border="0" cellspacing="1" cellpadding="5" width="500px" bgcolor="white" style="position: absolute;top:20px;left:400px">
		<?php
			while($row = mysql_fetch_array($result_4) )
			{		
				$sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			    $res_insert1 = mysql_query($sql_insert1);
			    $row_insert1 = mysql_fetch_array($res_insert1);
		?>
		<form action="user_control.php" method="post">	
			
		    <tr bgcolor="white" style="position: relative;">			
			    <td ><img src="../<?php echo $row_insert1['headimg'] ?>" class="headimg"/>
			    	&nbsp;<?php echo $row['name']?>&nbsp;&nbsp;<?php echo $row['date']?>			    		
			    </td>
		    </tr>
		    <tr bgcolor="white">
		    	<td >
		    		<br />
		    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    		<?php echo htmltocode($row['content'])?>	    		
		    	</td>			
		    </tr>
		    
		</form>
		    <tr>
		    	<td>
		    		<br />
		    	    <hr />
		    	</td>
		    </tr>
		    <tr>
		    	<td>		    		
		    		<a href="visitor_talk_ctl.php?talkabout_id=<?php echo $row['id']?>&user_name=<?php echo $user_name;?>" class="a_scan">点击查看评论。。。</a>
		    		<br /><hr /><br />
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
		    		echo "<a href='visitor_talkabout.php?page=".($page_count)." '>尾页|</a>";
		    		echo "<a href='visitor_talkabout.php?page=".($page+1)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='visitor_talkabout.php?page=".($page-1)." '>上一页|</a>";
		    		echo "<a href='visitor_talkabout.php?page=".($page+1)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='visitor_talkabout.php?page=1 '>首页|</a>";
		    		echo "<a href='visitor_talkabout.php?page=".($page-1)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span>
            </td>
		</tr>
	</table>

    </form>
	</body>
</html>