<?php
	$id_1=$_GET['id'];
	$friend_name=$_GET['friend_name'];
	
	include("../connect.php");
	
	$sql_1="SELECT `name` FROM `user` WHERE id=".$id_1;
	$result_1=mysql_query($sql_1);
	$row_1 = mysql_fetch_array($result_1);

	$name=$row_1['name'];
    
    if(isset($_POST["submit"]) && $_POST["submit"] == "发布留言"){

    	$content=$_POST["content"];	
    	    	
    	$sql = "INSERT INTO `visitor_mb`(`date`,`content`,`name`,`friend_name`) VALUES (now(),'$content','$name','$friend_name' )";
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
	<body style="background-image: url(../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		 <?php
		    if($page==""){
		    	$page=1;
		    }
		    if(is_numeric($page))
		    {
		    	$page_size=2;
		    	$sql_5=" select count(*) as total from `visitor_mb` WHERE name='$name' AND friend_name='$friend_name' order by id desc ";
			    $result_5 = mysql_query($sql_5); 
			    $message_count=mysql_result($result_5,0,"total");
			    $page_count=ceil(($message_count)/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		<?php 
			$sql_4=" SELECT * FROM `visitor_mb` WHERE name='$name' AND friend_name='$friend_name' order by id desc limit $offset,$page_size";
			$result_4 = mysql_query($sql_4); 
		?>
		<form action="" method="post" name="myform" onsubmit="return CheckPost();" style="position: relative;"> 
			<?php 
				$sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			    $res_insert1 = mysql_query($sql_insert1);
			    $row_insert1 = mysql_fetch_array($res_insert1);
			?>
	        <textarea name="content" style="width: 500px;height: 100px;position: absolute;top: 50px;left: 400px;" placeholder="说点什么吧"></textarea><br />
	        <input type="submit" name="submit" value="发布留言" style="position: absolute;top: 155px;left: 400px;"/>
        </form> 
        
        <table border="0" cellspacing="1" cellpadding="5" width="500px" bgcolor="aqua" style="position: absolute;top: 200px;left: 400px;">
		<?php
			while($row = mysql_fetch_array($result_4))
			{	
				$mb_id=$row['id'];
				$sql_select_1 = "SELECT `friend_name` FROM `visitor_mb` WHERE name='$name' AND friend_name='$friend_name' order by id desc ";
			    $res_select_1 = mysql_query($sql_select_1);
			    $row_select_1 = mysql_fetch_array($res_select_1);
			    $f_name=$row_select_1['friend_name'];
			    
			    if(mysql_query($sql_select_1))
			    {			    
		            $sql_select_2 = "SELECT `headimg` FROM `user_information` WHERE name='$friend_name'";
			        $res_select_2 = mysql_query($sql_select_2);
			        $row_select_2 = mysql_fetch_array($res_select_2);		
		?>
		<form action="" method="post" name="myform1">	
		    <tr bgcolor="white">			
			    <th >
			    	<img src="<?php echo $row_insert1['headimg'] ?>" class="headimg"/>&nbsp;
			    	<?php echo $name;?>&nbsp;<?php echo $row['date']?>
			    </th>
		    </tr>
		    <tr bgcolor="white">
		    	<td ><img src="<?php echo $row_select_2['headimg'] ?>" class="headimg"/>
		    		&nbsp;<?php echo $row_select_1['friend_name'];?>留言：<?php echo htmltocode($row['content'])?>
		    	</td>			
		    </tr>
		    <?php
		            $sql1=" SELECT `id`,`vmb_id`,`date`,`content` FROM `user_mc` ";
			        $result1 = mysql_query($sql1);
			        if(mysql_num_rows($result1))
			        { 
		                while($row1 = mysql_fetch_array($result1))
		                {	 
		            	    if($row1['vmb_id']==$row['id']) 
		            	    { 		   
		    ?>
		    <tr>		    	
		    	<td><?php echo $row1['date']?></td>		    			    		
		    </tr>
		    <tr>
		    	<td><img src="<?php echo $row_insert1['headimg'] ?>" class="headimg"/>&nbsp;回复：<?php echo htmltocode($row1['content'])?>
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
		    <tr >
		    	<td>
		    		<hr /><br />
		    	</td>
		    </tr>
		<?php
		        }
		    }
		?>
	    <tr>
	    	<td style="position: relative;">	    		
	                   页次：<?php echo $page?>/<?php echo $page_count?>页记录：<?php echo $message_count?>条	
	        <span class="span_page">         		        
		    <?php
		        if($page==1&&$page_count>1)
		    	{		    		    
		    		echo "<a href='visitor_mb.php?page=".($page_count)."&id=".($id_1)."&friend_name=".($friend_name)." '>尾页|</a>";
		    		echo "<a href='visitor_mb.php?page=".($page+1)."&id=".($id_1)."&friend_name=".($friend_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='visitor_mb.php?page=".($page-1)."&id=".($id_1)."&friend_name=".($friend_name)." '>上一页|</a>";
		    		echo "<a href='visitor_mb.php?page=".($page+1)."&id=".($id_1)."&friend_name=".($friend_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='visitor_mb.php?page=1&id=".($id_1)."&friend_name=".($friend_name)." '>首页|</a>";
		    		echo "<a href='visitor_mb.php?page=".($page-1)."&id=".($id_1)."&friend_name=".($friend_name)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span>
            </td>
		</tr>
		</table>
	</body>
</html>

