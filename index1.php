
<?php
// 注意，这个
// 创建一个链接
$server = "localhost";
$username = "root";
$password = "123456";
$dbname = "homework3";

$connect = new mysqli($server, $username, $password, $dbname);
if(!$connect){
	echo "连接失败： ".mysqli_connect_errno().PHP_EOL;
	exit;
}

// 查
$sql_find = "select * from students";
global $query;
$query = $connect->query($sql_find);
if($query){
	while($row = $query->fetch_assoc()){
        var_dump($row);
	}
}
else{
	echo "查找失败：" . $connect->error;
}
?>

<?php 	
    if($query){
        var_dump($query);
        while($row = $query->fetch_assoc()){
            var_dump($row);
        }
    
	}?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="container">
    <h1 class="text-center">首页</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center">id</th>
            <th class="text-center">name</th>
            <th class="text-center">gender</th>
            <th class="text-center">age</th>
            <th class="text-center">operations</th>
        </tr>
        </thead>
        <tbody>
            <?php while (var_dump($query->fetch_assoc ())&&$row = $query->fetch_assoc()): ?>
                <tr class="text-center">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['gender']==1?'♀' : '♂' ; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-primary">删除</a>
                        <a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-danger">修改</a>
                    </td>
                </tr>
            <?php endwhile;    ?>
        </tbody>
    </table>
    <a class="btn btn-primary btn-block" href="add.php">添加学生信息</a>
</div>
