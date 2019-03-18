<?php

namespace App\controllers;

use League\Plates\Engine;
use App\models\QueryBuilder;

class HomeController
{

    private $builder;
    /**
     * @var Engine
     */
    private $view;

    public function __construct(QueryBuilder $builder, Engine $view)
    {

        $this->builder = $builder;
        $this->view = $view;
    }

    public  function index()
    {
        $myTasks = [
            "first task", "clean house", "do homework"
        ];
        // Render a template
        echo $this->view->render('tasks', ['tasksInView' => $myTasks]);
    }

    public  function about()
    {
        echo 'about';
    }
}