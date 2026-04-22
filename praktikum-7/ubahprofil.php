<?php

session_start();
include 'database.php';
$message = "";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

if(isset($_POST['update'])){
    $newUsername = $_POST['username'];
    $id = $_SESSION['user'];

    $stmt = $conn->prepare("UPDATE users SET username = :username WHERE id = :id");
    $stmt->bindParam(':username', $newUsername);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        $message = "Profil berhasil diubah!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Ubah Profil</title>
<style>
body { font-family: Arial; background: #eee; }
.container {
    width: 300px;
    margin: 100px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
}
input, button {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
}
button {
    background: orange;
    border: none;
}
</style>
</head>
<body>

<div class="container">
<h2>Edit Profil</h2>
<p><?= $message ?></p>

<form method="POST">
    <input type="text" name="username" placeholder="Username baru" required>
    <button name="update">Update</button>
</form>

<a href="dashboard.php">Kembali</a>
</div>

</body>
</html>