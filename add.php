<?php

function add_user(){
	// 配置
	$server = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "homework3";
	// 接收参数
	$id = $_POST['id'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];

	// 创建一个链接
	$connect = new mysqli($server, $username, $password, $dbname);
	if(!$connect){
        $GLOBALS['msg'] = '连接数据库失败';
        return;
	}

	// 插入数据库
	$sql = "insert into students (id, name, gender, age) 
	values('{$id}', '{$name}', '{$gender}', '{$age}')";

	if(!$connect->query($sql)){
		$GLOBALS['msg'] = '添加失败';
		return;
	}
	// 重定向
    header('Location:index.php');
}

// 收到post请求后执行添加函数 
if($_SERVER['REQUEST_METHOD']==='POST'){
    add_user();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container add">
		<h4 class="alert alert-primary text-center">添加学生信息</h4>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group row">
				<label for="id" class="col-sm-2 col-form-label">学号</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="id" id="id">
				</div>
			</div>

			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">姓名</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" id="name">
				</div>
			</div>
			<div class="form-group row">
				<label for="gender" class="col-sm-2 col-form-label">性别</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="gender" name="gender">
				</div>
			</div>
			<div class="form-group row">
				<label for="age" class="col-sm-2 col-form-label">年龄</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="age" name="age">
				</div>
			</div>
			<!--这里添加提示-->
			<?php if(!empty($GLOBALS['msg'])): ?>
			<div class="alert alert-warning" role="alert">
				<?php echo $GLOBALS['msg']; ?>
			</div>
			<?php endif ?>
			<button type="submit" class="btn btn-primary btn-block">保存</button>
		</form>
	</div>
</body>
</html>


