<?php

// include("db.php");
require('db.php');
$comment = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

$username = $_COOKIE['username'];

$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
$user_id = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmt = $conn->prepare("INSERT INTO comments (user_id, comment) VALUES (?,?)");
$stmt->execute([$user_id[0]['id'] ,$comment]);

// $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>