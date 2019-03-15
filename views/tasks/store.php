<?php

require CONTROLLER . 'QueryBuilder.php';

$db = new QueryBuilder();


    $data = $_POST;

    $db->store('tasks', $data);


