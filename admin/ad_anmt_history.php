<?php
	session_name("admin");
	session_start();
	$adname=$_SESSION['adname'];
		
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

			.class_div_5{
				width: 500px;height: 120px;
				border: 1px solid black;
				position: absolute;
				top: 70px;
				left: 180px;
			}
			.class_div_2{
				position: absolute;
				top: 10px;
				left: 180px;
			}
			.class_div_3{
				width: 500px;height:15px;	
				background: lightcyan;
			}
			.class_div_4{
				width: 500px;
				border-bottom: 1px solid black;
				background: lawngreen;
				
				position: relative;
			}
			.class_div_6{
				width: 500px;
				border: 1px solid black;
				position: absolute;
				top: 200px;
				left: 180px;
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
	<body style="background-image: url(../bg_image/05.jpg);background-size: 1100px;position: relative;">
		<hr />
		<form action="" method="post" name="myform1" style="position: relative;">	
			<div class="class_div_2"><h4 align="center">更多的历史公告</h4></div>
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
			    $page_count=ceil($message_count/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		
		<?php 
			$sql=" SELECT `id`,`date`,`content` FROM `ad_announcement` order by id desc limit $offset,$page_size";
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
		        <div class="class_div_4"><?php echo $i?>、时间：<?php echo $row['date']?>&nbsp;&nbsp;内容：<?php echo htmltocode($row['content'])?>
		        	<a href="delete_anmt.php?anmt_id=<?php echo $row['id']?>" style="position: absolute;right: 5px;">删除</a>
		        </div>	
		        
	    <?php
	    	 $i=$i+1;
		   }
		?> 
		</div>  
		    <div class="class_div_6">
			         页次：<?php echo $page?>/<?php echo $page_count?>页记录：<?php echo $message_count?>条		   
		        <span class="class_span_1">
		        <?php
		        	if($page==1)
		    	    {		    		    
		    		    echo "<a href='ad_anmt_history.php?page=".($page_count)."&i=".($i=$page_count*$page_size-2)."'>尾页|</a>";
		    		    echo "<a href='ad_anmt_history.php?page=".($page+1)."&i=".($i=4)."'>|下一页</a>";
		    	    }echo "&nbsp;";
		    		if($page!=1&&$page!=$page_count)
		    	    {
//		    		    echo "<a href='ad_anmt_history.php?page=1&i=".$i."'>首页</a>";
		    		    echo "<a href='ad_anmt_history.php?page=".($page-1)."&i=".($i-6)."'>上一页|</a>";
		    		    echo "<a href='ad_anmt_history.php?page=".($page+1)."&i=".$i."'>|下一页</a>";
		    	    }echo "&nbsp;";
		    	    if($page==$page_count)
		    	    {
//		    	        echo "<a href='ad_anmt_history.php?page=".($page_count)."&i=".$i."'>尾页</a>";
		    		    echo "<a href='ad_anmt_history.php?page=1&i=".($i=1)."'>首页|</a>";
		    		    echo "<a href='ad_anmt_history.php?page=".($page-1)."&i=".($i=($page_count-1)*$page_size-2)."'>|上一页</a>";
		    	    }echo "&nbsp;";	    	     
		        ?> 
		        </span>  
		    </div>     
        </form>
	</body>
</html>