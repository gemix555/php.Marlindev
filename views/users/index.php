<?php
require_once '../../index.php';

$users = $db->all('users');

//$auth->register('user@mail.ru', '12345');
if($user->login('user@mail.ru', '12345'))
{
    echo "OK";
}else
{
    echo "Пользователя нет";
}
//$auth->logout();
$user = $user->currentUser();

//$user->fullName();
//$users = $auth->currentUser();

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
            <a class="btn btn-success" href="create.php">Add User</a>
            <table class="table">
                <thead>
                 <tr>
                     <th>ID</th>
                     <th>Avatar</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Status</th>
                     <th>Actions</th>
                 </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id'] ;?></td>
                        <td><img src="../../upload/<?php echo $user['avatar'] ;?>" width="50" alt=""></td>
                        <td><?php echo $user['name'];?></td>
                        <td><?php echo $user['email'];?></td>
                        <td><?php  if($user['status'] > 0 ){ echo 'активный';}else{ echo  'забанен'; };?></td>
                        <td>
                            <a href="show.php?email=<?php echo $user['email'] ?>" class="btn btn-success">Show</a>
                            <a href="edit.php?email=<?php echo $user['email'] ?>" class="btn btn-warning">Edit</a>
                            <a onclick="#" href="delete.php?email=<?php echo $user['email'] ?>" class="btn btn-danger">Delete</a>
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
