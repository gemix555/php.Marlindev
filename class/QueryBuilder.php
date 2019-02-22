<?php


class QueryBuilder
{

    protected $pdo;

    public function __construct()
    {


        $this->pdo = new PDO("mysql:host=192.168.10.10; dbname=php.test", "homestead", "secret");

    }

    public function getAllTasks()
    {
        $sql = "SELECT * FROM tasks";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $tasks = $statement->fetchAll(2);
        return $tasks;
    }

    function showTask($id)
    {
        $sql = "SELECT * FROM tasks WHERE id=:id";
        $statement =$this->pdo->prepare($sql);

        $statement->bindParam(":id", $id);

        $statement->execute();
        $result = $statement->fetch(2);
        return $result;
    }

    public function addTask($post)
    {
            var_dump($post);
        $sql = "INSERT INTO tasks(title,content) VALUES (:title, :content)";

        $statement =$this->pdo->prepare($sql);

        $statement->execute($post);

        header("Location:/");

    }
    public function updateTask($post)
    {

        $sql = "UPDATE tasks SET title=:title,content=:content WHERE id=:id";

        $statement = $this->pdo->prepare($sql);

        $statement->execute($post);

        header("Location:/");
    }

    public function getTask($id)
    {

        $sql = "SELECT * FROM tasks WHERE id=:id";
        $statement =$this->pdo->prepare($sql);

        $statement->bindParam(":id", $id);

        $statement->execute();
        $result = $statement->fetch(2);
        return $result;
    }

    public function deleteTask($id)
    {


        $sql = "DELETE FROM tasks  WHERE id=:id";

        $statement =$this->pdo->prepare($sql);

        $statement->execute($id);

        header("Location:/");

    }
}