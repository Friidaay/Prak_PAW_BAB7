<?php

include 'database.php';
$message = "";

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if($stmt->execute()){
        $message = "Registrasi berhasil!";
    } else {
        $message = "Registrasi gagal!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
body {
    font-family: Arial;
    background: linear-gradient(135deg,#74ebd5,#ACB6E5);
}
.container {
    width: 300px;
    margin: 100px auto;
    padding: 20px;
    background: white;
    border-radius: 10px;
    text-align: center;
}
input, button {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
}
button {
    background: #4CAF50;
    color: white;
    border: none;
}
.msg {
    color: green;
}
</style>
</head>
<body>

<div class="container">
<h2>Register</h2>
<p class="msg"><?= $message ?></p>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="register">Daftar</button>
</form>

<a href="login.php">Sudah punya akun? Login</a>
</div>

</body>
</html>