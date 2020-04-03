<?php
$server = "localhost";
$username = "root";
$password = "123456";
$dbname = "homework3";
// 创建连接
$link = mysqli_connect($server, $username, $password, $dbname);
if ($link->connect_error) {
    die("连接失败: " . $link->connect_error);
}

// 查询
$query = mysqli_query($link, 'select * from students;');
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
    <div class="container">
        <h1 class="text-center">首页</h1>
        <!-- <a href="search.php" class="btn btn-primary ">查找</a> -->
   
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">学号</th>
                <th class="text-center">姓名</th>
                <th class="text-center">性别</th>
                <th class="text-center">年龄</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)): ?>
            <tr class="text-center">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['gender']==1?'♀' : '♂' ; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-primary" style="background-color: lightblue;border-color:lightblue;">删除</a>
                    <a href="update_view.php?id=<?php echo $row['id'];?>" class="btn btn-danger"style="background-color: lightred; ">修改</a>
                </td>
            </tr>
            <?php endwhile;?>
            </tbody>
        </table>
        <a class="btn btn-primary btn-block" href="add.php">添加学生信息</a>
        <form action="search.php"  method="GET">
                <div class="input-group" style="margin:35px auto;">
                    <input type="text" id="id" name="id" style="height:40px; border-radius:8px 0 0 8px;" placeholder="&nbsp请输入学号以查询" />
                    <input type="submit" style="height: 40px; background-color:white;border-radius:0 8px 8px 0;" value="Submit" />
                    <!-- <a href="find.php?id=<?php echo $row['id'];?>" class="input-group-addon" style="diplay:inline-block; background-color: lightblue;color:white;">查询</a> -->
                </div>
        </form>
    </div>
</body>
</html>