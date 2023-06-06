<?php

    $localhost = 'localhost';
    $root = 'root';
    $password = '';
    $db_name = 'db_eira';

    $conn = mysqli_connect($localhost, $root, $password, $db_name);

    if (!$conn) {
        echo 'Failed to connect Database!';
    } else {
        // echo 'Successfully connected Database!';
    }

?>
