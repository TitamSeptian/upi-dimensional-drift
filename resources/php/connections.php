<?php
function connectMySQL()
{
    $PORT = '3306'; // default 3306
    $DATABASE_HOST = 'localhost:' . $PORT;
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'db_pweb';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        print_r($exception);
        exit('Failed to connect to database!');
    }
}

function mysqlCon()
{
    $host        = "localhost:3306";
    $username    = "root";
    $password    = "";
    $db          = "db_pweb";

    $mysqli     = new mysqli($host, $username, $password, $db);
    if (mysqli_connect_errno()) {
        die();
    }

    return $mysqli;
}
