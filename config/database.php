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

// here will to be the query for cadastrate users
function cadUser($con, $name, $email, $password)
{
    // $sql = "INSERT INTO users(username, email, user_pass) VALUES(username, email, pass);";
    $stmt = $con->prepare("INSERT INTO blog.users(username, email, user_pass) VALUES (?, ?, ?)");
    // $stmt = $con->prepare($sql);
    try {
        //code...
        $stmt->bind_param('sss', $name, $email, $password);
        $stmt->execute();
        return $name;
        return $email;
        return $password;
    } catch (mysqli_sql_exception $e) {
        echo 'erro ao cadastrar: '.$e->getMessage();
    }
    
    header('Location: ../login.php');
}

function accessUserInfor($con){
    
$query = "SELECT username, email, user_pass FROM blog.users";

if ($stmt = mysqli_prepare($con, $query)) {

    /* execute statement */
    mysqli_stmt_execute($stmt);

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $name, $email, $password);

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {     
    }
}

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

    // $con->close();
}
