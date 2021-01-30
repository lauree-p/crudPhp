<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "model/user.php";
include_once "model/userDAO.php";
include_once "util/database.php";

if (!empty($_GET["id"])) {
    $user = UserDAO::findByID($_GET["id"]);
} else {
    $user = new User();
}

switch(@$_GET["action"]) {
    case "edit":
        if(!empty($_POST)) {
            $user->setParametersFromArray($_POST);
            var_dump($user);
            if ($user->isValid()) {
                if (!empty($user->getId())) {
                    UserDAO::update($user);
                } else {
                    UserDAO::create($user);
                }
                include_once "view/list.php";
            } else {
                include_once "view/edit.php";
            }
        } else {
            include_once "view/edit.php";
        }
    break;
   
    case "delete":
        if(!empty($user->getId())) {
            UserDAO::delete($user);
        }
        include_once "view/list.php";
    break;

    case "read":
        if(!empty($user->getId())) {
            include_once "view/read.php";
        } else {
            include_once "view/list.php";
        }
    break;

    default:
        include_once "view/list.php";
}

?>