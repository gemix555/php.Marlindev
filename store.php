<?php

require 'class/QueryBuilder.php';

$db = new QueryBuilder();

//$data = [
//  'name' => 'ivan',
//  'text' => 'durak',
//  'image' => 'cat.png'
//];

    $data = $_POST;

    $db->store('tasks', $data);


