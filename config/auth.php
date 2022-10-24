<?php
session_start();

// users demo to tests
$usuarios = [
    [
        'name' => 'Anselmo Lopes',
        'email' => 'anselmo',
        'senha' => '12345'
    ],
    [
        'name' => 'Adminzin',
        'email' => 'admin',
        'senha' => '12345'
    ],
];

# login validation basic



if (isset($_GET['name']) and isset($_GET['pass'])) {
    $name = $_GET['name'];
    $pass = $_GET['pass'];
    foreach ($usuarios as $user) {
        $userValide = $name === $email;
        $passValide = $pass === $user_pass;
        if ($userValide && $passValide) {
            $_SESSION['error'] = null;
            $_SESSION['name'] = $user['name'];
            header('location: ../principal.php');
        }
    }
}

if (!isset($_SESSION['name'])) {
    header('location: ../login.php');
}
