<?php
function delete(){
	// 配置
	$server = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "homework3";

	// 接收参数
	$id = $_GET['id'];

	// 创建一个连接
    $connect = mysqli_connect($server, $username, $password, $dbname);
	if(!$connect){
        exit('<h1>连接数据库失败</h1>');
	}
	// 删除，成功返回true，失败返回false
	$sql_del = "delete from students where id = {$id}";
	$query = mysqli_query($connect,$sql_del);
    if (!$query) {	
        exit('<h1>删除失败！</h1>');
	}
	header('Location: index.php');
}

// 参数id不为空再执行删除
if(!empty($_GET['id'])){
	delete();
}
?>


