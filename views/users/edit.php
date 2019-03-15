<?php
require CONTROLLER . 'QueryBuilder.php';
$user= new QueryBuilder();
$result = $user->getUser($_GET['email']);
var_dump($result);
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
            <h1>Edit Task</h1>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $result['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $result['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" id="password" value="<?php echo $result['password'] ?>">
                </div>
                <div>
                    <label for="avatar">Choose avatar</label>
                    <input type="file" name="avatar"  id="avatar">
                    <img src="../upload/<?php echo $result['avatar'] ?>" width="150" alt="">
                </div>
                <div class="form-group">
                    <button  class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>

            <a href="index.php" class="btn btn-success">Go back</a>
        </div>
    </div>
</div>
</body>
</html>
