<?php

include 'auth.php';
require_once 'database.php';

$con = newCon(null);
createdb($con);