<?php
include './config.php';

if (
    !isset($_POST['id'], $_POST['title'], $_POST['thumbnail'], $_POST['content']) ||
    !is_numeric($_POST['id']) ||
    !is_array($_POST['content'])
) {
    die("Data tidak lengkap atau tidak valid.");
}

$id = (int) $_POST['id'];
$title = $_POST['title'];
$thumbnail = $_POST['thumbnail'];
$content = json_encode($_POST['content']);

$sql = "UPDATE blog SET title = ?, thumbnail = ?, content = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssi", $title, $thumbnail, $content, $id);
mysqli_stmt_execute($stmt);

header("Location: list.php");
exit;
?>
