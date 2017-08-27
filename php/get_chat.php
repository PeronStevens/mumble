<?php

    require('db.php');

    $stmt = $conn->prepare("SELECT 
                                comments.id, username, comment 
                            FROM 
                                comments
                            JOIN
                                users
                            ON
                                comments.user_id = users.id 
                            ORDER BY 
                                comments.id 
                            DESC");
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    print_r(json_encode($res));  
    // print_r($res);
?>