<?php

// include("db.php");
require('db.php');
$comment = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO comments (comment) VALUES (?)");
$stmt->execute([$comment]);

// $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

// print_r($res);
?>