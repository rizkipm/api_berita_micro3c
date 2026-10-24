<?php

$host = "db"; //ini akan disesuaikan dengan nama service yang ada di docker-compose.yml
$user = "root";
$pass = "secretpassword";
$db_nama="db_berita";


try {
    $conn = new PDO("mysql:host=$host;dbname=$db_nama", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
