<?php
$row = [];
function search(&$row){
	$server = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "homework3";
	// 接收参数
	$id = $_GET['id'];

	// 创建一个链接
	$connect = mysqli_connect($server, $username, $password, $dbname);
	if(!$connect){
		exit("数据库连接失败");
	}

	// 查找
	$sql_search = "select * from students where id='{$id}'";
	$query = mysqli_query($connect, $sql_search);
	if(!$query){
		exit("查找失败！");
	}

	$row = mysqli_fetch_assoc($query);
}
if(!empty($_GET['id'])){
	search($row);
}
else{
	var_dump($_GET['id']);
	exit("请输入学号再查询！");
	header('Location:index.php');
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="container edit">
    <h4 class="alert alert-primary text-center">学号为 <?php echo $row['id']; ?> 的学生信息</h4>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">姓名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="gender" class="col-sm-2 col-form-label">性别</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $row['gender']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="age" class="col-sm-2 col-form-label">年龄</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="age" name="age" value="<?php echo $row['age']; ?>">
            </div>
        </div>
        <a href="index.php" class="btn btn-primary btn-block">返回</a>
</div>
