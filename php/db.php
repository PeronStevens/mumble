<?php

$dbopts = parse_url(getenv('DATABASE_URL'));

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
       echo "Connected to the <strong>$db</strong> database successfully!";
   }
}catch (PDOException $e){
   // report error message
   echo $e->getMessage();
}

// $stmt = $conn->prepare("CREATE TABLE comments (
//         id serial,
//         comment text
//     );");

// $stmt->execute();


// $stmt = $conn->prepare("INSERT INTO comments (comment) VALUES ('gmrtgtg') ");

$stmt->execute();

$stmt = $conn->prepare("SELECT * FROM test_table");

print_r($stmt->execute());
?>