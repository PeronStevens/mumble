<?php

$dbopts = parse_url(getenv('DATABASE_URL'));

$host    = "ec2-23-21-197-231.compute-1.amazonaws.com";
$port    = "5432";
$db      = "/d10vdtvjln4nv0";
$username = 'ueibvbhyvqjukc';
$password = 'password';
$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";

try{
   // create a PostgreSQL database connection
   $conn = new PDO($dsn);

   // display a message if connected to the PostgreSQL successfully
   if($conn){
       echo "Connected to the <strong>$db</strong> database successfully!";
   }
}catch (PDOException $e){
   // report error message
   echo $e->getMessage();
}


?>