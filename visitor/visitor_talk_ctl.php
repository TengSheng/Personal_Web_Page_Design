<?php
    $id=$_GET['id'];                      //所要访问用户的id
    $friend_name=$_GET['friend_name'];    //访问者名字
    
	include("../connect.php");
	
	$sql_1="SELECT `name` FROM `user` WHERE id=".$id;
	$result_1=mysql_query($sql_1);
	$row_1 = mysql_fetch_array($result_1);

	$name=$row_1['name'];

    $talkabout=$_GET['talkabout_id'];
    
    if($_GET['talkabout_id'])
    {
    	$sql_4="SELECT `browse` FROM `user_talkabout` WHERE id=".$talkabout;
    	$result_4 = mysql_query($sql_4); 
    	$row_4 = mysql_fetch_array($result_4);
    	
    	$browse=$row_4['browse']+1;
    	
    	$sql_7="UPDATE `user_talkabout` SET `browse`='$browse' WHERE id=".$talkabout;
    	$result_7 = mysql_query($sql_7);
    }
    if(isset($_POST["praise"]))
    {
   	    $sql_6="SELECT `praise` FROM `user_talkabout` WHERE id=".$talkabout;
    	$result_6 = mysql_query($sql_6); 
    	$row_6 = mysql_fetch_array($result_6);
    	
    	$praise=$row_6['praise']+1;
    	
    	$sql_9="UPDATE `user_talkabout` SET `praise`='$praise' WHERE id=".$talkabout;
    	$result_9 = mysql_query($sql_9);
    }

    if(isset($_POST["submit_1"]) && $_POST["submit_1"] == "评论")
    {    	
    	$comment=$_POST["comment"];
    	$ta_id=$_POST["ta_id"];
    	
    	$sql_2 = "INSERT INTO `visitor_comment`(`date`,`content`,`ta_id`,`name`,`friend_name`) VALUES (now(),'$comment','$ta_id','$name','$friend_name')";
        $result1_2 = mysql_query($sql_2); 
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
			.img_scan{
				width: 15px;height: 15px;
				border: 1px solid black;
				border-radius: 5px;
				margin-bottom: -2px;
			}
			.ipt_praise{				
				width: 20px;height: 20px;
				border: 1px solid black;
				border-radius: 5px;
				margin-bottom: -2px;
				background: url(../bg_image/09.png) no-repeat;
				background-size: 20px,20px;			
			}
			.span_praise{
				position: absolute;
		    	right: 50px;
			}
			td{
            	position: relative;
            }
			a{
		    	text-decoration: none;
		    	color: black;
		    	
		    	position: absolute;
		    	right: 5px;
		    }
		     a:hover{
		     	color: blue;
                text-decoration:underline;
            }
            .a_return{
            	position: absolute;
		    	left: 5px;
            }
            .a_btn{
            	width: 80px;height: 25px;
            	border-radius: 5px;
            	border: 0px;
            	background: royalblue;
            }

		</style>

	</head>
	<body style="background-image: url(../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		<a href="visitor_talkabout.php?id=<?php echo $id?>&friend_name=<?php echo $friend_name;?>" class="a_return">
			<input type="button" value="返回上一页" style="width: 80px;height: 30px;position: absolute;top: 10px;left: 395px;"/>
		</a>
		<form action="" method="post" name="myform" >
		<table border="0" cellspacing="1" cellpadding="5" width="500px" bgcolor="white" style="position: absolute;top:50px;left:400px">		
			<?php 
			$sql=" SELECT `id`,`name`,`content`,`date`,`browse`,`praise` FROM `user_talkabout` WHERE id='$talkabout' ORDER BY id DESC ";
			$result = mysql_query($sql); 			
			while($row = mysql_fetch_array($result))
			{		
				$sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			    $res_insert1 = mysql_query($sql_insert1);
			    $row_insert1 = mysql_fetch_array($res_insert1);
			    
			    $browse_slt=$row['browse']; 	        
		    ?>		    	
		
		    <tr bgcolor="white" style="position: relative;">			
			    <td ><img src="<?php echo $row_insert1['headimg'] ?>" class="headimg"/>
			    	&nbsp;<?php echo $row['name']?>&nbsp;&nbsp;<?php echo $row['date']?>			    		
			    </td>
		    </tr>
		    <tr bgcolor="white">
		    	<td >	    		
		    		<br />	
		    		&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmltocode($row['content'])?>		    		
		    	</td>
		    </tr>
		     <tr bgcolor="white">
		    	<td style="font-size: 17px;color: lightgray;">
		    		<br />	
		    		浏览量&nbsp;<img src="../bg_image/08.png"/ class="img_scan">&nbsp;:&nbsp;<?php echo $row['browse']?>
		    		<span class="span_praise"><input type="submit" name="praise" value="" class="ipt_praise"/>&nbsp;:&nbsp;<?php echo $row['praise']?></span>
		    	</td>
		    </tr>
		    <?php
		        $sql1=" SELECT * FROM `visitor_comment` ";  //WhERE name='$friend_name'
			    $result1 = mysql_query($sql1);
			    if( mysql_num_rows($result1))
			    {
		            while($row1 = mysql_fetch_array($result1))
		            {
		            	if($row['id']==$row1['ta_id']) 
		            	{	
		            		$comment_id=$row1['id'];
		            		$sql_select_1 = "SELECT `friend_name` FROM `visitor_comment` WHERE id='$comment_id' ";
			        		$res_select_1 = mysql_query($sql_select_1);
			        		$row_select_1 = mysql_fetch_array($res_select_1);
		            		
		            		$friend_name_2=$row_select_1['friend_name'];
		            		$sql_select_2 = "SELECT `headimg` FROM `user_friends` WHERE name='$friend_name_2'";
			        		$res_select_2 = mysql_query($sql_select_2);
			        		$row_select_2 = mysql_fetch_array($res_select_2);	            		   
		    ?>
		    <tr>		    	
		    	<td>
		    		<br />
		    		<img src="<?php echo $row_select_2['headimg'] ?>" class="headimg"/>
		    		&nbsp;评论：&nbsp;<?php echo $row1['date']?>			
		    	</td>		    			    		
		    </tr>
		    <tr>
		    	<td>
		    		&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmltocode($row1['content'])?>
		    	</td>	 
		    </tr>

		        <?php 
		        	$sql3=" SELECT `id`,`date`,`content`,`cm_id` FROM `user_replay` WhERE name='$name'";
			        $result3 = mysql_query($sql3);
			        if( mysql_num_rows($result3))
			        { 
		                while($row3 = mysql_fetch_array($result3))
		                {	
		                	if($row1['id']==$row3['cm_id'])
		                	{		                		        	
		        ?>
		        <tr>		    	
		    	    <td style="background: white;">
		    	    	<br />
		    	    	&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $row_insert1['headimg'] ?>" class="headimg"/>
		    	    	&nbsp;<?php echo $row3['date']?>&nbsp;回复：
		    	    		
		    	    </td>		    			    		
		        </tr>
		        <tr>
		        	<td style="background: white;">		        		
			    	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmltocode($row3['content'])?>
		        	</td>	 
		        </tr>
		        <?php
		                    }

		                }	        
		            }
		        ?>
		    <?php
		    	        } 	
		            } 
		        
		        }
		    ?>
		 	<tr>
		    	<td>
		    		<input type="hidden" name="ta_id" style="width: 100px;height: 20px;" value="<?php echo $row['id'];?>"/>
		    	</td>
		    </tr> 
		<?php
		    }
		?>
			<tr >
		    	<td>
		    		<hr /><br />
		    	</td>
		   </tr>
			<tr>
		    	<td><textarea type="text" name="comment" class="class_text" placeholder="评论" style="width: 500px;height: 100px;"></textarea></td>
		    </tr>
		    <tr>
		    	<td>
		    		<a href="#"><input type="submit" name="submit_1" value="评论" class="a_btn" />		    			
		    		</a>
		    	</td>
		    </tr> 
		    </table>  
		</form>	      
	</body>
</html>