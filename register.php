<?php

    include("connect.php");
   
    if(!empty($_POST['submit']))
    {
   	    $name=$_POST['name'];
   	    $pwd1=$_POST['psw1'];
   	    $pwd2=$_POST['psw2'];
   	    $sex=$_POST['gender'];
   	    $date=$_POST['date'];
   	    if(($name!=null)&&($pwd1!=null)&&($sex!=null)&&($date!=null)){
   	    	$sql="SELECT * FROM `user` WHERE `name` = '$_POST[name]'";
            $result = mysql_query($sql);    //执行SQL语句  
            $num = mysql_num_rows($result); //统计执行结果影响的行数  
            if($num){
            	echo "<script>alert('用户名已存在'); history.go(-1);</script>";
            }
            else    //不存在当前注册用户名称  
            {  
            	if($pwd1==$pwd2){
            		$sql_insert = "INSERT INTO `user`(`name`, `pwd`, `sex`, `date`) VALUES ('$name','$pwd1','$sex','$date')"; 
                    $res_insert = mysql_query($sql_insert); 
                    $sql_insert1 = "INSERT INTO `user_information`(`name`, `gender`, `birthday`) VALUES ('$name','$sex','$date')"; 
                    $res_insert1 = mysql_query($sql_insert1); 
                    if($res_insert)  
                    {  
                        echo "<script>alert('注册成功！'); history.go(-1);</script>";  
                    } 
            	}
            	else{
            		 echo "<script>alert('密码不一致！'); history.go(-1);</script>";
            	}
                
            }
   	    }
   	    else {
   	    	if(($name==null)&&($pwd1==null)&&($date==null)&&($sex!=null)){
   	    		
   	    		echo "<script>alert('请填写注册信息');history.go(-1);</script>";
   	    		
   	    	}
   	    	else if((($name==null)||($pwd1==null)||($date==null))&&($sex!=null)){
   	    		echo "<script>alert('信息填写不完整');history.go(-1);</script>";
   	    	}
   	    
   	    }
   	     
 }

?>
