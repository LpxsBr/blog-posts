<?php

include 'config/autoload.php';

if (isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['conf_password'])) {
    
    $user_name = $_POST['username'] != "" ? $_POST['username'] : null;
    $user_email =  $_POST['email'] != "" ? $_POST['email'] : null;
    $user_password =  $_POST['password'] == $_POST['conf_password'] ? $_POST['password'] : null;

    if (!cadUser($con, $user_name, $user_email, $user_password)) {
        echo 'error, please, verify your informatiions';
    } else {
        header('location: login.php');
    }
}
// require_once 'database.php';

?>

<form class="container" method="POST" action="#">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="insert your username">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="insert your email">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="insert your password">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="conf_password" placeholder="insert your password">
    </div>
    <div class="mb-3">
        <button type="submit" class="form-control btn btn-primary"> Cadastrate </button>
    </div>
</form>