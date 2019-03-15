<?php
namespace App {

    use PDO;

    class QueryBuilder
    {

        public $pdo;

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

            $keys = array_keys($data);
            $stingOfKeys = implode(',', $keys);
            $placeholders = ':'. implode(',:', $keys);
            if($data['file'])
            {
                $this->uploadImage($data['file']);
            }
            $sql = "INSERT INTO $table($stingOfKeys) VALUES ($placeholders)";
            $statement = $this->pdo->prepare($sql);

            $statement->execute($data);

            header("Location:/");
        }

        public function delete($table,$id)
        {

            $sql = "DELETE FROM $table  WHERE id=:id";

            $statement =$this->pdo->prepare($sql);

            $statement->execute($id);

            header("Location:/");

        }

        function getUser($email)
        {

            $sql = "SELECT * FROM users WHERE email=:email";
            $statement =$this->pdo->prepare($sql);

            $statement->bindParam(":email", $email);

            $statement->execute();
            $result = $statement->fetch(2);
            return $result;
        }

        public function selectUser($email,$password)
        {
            $sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1";

            $statement = $this->pdo->prepare($sql);

            $password = md5($password);

            $statement->bindParam(":email", $email);

            $statement->bindParam(":password", $password);

            $statement->execute();
            $user = $statement->fetch(2);

            return $user;

        }

        public function uploadImage($file)
        {

        }

    }
}