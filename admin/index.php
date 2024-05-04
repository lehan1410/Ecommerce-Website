<?php
session_start();
ob_start();
require_once "./mvc/bridge.php";
$app = new app();