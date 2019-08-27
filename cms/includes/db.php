<?php

// --The recommended way of connecting to the db -using a loop to transform the connection
//parameters into constants
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

foreach ($db as $key => $value) {

    define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//if ($connection) {
//    echo "Connection is up and ready to go.";
//} else {
//    echo "Connection failed.";
//}


// --A more dynamic way of connection
//$db_host = 'localhost';
//$db_user = 'root';
//$db_pass = '';
//$db_db = 'cms';
//$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_db);
//if ($connection) {
//    echo "We have contact";
//} else {
//    'Connection failed miserably';
//}


// --Easiest way of connecting to the db
//$connection = mysqli_connect('localhost', 'root', '', 'cms');
//
//if($connection) {
//    echo "Connection established.";
//}