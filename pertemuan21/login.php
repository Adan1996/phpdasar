<?php
session_start();
require 'fungsi.php';

if (isset($_COOKIE['idUser']) && isset($_COOKIE['username'])) {
    $id = $_COOKIE['idUser'];
    $key = $_COOKIE['username'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE idUser = $id");
    $row = mysqli_fetch_assoc($result);

    if ($key = hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if ( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if ( mysqli_num_rows($result) === 1 ) {

        $row = mysqli_fetch_assoc($result);

        if ( password_verify($password, $row["password"]) ) {
            header("Location: index.php");

            // cek cookie
            if (isset($_POST['remember'])) {
                setcookie('id', $row['idUser'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            $_SESSION["login"] = true;
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
</head>
<body>
    
    <h3>Halaman Login</h3>

    <?php if ( isset($error) ) : ?>
        <p style="color: red; font-style: italic;">username/password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username: </label>
                <input type="text" name="username" required>
            </li>
            <li>
                <label for="password">Password: </label>
                <input type="password" name="password" required>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="rMe">Remember Me</label>
            </li>
        </ul>
    </form>

    <a href="registrasi.php">daftar disini</a>

</body>
</html>