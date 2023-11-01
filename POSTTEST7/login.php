<?php
session_start();
require "function.php";

if (isset($_POST["submit"])) {
    $username = htmlspecialchars(strtolower($_POST["username"]));
    $password = $_POST["password"];

    $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE `username` = '$username'");
    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);
        if ($row["username"] == "admin") {
            if (password_verify($password, $row["password"])) {
                $nama = strtoupper($row["username"]);
                $_SESSION["login"] = true;
                $_SESSION["type"] = "admin";
                echo "
                <script>
                alert('Hai, Selamat Datang $nama !');
                document.location.href='index.php';
                </script>";
            } else {
                echo "
                <script>
                alert('Password Anda Salah!');
                document.location.href='login.php';
                </script>";
            }
        } else {
            if (password_verify($password, $row["password"])) {
                $nama = strtoupper($row["username"]);
                $_SESSION["login"] = true;
                $_SESSION["type"] = "user";
                echo "
                <script>
                alert('Hai, Selamat Datang $nama !');
                document.location.href='index.php';
                </script>";
            } else {
                echo "
                <script>
                alert('Password Anda Salah!');
                document.location.href='login.php';
                </script>";
            }
        }
    } else {
        echo "
        <script>
        alert('Username Anda Salah!');
        document.location.href='login.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>

<body>
    <section>
        <div class="container">
            <h1>Login</h1>
            <form action="" method="post">
                <div class="row">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autofocus>
                </div>
                <div class="row">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autofocus>
                </div>
                <div class="row">
                    <button type="submit" name="submit">Login</button>
                </div>
            </form>
        </div>

        <a href="register.php">Belum Punya Akun?</a>
    </section>
</body>

</html>