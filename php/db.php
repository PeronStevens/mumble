<?php

$dbopts = parse_url(getenv('DATABASE_URL'));

// $host = '127.0.0.1';
// $db   = 'test';
// $username = 'Admin';
// $password = '';

$host    = "ec2-23-21-197-231.compute-1.amazonaws.com";
$port    = "5432";
$db      = "d10vdtvjln4nv0";
$username = 'ueibvbhyvqjukc';
$password = '0d180152f6839e0133a451ec791424a6a1e87a5ef6b761248e9844678f046e6e';
$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";

try{
   // create a PostgreSQL database connection
   $conn = new PDO($dsn);

   // display a message if connected to the PostgreSQL successfully
   if($conn){
    //    echo "Connected to the <strong>$db</strong> database successfully!";
   }
}catch (PDOException $e){
   // report error message
   echo $e->getMessage();
}

$stmt = $conn->prepare("CREATE TABLE IF NOT EXISTS comments (
    id serial,
    user_id int,
    comment text
);");

$stmt->execute();

$stmt = $conn->prepare("CREATE TABLE IF NOT EXISTS users (
    id serial,
    username text
);");

$stmt->execute();
?>