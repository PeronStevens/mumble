<?php

    $c_value = $_POST['username'];

    $c_name = 'username';
    
    setcookie($c_name, $c_value, time() + (86400 * 30));

?>  