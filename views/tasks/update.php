<?php
require CONTROLLER . 'QueryBuilder.php';

$db = new QueryBuilder();

$table = 'tasks';
$data =$_POST;
$db->update($table, $data);
//$db->updateTask( $_POST);