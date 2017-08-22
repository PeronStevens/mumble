<?php

    $message = $_POST['message'];
    $f = fopen("log.txt", "a");    
    // if (!file_exists("log.txt")){
    //     $f = fopen("log.txt", "w");
    // } else {
    //     $f = fopen("log.txt", "a");
    // }
    // fwrite($f, $message);
    // fclose($f);

    echo 1;
    ?>