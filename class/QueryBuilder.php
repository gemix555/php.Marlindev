<?php


class QueryBuilder
{

    protected $pdo;

    public function __construct()
    {


        $this->pdo = new PDO("mysql:host=192.168.10.10; dbname=php.test", "homestead", "secret");

    }

    public function all($table)
    {
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(2);
        return $result;
    }

    function getOne($table,$id)
    {
       // var_dump($table,$id);
        $sql = "SELECT * FROM $table WHERE id=:id";
        $statement =$this->pdo->prepare($sql);

        $statement->bindParam(":id", $id);

        $statement->execute();
        $result = $statement->fetch(2);
        return $result;
    }



    public function update($table, $data)
    {
        $field = '';

        foreach ($data as $k => $v)
        {
            $field.= $k.'=:' . $k . ',';

        }
        $fields = rtrim($field, ',');

        $sql = "UPDATE $table SET $fields WHERE id=:id";

        $statement = $this->pdo->prepare($sql);

        $statement->execute($data);

        header("Location:/");
    }

    public function store($table, $data)
    {

        var_dump($data);
        $keys = array_keys($data);
        $stingOfKeys = implode(',', $keys);
        $placeholders = ':'. implode(',:', $keys);
        $sql = "INSERT INTO $table($stingOfKeys) VALUES ($placeholders)";
        $statement = $this->pdo->prepare($sql);

        $statement->execute($data);

        header("Location:/");
    }

    public function delete($id)
    {

        $sql = "DELETE FROM tasks  WHERE id=:id";

        $statement =$this->pdo->prepare($sql);

        $statement->execute($id);

        header("Location:/");

    }
}