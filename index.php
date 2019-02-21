<?php



function getAllTasks()
{
    $pdo = new PDO("mysql:host=192.168.10.10; dbname=php.test", "homestead", "secret");
    $sql = "SELECT * FROM tasks";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $tasks = $statement->fetchAll(2);
    return $tasks;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Index</h1>
            <a class="btn btn-success" href="create.php">Add Task</a>
            <table class="table">
                <thead>
                 <tr>
                     <th>ID</th>
                     <th>Title</th>
                     <th>Actions</th>
                 </tr>
                </thead>
                <tbody>
                <?php foreach (getAllTasks() as $task): ?>
                    <tr>
                        <td><?php echo $task['id'] ;?></td>
                        <td><?php echo $task['title'];?></td>
                        <td>
                            <a href="show.php?id=<?php echo $task['id'] ?>" class="btn btn-success">Show</a>
                            <a href="edit.php?id=<?php echo $task['id'] ?>" class="btn btn-warning">Edit</a>
                            <a onclick="return confirm('Вы уверены что надо удалить ?')" href="delete.php?id=<?php echo $task['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
