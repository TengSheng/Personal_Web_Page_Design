<?php
	session_name("admin");
	session_start();
	
    $name=$_SESSION['name'];	
	
    include("../../connect.php");
    
    $album_id=$_GET['album_id'];                //取得指定相册的id
    
    $sql_1 = "SELECT `album` FROM `user_album` WHERE id='$album_id' ";//取出指定相册的相册名
    $result_1 = mysql_query($sql_1); 
    $row_1 = mysql_fetch_array($result_1);
    $album_name=$row_1['album'];
//  echo $album_name;
     
    if(isset($_POST["submit_tj"]) && $_POST["submit_tj"] == "提交")
    {
    	$tpmc=htmlspecialchars($_POST["tpmc"]);//自定义图片名称
    	$tpmc=str_replace("\n","<br/>",$tpmc);
    	$tpmc=str_replace(" ","&nbsp;",$tpmc);
    	
    	$type=$_FILES['file']['type'];//图片类型
    	
    	$profix=array(".jpg",".gif",".jpeg",".png");//给定的图片类型
    	
    	$f_name=$_FILES['file']['name'];           //图片名称
  	    $file= "../img/".$f_name;                  //图片路径
    	
    	$pro_name=substr($f_name,strrpos($f_name,"."));//取上传图片的类型
    	if(!in_array(strtolower($pro_name),$profix)){
    		echo "<script>alert('文件格式不正确！');history.go(-1);</script>";
    		exit();
    	}else{
		    $query="INSERT INTO `user_image`(`name`, `file`, `date`,`type`,`album_name`) VALUES ('$tpmc','$file',now(),'$type','$album_name')";
	        $result = mysql_query($query); 
	        if($result)  
            {  
                echo "<script>alert('上传成功！'); history.go(-1);</script>";  
                
            }  
            else  
            {  
                echo "<script>alert('上传失败！'); history.go(-1);</script>";  
            } 
    	}
    }
?>