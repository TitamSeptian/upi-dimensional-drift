<?php
function connectMySQL()
{
    $PORT = '3306'; // default 3306
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'upi_dimensional_drift';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        print_r($exception);
        exit('Failed to connect to database!');
    }
}

function connectMySQL2()
{
    $PORT = '4000'; // default 3306
    $DATABASE_HOST = 'localhost:' . $PORT;
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '123qwe123';
    $DATABASE_NAME = 'upi_dimensional_drift';
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
    $password    = "123qwe123";
    $db          = "upi_dimensional_drift";

    $mysqli     = new mysqli($host, $username, $password, $db);
    if (mysqli_connect_errno()) {
        die();
    }

    return $mysqli;
}
