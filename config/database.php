<?php

// connection from database
function newCon($db = 'blog')
{
    $VENV = parse_ini_file('.env');

    $host = $VENV['DBHOST'];
    $port = $VENV['DBPORT'];

    $username = $VENV['DBUSER'];
    $password = $VENV['DBPASS'];

    $dsn = $host . ':' . $port;

    $con = new mysqli($dsn, $username, $password, $db);

    if ($con->connect_error) {
        die('erro de conexão com o banco de dados' . $con->connect_error);
    }

    echo '<br> conectado com sucesso, ' . $_SESSION['name'] . '<br>';
    return $con;
}

// create the databse and some tables
function createdb($con)
{
    $create = 'CREATE DATABASE IF NOT EXISTS blog';

    $con->query($create);

    // table user
    $userstb = "CREATE TABLE IF NOT EXISTS blog.users(
        id INT AUTO_INCREMENT,
        username VARCHAR(20) NOT NULL,
        email VARCHAR(50) NOT NULL,
        user_pass VARCHAR(255) NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(id))";

    $con->query($userstb);

    //  table blog
    $blogtb = "CREATE TABLE IF NOT EXISTS blog.posts(
        post_id INT AUTO_INCREMENT,
        user_id INT NOT NULL,
        title VARCHAR(20) NOT NULL,
        content VARCHAR(255) NOT NULL,
        font VARCHAR(50) NOT NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(post_id)
    )";

    $con->query($blogtb);

    $con->close();
}

// here will to be the query for cadastrate users
function cadUser()
{
}
