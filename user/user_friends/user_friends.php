<?php
	session_name("admin");
	session_start();
	
	$user_name_1=$_GET['user_name'];
    $name=$_SESSION[$user_name_1];
	
    include("../../connect.php");
    
    if(isset($_POST["submit"]) && $_POST["submit"] == "发送申请"){
        
    	$user_name=$_POST["name"];
    	
    	$sql_4="SELECT * FROM `user_information` WHERE name='$name' ";
    	$result_4 = mysql_query($sql_4); 
    	$row_4 = mysql_fetch_array($result_4);
    	if($name==$row_4['name'])
    	{    		 
    		$nickname=$row_4['nickname'];
    		$headimg=$row_4['headimg'];
    		
    		$sql_6="SELECT `id` FROM `user` WHERE name='$name'";
    	    $result_6 = mysql_query($sql_6); 
    	    $row_6 = mysql_fetch_array($result_6);
    		$user_id=$row_6['id'];
    	    $sql_7="INSERT INTO `user_friends`(`friend_name`,`name`,`nickname`, `headimg`, `user_id`, `accept`, `inform_read`) 
    	    VALUES ('$user_name','$name','$nickname','$headimg','$user_id','no','no' )";
    	    $result_7 = mysql_query($sql_7);
    	    
//  	    $sql_12="SELECT * FROM `user_information` WHERE name='$user_name'";
//  	    $result_12 = mysql_query($sql_12); 
//  	    $row_12 = mysql_fetch_array($result_12);
//  	    $nickname_1=$row_12['nickname'];
//  	    $headimg_1=$row_12['headimg'];
//  	    
//  	    $sql_13="SELECT * FROM `user` WHERE name='$user_name'";
//  	    $result_13 = mysql_query($sql_13); 
//  	    $row_13 = mysql_fetch_array($result_13);
//  	    $user_id_1=$row_13['id'];
//  	    
//  	    
//  	    $sql_11="INSERT INTO `user_friends`(`friend_name`,`name`,`nickname`, `headimg`, `user_id`, `accept`, `inform_read`)
//  	    VALUES ('$name','$user_name','$nickname_1','$headimg_1','$user_id_1','no','no' )";
//  	    $result_11 = mysql_query($sql_11); 
    	    echo "<script>alert('好友添加申请发送！');history.go(-1);</script>";
    	}else{
    		 echo "<script>alert('用户不存在！');history.go(-1);</script>"; 
    	}
   }

   
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style>
			*{margin: 0px;padding: 0px;}
			.class_form{
				width: 500px;height: 25px;
				/*border: 1px solid black;*/
				
				position: absolute;
				top: 50px;
				left: 400px;
			}
			.class_btn{
				width: 80px;height: 25px;
			}
			#id_div_add{
				width: 600px;height: 300px;
				/*border: 1px solid black;*/
				display: none;
				background: white;
				
				position: absolute;
				top: 100px;
				left: 400px;
			}
			.friends_form{
				width: 600px;height: 300px;
				/*border: 1px solid black;*/
				
				position: absolute;
				top: 0px;
				left: 0px;
			}
			.friends{
				width: 600px;height: 300px;
				border: 1px solid black;
				
				position: absolute;
				top: 0px;
				left: 0px;
			}
			.form_btn{
				position: absolute;
				top: 0px;
				right: 0px;
			}
			.add_block{
				width: 300px;height: 150px;
				/*border: 1px solid black;*/
				
				position: absolute;
				top: 100px;
				left: 100px;
			}
			.show{
				position: absolute;
				top: 100px;
				left: 400px;
			}
			tr{border: 0px;}
			td{border: 0px;}
			.headimg{				
				width: 30px;height: 30px;
				border: 1px solid black;
				border-radius: 15px;
				margin-bottom: -5px;
			}
			
			#id_div_ifmt{
				width: 600px;height: 300px;
				border: 1px solid black;
				display: none;
				background: white;
				
				position: absolute;
				top: 100px;
				left: 400px;
			}

		</style>
	    <script>		
	    window.onload=function(){
	    	var oDiv=document.getElementById('id_div_add');
	    	var oBtn1=document.getElementById('id_btn_add');
			var oForm=document.getElementById('id_form');
			
			var oBtn2=document.getElementById('id_btn_close');
			
			var oDiv_1=document.getElementById('id_div_ifmt');
	    	var oBtn_1=document.getElementById('id_btn_ifmt');
			var oForm_1=document.getElementById('id_form_1');
			
			var oBtn_2=document.getElementById('id_btn_close_1');
			
			oForm.onsubmit=function(){
				if(myform.name.value=="")
				{
					alert("必须填写用户名称！");
					myform.albumname.focus();
					return false;
				}
			}
			
			oBtn1.onclick=function(){
					oDiv.style.display='block';
					oDiv_1.style.display='none';
					oForm_4.style.display='none';

			}
			oBtn2.onclick=function(){
					oDiv.style.display='none';

			}			
			
			
			oBtn_1.onclick=function(){
					oDiv_1.style.display='block';
					oDiv.style.display='none';
					oForm_4.style.display='none';

			}
			oBtn_2.onclick=function(){
					oDiv_1.style.display='none';

			}
		}


		</script>
	</head>
	<body style="background-image: url(../../bg_image/16.jpg);background-size: 1366px,800px;position: relative;">
		<form action="user_friends.php" method="post" class="class_form">			
			<input type="button" value="添加好友" class="class_btn_1" id="id_btn_add"/>
			<input type="button" value="消息通知" class="class_btn_1" id="id_btn_ifmt"/>
		</form>
		<table border="" cellspacing="" cellpadding="" class="show">
			<tr>
				<td style="width:100px;">头像</td>
				<td style="width:100px;">用户名</td>
				<td style="width:100px;">昵称</td>
				<td style="width:90px;">删除好友</td>
				<td style="width:90px;">访问好友</td>
				<!--<td style="width:90px;">好友聊天</td>-->
			</tr>
			<?php
			    $sql_9="SELECT * FROM `user_friends` ";
    	        $result_9 = mysql_query($sql_9); 
    	        while($row_9 = mysql_fetch_array($result_9))
    	        {
    	        	if($row_9['accept']=="yes")
    	        	{
    	        		if($row_9['friend_name']==$name)
    	        		{
			?>
			<tr>
				<td>
					<img src="../<?php echo $row_9['headimg'];?>" class="headimg"/>
				</td>
				<td>
					<?php echo $row_9['name'];?>
				</td>
				<td><?php echo $row_9['nickname'];?></td>
				<td>
					<a href="user_friends_3.php?id=<?php echo $row_9['id'];?>"><input type="button" value="删除好友"/></a>
				</td>
				<td>
					<a href="../../visitor/visitor_frame.php?id=<?php echo $row_9['user_id'];?>&friend_name=<?php echo $name;?>" target="_black">
						<input type="button" value="访问好友" id="id_btn_visitor"/>
					</a>
				</td>
			<?php
				        }
				    }
			    }
			?>
		</table>
		<div id="id_div_add">		
		<form action="" name="myform" method="post" class="friends_form" id="id_form">
			<fieldset class="friends">
				<legend>添加好友</legend>
				<input type="button" value="关闭" class="form_btn" id="id_btn_close"/>				
			    <div class="add_block">	
			    	<hr />		
			                  用户名：<input type="text" name="name" id="id_div_name"/><br />
		            <input type="submit" name="submit" value="发送申请" style="position: absolute;top: 50px;left: 100px;"/><br />
		        </div>
			</fieldset>
		</form>
		</div>   
		
		<div id="id_div_ifmt">
			<?php		
			    $sql_3=" select count(*) as total from `user_friends` WHERE friend_name='$name' AND inform_read='no' ";
			    $result_3 = mysql_query($sql_3); 
			    $friends_count=mysql_result($result_3,0,"total");
			    
			?>
		<form action="" name="myform_1" method="post" class="friends_form_1" id="id_form_1">
			<fieldset class="information">
				<legend>消息通知</legend>
				<input type="button" value="关闭" class="form_btn" id="id_btn_close_1"/>
				未读消息：<?php echo $friends_count;?>
				<?php
				    $sql_5="SELECT * FROM `user_friends` WHERE friend_name='$name' ";
    			    $result_5 = mysql_query($sql_5); 
    			    while($row_5 = mysql_fetch_array($result_5))
    			    {
    			    	if($row_5['inform_read']=="no") {
    			    	$id=$row_5['user_id'];
    			    	$sql_8="SELECT * FROM `user` WHERE id=".$id;
    			        $result_8 = mysql_query($sql_8); 
    			        $row_8 = mysql_fetch_array($result_8);
				?>
				<div class="">
					<span id="">申请添加好友：<?php echo $row_8['name'];?></span>
					<span id="">
						<a href="user_friends_1.php?friends_id=<?php echo $row_5['id'];?>&user_id=<?php echo $row_5['user_id'];?>"><input type="button" value="接受"/></a>
					</span>
					<span id="">
						<a href="user_friends_2.php?friends_id=<?php echo $row_5['id'];?>&user_id=<?php echo $row_5['user_id'];?>"><input type="button" value="拒绝"/></a>
					</span>					
				</div>
				<?php
					   }
				    }
				?>
			</fieldset>
		</form>
		</div> 

	</body>
</html>
