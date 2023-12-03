<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "quanlytiemnet";
    $port=3306;
    $conn = mysqli_connect($hostname, $username, $password,$dbname,$port);

    // if ($conn->connect_error) {
    //   die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully";
?>