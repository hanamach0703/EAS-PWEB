<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('location:index.php'); exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>p-web</title>
</head>
<body>
    <h1>BERHASIL!</h1><br>
    <a href="index.php">Log Out</a>
</body>
</html>