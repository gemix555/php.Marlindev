<?php
require 'class/QueryBuilder.php';

$db = new QueryBuilder();

$db->delete($_GET);