<?php

$host    = "127.0.0.1";
$port    = "5432";
$db      = "test";
$username = 'postgres';
$password = 'password';
$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";

try{
   // create a PostgreSQL database connection
   $conn = new PDO($dsn);

   // display a message if connected to the PostgreSQL successfully
//    if($conn){
//        echo "Connected to the <strong>$db</strong> database successfully!";
//    }
}catch (PDOException $e){
   // report error message
   echo $e->getMessage();
}

?>