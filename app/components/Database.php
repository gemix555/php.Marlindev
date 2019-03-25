<?php


namespace App\components;


use Aura\SqlQuery\QueryFactory;
use PDO;

class Database
{

    /**
     * @var QueryFactory
     */
    public $queryFactory;
    /**
     * @var PDO
     */
    public $pdo;

    public  function  __construct(QueryFactory $queryFactory, PDO $pdo)
    {

        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
    }

    public function all($table)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from($table);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($table, $id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from($table)
            ->where('id=:id')
            ->bindValues(['id'  =>  $id]);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function store($table, $date)
    {
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)
            ->cols($date);
        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());
    }

    public function update($table, $id, $data)
    {
        $update = $this->queryFactory->newUpdate();
        $update
            ->table($table)
            ->cols($data)
            ->where('id=:id')
            ->bindValues(['id' => $id]);
        // prepare the statement
        $sth = $this->pdo->prepare($update->getStatement());

        // execute with bound values
        $sth->execute($update->getBindValues());
    }

    public function remove($table, $id)
    {
        $delete = $this->queryFactory->newDelete();
        $delete
            ->from($table)
            ->where('id=:id')
            ->bindValues(['id' => $id]);
        $sth = $this->pdo->prepare($delete->getStatement());

        // execute with bound values
        $sth->execute($delete->getBindValues());
    }
}