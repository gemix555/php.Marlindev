<?php


function addTask($data )
{
    $pdo = new PDO("mysql:host=192.168.10.10; dbname=php.test", "homestead", "secret");

    $sql = "INSERT INTO tasks(title,content) VALUES (:title, :content)";

    $statement =$pdo->prepare($sql);

    $statement->execute($data);

   header("Location:/");

}

addTask($_POST);
