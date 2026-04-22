<?php

session_start();
include 'database.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user'];

$stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
<title>Hapus Akun</title>
<style>
body {
    font-family: Arial;
    text-align: center;
    background: #ffdddd;
}
.container {
    margin-top: 100px;
}
</style>
</head>
<body>

<div class="container">
<h2>Akun berhasil dihapus</h2>
<a href="register.php">Buat akun baru</a>
</div>

</body>
</html>