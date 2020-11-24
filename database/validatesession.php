<?php
session_start();
$hasAccess = false;

if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    $user = $_SESSION["username"];
    $pass = $_SESSION["password"];

    $hasAccess = $dataAccess->validateLogin($user, $pass);
} else {
    $hasAccess = false;
}
