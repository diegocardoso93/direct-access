<?php
require_once "bootstrap.php";

use App\api;

$api = new Api($entityManager);
$api->fetch();