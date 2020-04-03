<?php
$server = "localhost";
$username = "root";
$password = "123456";
$dbname = "homework3";

	// 接收参数
	if(empty($_GET['id'])){
		exit('<h1>缺少指定参数！</h1>');
		return;
	}
	$id = $_GET['id'];

	// 创建一个链接
	$connect = mysqli_connect($server, $username, $password, $dbname);
	if(!$connect){
		exit('<h1>连接数据库失败</h1>');
	}

	$sql = "select * from students where id = {$id}";

	$query = mysqli_query($connect,$sql);
	if(!$query){
		exit('<h1>目标不存在！</h1>');
	}

	$row = mysqli_fetch_assoc($query);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<div class="container edit">
    <h4 class="alert alert-primary text-center">修改 id=<?php echo $row['id']; ?> 的学生信息</h4>
    <form method="post" action="update.php">
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
        <button type="submit" class="btn btn-primary btn-block">保存</button>
    </form>
</div>
