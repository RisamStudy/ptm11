<?php
include './config.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'GET') {
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $result = mysqli_query($conn, "SELECT FROM blog WHERE
        id='$id' LIMIT 1");
        $row = mysqli_fetch_assoc($result);
        if ($row) {
        $row['content'] = json_decode($row['content']);
        echo json_encode($row);
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Artikel tidak ditemukan"]);
    }
    } else {
    // Ambil semua artikel
        $result = mysqli_query($conn, "SELECT * FROM blog");
        $blog = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $row['content'] = json_decode($row['content']);
            $blog[] = $row;
        }
        echo json_encode($blog);
    }    
}elseif ($method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $title= $data['title'];
    $thumb = $data['thumbnail'];
    $content = json_encode($data['content']);
    $q= mysqli_query($conn, "INSERT INTO blog (title, thumbnail, content) VALUES ('$title', '$thumb', '$content')");
    if ($q) {
    echo json_encode(["message" => "Berhasil disimpan"]);
    } else {
    http_response_code(400);
    echo json_encode(["error" => "Gagal menyimpan"]);
    }
}