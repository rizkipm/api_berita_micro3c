<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("content-type: application/json; charset=UTF-8");

$host = "db"; //ini akan disesuaikan dengan nama service yang ada di docker-compose.yml
$user = "root";
$pass = "secretpassword";
$db_nama="db_berita";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_nama", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //mengambil semua data dari tabel berita
    $stmt = $conn->prepare("SELECT * FROM tb_berita");
    $stmt->execute();
    $berita = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "code" => 200,
        "data" => $berita,
        "message" => "Berita berhasil diambil"
    ], JSON_PRETTY_PRINT);

} catch(PDOException $e) {
    echo json_encode([
        "status" => "error",
        "code" => 500,
        "message" => "Connection failed: " . $e->getMessage()
    ], JSON_PRETTY_PRINT);
    http_response_code(500);
}