<?php
	session_name("admin");
	session_start();
	
	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    
    if(isset($_POST["submit"]) && $_POST["submit"] == "发表说说"){
        
    	$content=$_POST["content"];
    	
    	$sql = "INSERT INTO `user_talkabout`(`name`,`content`, `date`) VALUES ('$name','$content',now() )";
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
		<style>
		    *{margin: 0px;padding: 0px;}
			.class_text{
				width: 500px;height: 100px;				
			}
			.class_div_1{
				position: absolute;
				top: 50px;
				left: 30%;
			}
			.class_div_2{
				position: absolute;
				top: 160px;
				left: 845px;
			}
			.class_div_5{
				position: absolute;
				top: 200px;
				left: 410px;
			}
			.class_div_3{
				width: 500px;	
				background: white;
			}
			.class_div_4{
				width: 500px;
				background: white;
			}
			.headimg{				
				width: 20px;height: 20px;
				border: 1px solid black;
				border-radius: 10px;
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
			.div_page{
				width: 500px;height: 25px;
				border: 1px solid black;
				
				position: absolute;
				top: 190px;
				left: 410px;
			}
			.span_page{
				
				position: absolute;
				top: 0px;
				right: 10px;
			}
		</style>
		<script>			
			function CheckPost(){
				if(myform3.content.value=="")
				{
					alert("必须填写内容！");
					myform3.content.focus();
					return false;
				}
			}
		</script>
	</head>
	<body style="background-image: url(../../bg_image/16.jpg);background-size: 1366px,800px;">
		<hr />
		<form action="" method="post" name="myform3" onsubmit="return CheckPost();"> 
			<br />
			<div class="class_div_1">
				<textarea type="text" name="content" class="class_text" placeholder="说点什么吧"></textarea><br />
			</div>
			<div class="class_div_2">
				<input type="submit" name="submit" value="发表说说" />
			</div>	        
        </form> 
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
		<form action="" method="post" name="myform1" style="position: relative;">	
			<?php 
				$sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			    $res_insert1 = mysql_query($sql_insert1);
			    $row_insert1 = mysql_fetch_array($res_insert1);
			?>	    
		    <div class="class_div_5">
		        <?php 
//			    $sql=" SELECT `name`,`content`,`date` FROM `user_talkabout` WHERE name='$name' ORDER BY id DESC ";
//			    $result = mysql_query($sql); 
			    while($row = mysql_fetch_array($result_4))
			    {		
		        ?>			    
		    	    <div class="class_div_3">
		    	    	<img src="../<?php echo $row_insert1['headimg'] ?>" class="headimg"/>
		    	    	&nbsp;<?php echo $row['name']?>&nbsp;<?php echo $row['date']?>		    	    		
		    	    </div>
		            <div class="class_div_4">内容：<?php echo htmltocode($row['content'])?>
		            	<hr /><br />
		            </div>		            	     
		        <?php
		        }
		        ?>	
		    </div>         
        </form>
        <div class="div_page">	    		
	                   页次：<?php echo $page?>/<?php echo $page_count?>页记录：<?php echo $message_count?>条	
	        <span class="span_page">         		        
		    <?php
		        if($page==1&&$page_count>1)
		    	{		    		    
		    		echo "<a href='user_talkabout.php?page=".($page_count)."&user_name=".($user_name)." '>尾页|</a>";
		    		echo "<a href='user_talkabout.php?page=".($page+1)."&user_name=".($user_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page!=$page_count)
		    	{
		    		echo "<a href='user_talkabout.php?page=".($page-1)."&user_name=".($user_name)." '>上一页|</a>";
		    		echo "<a href='user_talkabout.php?page=".($page+1)."&user_name=".($user_name)." '>|下一页</a>";
		    	}
		    	if($page!=1&&$page==$page_count)
		    	{
		    		echo "<a href='user_talkabout.php?page=1&user_name=".($user_name)." '>首页|</a>";
		    		echo "<a href='user_talkabout.php?page=".($page-1)."&user_name=".($user_name)." '>|上一页</a>";
		    	}    	     
		    ?> 		        
            </span> 
		</div> 
	</body>
</html>