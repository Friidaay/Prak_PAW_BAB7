<?php

session_start();
session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
<style>
body {
    font-family: Arial;
    text-align: center;
}
</style>
</head>
<body>

<h2>Anda berhasil logout</h2>
<a href="login.php">Login kembali</a>

</body>
</html>