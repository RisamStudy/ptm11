<?php
include './config.php';
$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;
if (!$id) {
http_response_code(400);
echo json_encode(["error" => "ID dibutuhkan"]);
exit;
}
if ($method === 'PUT') {
$data = json_decode(file_get_contents("php://input"),
true);
$title = $data['title'];
$thumb= $data['thumbnail'];
$content = json_encode($data['content']);
$q= mysqli_query($conn, "UPDATE blog SET
title='$title', thumbnail='$thumb', content='$content'
WHERE id=$id");
echo json_encode(["message" => "Berhasil diperbarui"]);
}
elseif ($method === 'DELETE') {
mysqli_query($conn, "DELETE FROM blog WHERE id=$id");
echo json_encode(["message" => "Berhasil dihapus"]);
}