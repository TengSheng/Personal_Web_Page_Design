<?php
    session_name("admin");
	session_start();
	
	$user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    $talkabout=$_GET['talkabout_id'];

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
				/*position: absolute;
				top: 0px;*/
				/*left: 100px;*/
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
				background: url(../../bg_image/09.png) no-repeat;
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
	<body style="background-image: url(../../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<hr />
		<a href="visitor_talkabout.php?user_name=<?php echo $user_name;?>" class="a_return"><input type="button" value="返回上一页" style="width: 80px;height: 30px;"/></a>
		<form action="" method="post" name="myform" >

		<table border="0" cellspacing="1" cellpadding="5" width="500px" bgcolor="white" style="position: absolute;top:50px;left:400px">
		<?php 
			$sql=" SELECT `id`,`name`,`content`,`date`,`browse`,`praise` FROM `user_talkabout` WHERE id='$talkabout' ORDER BY id DESC ";
			$result = mysql_query($sql); 			
			while($row = mysql_fetch_array($result) )
			{		
				$sql_insert1 = "SELECT `headimg` FROM `user_information` WHERE name='$name'";
			    $res_insert1 = mysql_query($sql_insert1);
			    $row_insert1 = mysql_fetch_array($res_insert1);
			    
			    $browse_slt=$row['browse']; 	        
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
		    		&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmltocode($row['content'])?>		    		
		    	</td>
		    </tr>
		     <tr bgcolor="white">
		    	<td style="font-size: 17px;color: lightgray;">
		    		<br />	
		    		浏览量&nbsp;<img src="../../bg_image/08.png"/ class="img_scan">&nbsp;:&nbsp;<?php echo $row['browse']?>
		    		<span class="span_praise"><input type="submit" name="praise" value="" class="ipt_praise"/>&nbsp;:&nbsp;<?php echo $row['praise']?></span>
		    	</td>			
		    </tr>
		    <?php
		        $sql1=" SELECT * FROM `visitor_comment` WhERE name='$name'";
			    $result1 = mysql_query($sql1);
			    if( mysql_num_rows($result1))
			    { 
		            while($row1 = mysql_fetch_array($result1))
		            {
		            	if($row['id']==$row1['ta_id']) 
		            	{
		            		$friend_name=$row1['friend_name'];
		            		
		            		$sql_select_2 = "SELECT `headimg` FROM `user_information` WHERE name='$friend_name'";
			        		$res_select_2 = mysql_query($sql_select_2);
			        		$row_select_2 = mysql_fetch_array($res_select_2);			            		   
		    ?>
		    <tr>		    	
		    	<td>
		    		<br />
		    		<img src="../<?php echo $row_select_2['headimg'] ?>" class="headimg"/>
		    		&nbsp;<?php echo $row1['friend_name']?>评论：&nbsp;<?php echo $row1['date']?>		    			
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
		                while($row3 = mysql_fetch_array($result3)){	
		                	if($row1['id']==$row3['cm_id'])
		                	{		                		        	
		        ?>
		        <tr>		    	
		    	    <td style="background: white;">
		    	    	<br />
		    	    	&nbsp;&nbsp;&nbsp;&nbsp;<img src="../<?php echo $row_insert1['headimg'] ?>" class="headimg"/>
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
		        ?>
		        <tr>
		    	    <td><input type="hidden" name="cm_id" style="width: 100px;height: 50px;" value="<?php echo $row1['id']?>"/></td>
		        </tr>
		        <?php
		                }		        
		            }
		        ?>	         	

		    <?php
		    	        } 	
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
	</table>
    </form>
	</body>
</html>