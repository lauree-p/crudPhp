<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "model/user.php";
include_once "model/userDAO.php";
include_once "util/database.php";
include_once "controller/UserController.php";

new UserController;

?>