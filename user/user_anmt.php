<?php
	session_name("admin");
	session_start();
	
	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
    
    include("../connect.php");
    
    if(isset($_GET['page'])) {
    	$page=$_GET['page'];
        $i=$_GET['i'];
    }else{
    	$page=1;
    	$i=0;
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			.class_div_0{
				position: absolute;
				top: 50px;
				left: 430px;
			}
			.class_div_1{
				width: 500px;height: 40px;	
				background: white;
			}
			.class_div_2{
				width: 500px;height: 100px;
				border: 1px solid black;
				background: white;
				font-size: 30px;
			}
			.class_div_5{
				width: 500px;height: 120px;
				border: 1px solid black;
				position: absolute;
				top: 220px;
				left: 430px;
			}
			.class_div_7{
				position: absolute;
				top: 170px;
				left: 430px;
			}
			.class_div_3{
				width: 500px;height:15px;	
				background: lightcyan;
			}
			.class_div_4{
				width: 500px;
				border-bottom: 1px solid black;
				background: lawngreen;
			}
			.class_div_6{
				width: 500px;
				border: 1px solid black;
				position: absolute;
				top: 350px;
				left: 430px;
			}
			.class_span_1{
				width: 200px;height: 21px;
				text-align: right;
				
				position: absolute;
				right: 0px;
			}
			a{
				text-decoration: none;
				color: #000000;
			}
			.headimg{				
				width: 40px;height: 40px;
				border: 1px solid black;
				border-radius: 20px;
				
				position: absolute;
				top: -5px;
			}
		</style>
	</head>
	<body style="background-image: url(../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		<form action="" method="post" name="myform1" style="position: relative;">	
			<?php 
				$sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			    $res_insert1 = mysql_query($sql_insert1);
			    $row_insert1 = mysql_fetch_array($res_insert1);
			?>
			<h2 align="center">
				&nbsp;<img src="<?php echo $row_insert1['headimg'] ?>" class="headimg"/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $name;?>&nbsp;欢迎进入你的个人网站
			</h2>	    
		    <div class="class_div_0">
		        <?php 
			    $sql1=" SELECT `content`,`date` FROM `ad_announcement` ORDER BY id DESC ";
			    $result1 = mysql_query($sql1); 
			    if($row1 = mysql_fetch_array($result1))
			    {
			    ?>
			    
			    	<div class="class_div_1">&nbsp;<?php echo $row1['date']?></div>
		            <div class="class_div_2">公告：<?php echo htmltocode($row1['content'])?></div>	
		            
		        <?php
		        }
		        ?>

		    </div>         
		    <div class="class_div_7"><h4 align="center">更多的历史公告</h4></div>
		<?php
		    if($page==""){
		    	$page=1;
		    }
		    if(is_numeric($page))
		    {
		    	$page_size=3;
		    	$sql2=" select count(*) as total from `ad_announcement` order by id desc";
			    $result2 = mysql_query($sql2); 
			    $message_count=mysql_result($result2,0,"total");
			    $page_count=ceil(($message_count)/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		
		<?php 
			$sql=" SELECT `date`,`content` FROM `ad_announcement` order by id desc limit $offset,$page_size";
			$result = mysql_query($sql); 
			if($i==""||$i>$message_count){
				$i=1;
			}
		?>		
		<div class="class_div_5">	
		<?php 
			while($row = mysql_fetch_array($result))
			{			
		?>	    
		   	    
		    	    <div class="class_div_3"></div>
		            <div class="class_div_4"><?php echo $i?>、时间：<?php echo $row['date']?>&nbsp;&nbsp;公告：<?php echo htmltocode($row['content'])?></div>	
		   
	    <?php
	    	 $i=$i+1;
		   }
		?> 
		</div>  
		    <div class="class_div_6">
			         页次：<?php echo $page?>/<?php echo $page_count?>页记录：<?php echo $message_count?>条		   
		        <span class="class_span_1">
		        <?php
		        	if($page==1&&$page_count>1)
		    	    {		    		    
		    		    echo "<a href='user_anmt.php?page=".($page_count)."&i=".($i=$page_count*$page_size-2)."&user_name=".($user_name)." '>尾页|</a>";
		    		    echo "<a href='user_anmt.php?page=".($page+1)."&i=".($i=4)."&user_name=".($user_name)." '>|下一页</a>";
		    	    }echo "&nbsp;";
		    		if($page!=1&&$page!=$page_count)
		    	    {
//		    		    echo "<a href='ad_anmt_history.php?page=1&i=".$i."'>首页</a>";
		    		    echo "<a href='user_anmt.php?page=".($page-1)."&i=".($i-6)."&user_name=".($user_name)." '>上一页|</a>";
		    		    echo "<a href='user_anmt.php?page=".($page+1)."&i=".$i."&user_name=".($user_name)." '>|下一页</a>";
		    	    }echo "&nbsp;";
		    	    if($page!=1&&$page==$page_count)
		    	    {
//		    	        echo "<a href='ad_anmt_history.php?page=".($page_count)."&i=".$i."'>尾页</a>";
		    		    echo "<a href='user_anmt.php?page=1&i=".($i=1)."&user_name=".($user_name)." '>首页|</a>";
		    		    echo "<a href='user_anmt.php?page=".($page-1)."&i=".($i=($page_count-1)*$page_size-2)."&user_name=".($user_name)." '>|上一页</a>";
		    	    }echo "&nbsp;";	    	     
		        ?> 
		        </span>  
		    </div>
        </form>
	</body>
</html>