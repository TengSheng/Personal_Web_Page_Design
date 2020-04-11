<?php
    header("content-type:text/html;charset=utf-8");
    $link=@mysql_connect("localhost:3306","root","root")or die("MySQL连接失败");
    mysql_select_db("personal_web",$link);
    mysql_query("set names utf8");
// $sql="INSERT INTO `pro`(uName, uPwd, uSex, uTle, uEmail) VALUES ('贾邦飞','123456','1','123456789101','qq@qq.com')";
// mysql_query($sql);
// $sql="delete from `pro` where uid=0";
// mysql_query($sql);
    
// 
//$sql="INSERT INTO `register`(`name`, `pwd`, `sex`) VALUES ('qwwert','123456','1')";
// echo mysql_query($sql);
    function htmltocode($content){
   	    $content = str_replace(" ","&nbsp;&nbsp;",$content);//str_replace("\n","<br/>",str_replace(" ","&nbsp;&nbsp;",$content));
   	    return $content;
   }
?>