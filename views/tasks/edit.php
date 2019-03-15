<?php
require CONTROLLER . 'QueryBuilder.php';
$tak = new QueryBuilder();
$result = $tak->getOne('tasks', $_GET['id']);

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

            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $result['id'] ;?>">
                <div class="form-group">
                    <label for="title">Text</label>
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo $result['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea name="content" id="content" cols="30" rows="5"><?php echo $result['content'] ?></textarea>


                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Submit</button>
                </div>
            </form>

            <a href="index.php" class="btn btn-success">Go back</a>
        </div>
    </div>
</div>
</body>
</html>
