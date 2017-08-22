<?php

    $message = $_POST['message'];
    $f = fopen("log.txt", "a");    
    if (!file_exists("log.txt")){
        $f = fopen("log.txt", "w");
    } else {
        $f = fopen("log.txt", "a");
    }
    fwrite($f, $message);
    $data = fread($f, filesize("log.txt"));
    fclose($f);
    echo $data;
    ?>