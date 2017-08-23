<?php

    require('db.php');

    $stmt = $conn->prepare("SELECT comment FROM comments");
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    print_r(json_encode($res));  
?>