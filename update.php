<?php
$server = "localhost";
$username = "root";
$password = "123456";
$dbname = "homework3";

$id = $_POST["id"];
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$connect = mysqli_connect($server, $username, $password, $dbname);
if(!$connect){
    exit('<h1>数据库连接失败！</h1>');
}

// 更新
$sql_update = "update students set gender='{$gender}',age='{$age}',name='{$name}' WHERE id='{$id}'";

$query = mysqli_query($connect, $sql_update);
if (!$query) {
    echo mysqli_error($connect);
    exit('<h1>更新失败！</h1>');
}

//重定向
header('Location:index.php');
?>
