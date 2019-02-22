<?php
require 'class/QueryBuilder.php';

$db = new QueryBuilder();

$db->deleteTask($_GET);