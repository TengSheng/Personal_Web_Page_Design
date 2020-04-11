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
		    	$sql_5=" select count(*) as total from `user_mb` order by id desc ";
			    $result_5 = mysql_query($sql_5); 
			    $message_count=mysql_result($result_5,0,"total");
			    $page_count=ceil(($message_count)/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		<?php 
			$sql_4=" SELECT * FROM `user_mb` order by id desc limit $offset,$page_size";
			$result_4 = mysql_query($sql_4); 
		?>	
		<form action="" method="post" name="myform" >
		<table border="0" cellspacing="1" cellpadding="5" width="500px" bgcolor="aqua" style="position: absolute;top: 50px;left: 170px;">
		<?php 
//			$sql=" SELECT `id`, `date`, `content`, `name` FROM `user_mb` ORDER BY id DESC";
//			$result = mysql_query($sql); 
			while($row = mysql_fetch_array($result_4) )
			{			
				$name=$row['name'];
				$sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			    $res_insert1 = mysql_query($sql_insert1);
			    $row_insert1 = mysql_fetch_array($res_insert1);
		?>
		<form action="" method="post" name="myform1">	
		    <tr bgcolor="white">			
			    <th >
			    	<img src="../<?php echo $row_insert1['headimg'] ?>" class="headimg"/>
			    	用户：<?php echo $row['name']?>&nbsp;&nbsp;<?php echo $row['date']?>
		    		<a href="umb_delete.php?umb_id=<?php echo $row['id']?>" class="a_delete">
		    			<img src="../../bg_image/18.jpg" style="width: 27px;height: 30px;"/>
		    		</a>
			    </th>
		    </tr>
		    <tr bgcolor="white">
		    	<td >留言内容：<?php echo htmltocode($row['content'])?>
		    	</td>			
		    </tr>
		    <?php
		        $sql1=" SELECT `id`,`umb_id`,`date`,`content` FROM `admin_mc` ";
			    $result1 = mysql_query($sql1);
			    if(mysql_num_rows($result1))
			    { 
		            while($row1 = mysql_fetch_array($result1)){	 
		            	if($row1['umb_id']==$row['id']) 
		            	{ 		   
		    ?>
		    <tr>		    	
		    	<td>
		    		<?php echo $row1['date']?>
		    		<a href="ad_mc_delete.php?comment_id=<?php echo $row1['id']?>" class="a_delete">
		    			<img src="../../bg_image/18.jpg" style="width: 27px;height: 30px;"/>
		    		</a>		    		
		    	</td>		    			    		
		    </tr>
		    <tr>
		    	<td>我的回复：<?php echo htmltocode($row1['content'])?>
		    	</td>	 
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
		    		echo "<a href='ad_mb_manage.php?page=".($page_count)." '>尾页|</a>";
		    		echo "<a href='ad_mb_manage.php?page=".($page+1)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='ad_mb_manage.php?page=".($page-1)." '>上一页|</a>";
		    		echo "<a href='ad_mb_manage.php?page=".($page+1)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='ad_mb_manage.php?page=1 '>首页|</a>";
		    		echo "<a href='ad_mb_manage.php?page=".($page-1)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span>
            </td>
		</tr>
	</table>
</form>
	</body>
</html>