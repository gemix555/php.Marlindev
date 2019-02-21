<?php

function updateTask($post)
{
    $pdo = new PDO("mysql:host=192.168.10.10; dbname=php.test", "homestead", "secret");

    $sql = "UPDATE tasks SET title=:title,content=:content WHERE id=:id";

    $statement = $pdo->prepare($sql);

    $statement->execute($post);

    header("Location:/");

}

updateTask($_POST);