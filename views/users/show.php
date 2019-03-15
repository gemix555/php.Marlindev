<?php
require CONTROLLER . 'QueryBuilder.php';
$userId = new QueryBuilder();
$email = $_GET['email'];
//var_dump($email);die;
$user = $userId->getUser($email);

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
            <ul>
                <li>Name: <?php echo $user['name'] ?></li>
                <li>Email: <?php echo $user['email'] ?></li>
                <li>Password: <?php echo $user['password'] ?></li>
                <li>Avatar: <img src="../upload/<?php echo  $user['avatar'] ?>" width="150" alt=""></li>
            </ul>
            <a href="index.php" class="btn btn-success">Go back</a>
        </div>
    </div>
</div>
</body>
</html>
