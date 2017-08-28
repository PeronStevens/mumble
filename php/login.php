<?php
    include('db.php');

    $c_value = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $c_name = 'username';
    
    
    
    setcookie($c_name, $c_value, time() + (86400 * 30));

    $stmt = $conn->prepare("INSERT INTO users (username) VALUES (?);");

    $stmt->execute([$c_value]);

?>  