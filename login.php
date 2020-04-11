<?php  
	$sid1 = $_GET['sid'];
    session_id($sid1);
    session_start();
    
	include("connect.php");
	
    if(isset($_POST['submit']) && $_POST['submit'] == "登录")
    {  
        $user=$_POST['name'];  
        $pwd=$_POST['pwd'];  
        $iden=$_POST['identity']; 
                
        if(($user==null)||($pwd==null))  
        {
        	echo "<script>alert('请输入用户名或者密码！'); history.go(-1);</script>";
        }
        else
        {
            if($iden==1){
            	if(($user!=null)&&($pwd!=null))
        		{
            	    $sql = "SELECT * FROM `admin` WHERE `uname`='$user'";
                    $result = mysql_query($sql);
                    $array = mysql_fetch_array($result);
                    $num = mysql_num_rows($result);
                    if($num)
                    {
                	    if($_POST['code']==$_SESSION['code'])
                	    {
                	    	
                	        $_SESSION['adname']=$array['uname'];
                            echo "<script>alert('管理员登录成功');location.href='admin/ad_frame.php';</script>";//页面跳转
                        }else{
                    	    echo "<script>alert('验证码错误！');history.go(-1);</script>";
                        }                              
                    }  
                    else  
                    {  
                         echo "<script>alert('管理员名或密码不正确！');history.go(-1);</script>";
                    }
                }
            }else if($iden==2){
            	if(($user!=null)&&($pwd!=null))
        		{
           	        $sql = "SELECT * FROM `user` WHERE `name`='$user' and `pwd`='$pwd'";
                    $result = mysql_query($sql);
                    $array = mysql_fetch_array($result);
                    $num = mysql_num_rows($result);
                    if($num)  
                    {
                    	if($array['grade']=='high')
                    	{
                    		if($array['login_limit']=="yes")
                	        {
                		        if($_POST['code']==$_SESSION['code'])
                		        {
                		        	$user_name=$array['name'];
                	                $_SESSION[$user_name]=$array['name']; 
                                    echo "<script>alert('高级用户登录成功');location.href='user/user_frame.php?user_name=".$user_name." ';</script>";//页面跳转index.php   
                                }else{
                    	            echo "<script>alert('验证码错误！');history.go(-1);</script>";
                                }
                            }
                	        else{
                		        echo "<script>alert('用户名登录权限被禁止！');history.go(-1);</script>";
                	        }
                    	}
                    	if($array['grade']=='low')
                    	{
                    		if($array['login_limit']=="yes")
                	        {
                		        if($_POST['code']==$_SESSION['code'])
                		        {
                		        	$user_name=$array['name'];
                	                $_SESSION[$user_name]=$array['name'];
                                    echo "<script>alert('普通用户登录成功');location.href='user/user_visitor/visitor_frame.php?user_name=".$user_name." ';</script>";//页面跳转index.php   
                                }else{
                    	            echo "<script>alert('验证码错误！');history.go(-1);</script>";
                                }
                            }  	   
                	        else{
                		        echo "<script>alert('用户名登录权限被禁止！');history.go(-1);</script>";
                	        }
                    	}
                    }else
                    {
                        echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
                    }
                }
            }
            if($iden==3){
            	if($user!=null&&$pwd!=null){
         	        echo "<script>alert('输入有误！'); history.go(-1);</script>";
         	    }
            }            
        }
    }
    else
    {
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";
    }  
?>  