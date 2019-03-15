<?php
require CONTROLLER .'QueryBuilder.php';

$db = new QueryBuilder();

$db->delete($_GET);