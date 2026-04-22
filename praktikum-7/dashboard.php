<?php

session_start();
include 'database.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
body {
    font-family: Arial;
    background: #f4f4f4;
    text-align: center;
}
.container {
    margin-top: 100px;
}
a {
    display: block;
    margin: 10px;
    padding: 10px;
    background: #333;
    color: white;
    text-decoration: none;
    width: 200px;
    margin-left: auto;
    margin-right: auto;
}
</style>
</head>
<body>

<div class="container">
<h2>Dashboard</h2>

<a href="ubahprofil.php">Ubah Profil</a>
<a href="hapusakun.php">Hapus Akun</a>
<a href="logout.php">Logout</a>

</div>

</body>
</html>