<?php

require 'class/QueryBuilder.php';

$db = new QueryBuilder();
var_dump($_POST);
$db->addTask($_POST);
