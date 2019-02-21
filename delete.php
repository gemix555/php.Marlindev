<?php

function deleteTask($id)
{
    $pdo = new PDO("mysql:host=192.168.10.10; dbname=php.test", "homestead", "secret");

    $sql = "DELETE FROM tasks  WHERE id=:id";

    $statement =$pdo->prepare($sql);

    $statement->execute($id);

    header("Location:/");

}

deleteTask($_GET);