<?php

include 'config/autoload.php';

if (!isset($_SESSION['name'])) {

    header('location: login.php');
}

echo 'bem vindo ' . $_SESSION['name'];
?>

<a href="logout.php"> logout <a\>