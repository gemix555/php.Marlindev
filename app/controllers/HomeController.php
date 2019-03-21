<?php

namespace App\controllers;

use Aura\SqlQuery\QueryFactory;
use League\Plates\Engine;
use PDO;

class HomeController
{

    public $view;

    public $queryFactory;

    public $pdo;

    private function __construct(Engine $view, QueryFactory $queryFactory, PDO $pdo)
    {

        $this->view = $view;
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
    }


    public  function index()
    {

        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from('tasks');

        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);

        echo $this->view->render('show', ['tasksInView' => $result]);
    }

    public  function about()
    {
        echo 'about';
    }
}