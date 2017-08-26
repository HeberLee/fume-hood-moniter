<?php

header('Content-Type:text/plain;charset=utf-8');
//从前端接收数据
 if(!empty($_POST)){
    $username=$_POST['username'];  
    $password=$_POST['password'];
 }

//连接数据库
$con = mysql_connect("localhost","root","hqugxy");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

//插入获取的数据
mysql_select_db("hqu", $con);
$sql = "INSERT INTO `hqu`.`examine` 
(`machine`)
VALUES
('$username')";
mysql_query($sql,$con);
//为新用户新建文件夹和数据表
mkdir('./hqu/'.$username);
mysql_select_db("machine_data", $con);
$sql = "CREATE TABLE `$username`
(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  date VARCHAR(20) NOT NULL,
  wind_speed FLOAT(20) NOT NULL,
  temperature FLOAT(20) NOT NULL,
  humidity FLOAT(20) NOT NULL
)";
mysql_query($sql,$con);
echo "ok";


mysql_close($con);





?>