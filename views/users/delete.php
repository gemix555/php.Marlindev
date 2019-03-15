<?php
require_once 'index.php';

$db = new QueryBuilder();

$db->delete($_GET);