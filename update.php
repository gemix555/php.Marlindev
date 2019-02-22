<?php
require 'class/QueryBuilder.php';

$db = new QueryBuilder();

$db->updateTask($_POST);