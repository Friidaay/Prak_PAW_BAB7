<?php

session_start();
include 'database.php';
$message = "";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "Login gagal!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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
    background: #2196F3;
    color: white;
    border: none;
}
.msg {
    color: red;
}
</style>
</head>
<body>

<div class="container">
<h2>Login</h2>
<p class="msg"><?= $message ?></p>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="login">Login</button>
</form>

<a href="register.php">Belum punya akun? Daftar</a>
</div>

</body>
</html>