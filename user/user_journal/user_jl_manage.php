<?php
	session_name("admin");
	session_start();
	
	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    
    if(isset($_GET['page'])) 
    {
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
		    *{margin: 0px;padding: 0px;}
		    .class_div_1{
		    	width: 500px;
		    	border: 1px solid black;
		    	
		    	position: absolute;
		    	top: 80px;
		    	left: 450px;
		    }
		    a{
		    	text-decoration: none;
		    	color: #000000;
		    }
		     a:hover{
		     	color: red;
                text-decoration:underline;
            }
		    .class_span_1{
				width: 200px;height: 21px;
				text-align: right;
				
				position: absolute;
				right: 0px;
			}
		</style>
		<script type="text/javascript">

		</script>
	</head>
	<body style="background-image: url(../../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr /><br />
		<div class="div_journal">
        	<h3 align="center">日志浏览</h3>
        </div>
        <table class="class_div_1">
			<br /><hr />
            <tr bgcolor="lightgray">
            	<td >&nbsp;&nbsp;&nbsp;日志名称</td>
            	<td style="text-align: center;">发表日期</td>
            	<td>删除</td>
            	<td>修改</td>
            </tr>
        
        <?php
		    if($page==""){
		    	$page=1;
		    }
		    if(is_numeric($page))
		    {
		    	$page_size=8;
		    	$sql2=" select count(*) as total from `user_journal` WHERE auther='$name' order by id desc ";
			    $result2 = mysql_query($sql2); 
			    $message_count=mysql_result($result2,0,"total");
			    $page_count=ceil(($message_count)/$page_size);
			    $offset=($page-1)*$page_size;
		    }		
		?>
		
		
		<?php 
			$sql=" SELECT `id`, `title`, `content`, `date` FROM `user_journal` WHERE auther='$name' order by id desc limit $offset,$page_size";
			$result = mysql_query($sql); 
			if($i==""||$i>$message_count){
				$i=1;
			}
		?>
        
		<?php 
	        while($row = mysql_fetch_array($result) )
	        {				
        ?>	
            <tr bgcolor="lightcyan">
            	<td>
            		
            		<a href="user_jl_display.php?journal_id=<?php echo $row['id']?>&user_name=<?php echo $user_name;?>">            			
            			<?php echo $i;?>、<?php echo '《'.$row['title'].'》'?>   	
            		</a> 
            	</td>
            	<td style="text-align: center;"><?php echo $row['date']?></td>
            	<td style="width: 40px;">       		
            		<a href="delete_journal.php?journal_id=<?php echo $row['id']?>&user_name=<?php echo $user_name;?>">
	        		    <input type="button" value="删除" style="width: 40px;background-color:transparent;"/>	
	        		</a>            		
            	</td>
            	 <td style="width: 40px;">       		
            		<a href="user_modification.php?journal_id=<?php echo $row['id']?>&user_name=<?php echo $user_name;?>">
	        		    <input type="button" value="修改" style="width: 40px;background-color:transparent;"/>	
	        		</a>            		
            	</td>
            </tr>	    					       	
	    <?php
	    	$i=$i+1;
	        }
	    ?>
	    	<tr bgcolor="lightgray">
	    		<td >
	                                          页次：<?php echo $page?>/<?php echo $page_count?>页记录：<?php echo $message_count?>条
	            </td>	
	            <td colspan="3" style="text-align: right;width: 200px;">  		        
		        <?php
		        	if($page==1&&$page_count>1)
		    	    {		    		    
		    		    echo "<a href='user_jl_manage.php?page=".($page_count)."&i=".($i=$page_count*$page_size-7)."&user_name=".($user_name)." '>尾页|</a>";
		    		    echo "<a href='user_jl_manage.php?page=".($page+1)."&i=".($i=9)."&user_name=".($user_name)." '>|下一页</a>";
		    	    }
		    		if($page!=1&&$page!=$page_count)
		    	    {
		    		    echo "<a href='user_jl_manage.php?page=".($page-1)."&i=".($i-16)."&user_name=".($user_name)." '>上一页|</a>";
		    		    echo "<a href='user_jl_manage.php?page=".($page+1)."&i=".$i."&user_name=".($user_name)." '>|下一页</a>";
		    	    }
		    	    if($page!=1&&$page==$page_count)
		    	    {
		    		    echo "<a href='user_jl_manage.php?page=1&i=".($i=1)."&user_name=".($user_name)." '>首页|</a>";
		    		    echo "<a href='user_jl_manage.php?page=".($page-1)."&i=".($i=($page_count-1)*$page_size-2)."&user_name=".($user_name)." '>|上一页</a>";
		    	    }    	     
		        ?> 		        
		        </td>  
		    </tr> 
		</table>
	</body>
</html>