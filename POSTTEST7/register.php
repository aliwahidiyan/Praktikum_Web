<?php
require "function.php";
$errorUsername = false;
if (isset($_POST["submit"])) {
    $username = htmlspecialchars(strtolower($_POST["username"]));
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    if ($username === "admin") {
        echo "
        <script>
        alert('Dilarang Menggunakan username admin!');
        document.location.href='register.php';
        </script>";
    } else if ($password != $cpassword) {
        echo "
        <script>
        alert('Password dan konfirmasi password tidak sesuai!');
        document.location.href='register.php';
        </script>";
    } else if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'")) == 1) {
        echo "
        <script>
        alert('Username Sudah Ada !');
        document.location.href='register.php';
        </script>";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = mysqli_query($conn, "INSERT INTO pengguna VALUES (NULL, '$username', '$password', 'user')");
        if ($query) {
            echo "
            <script>
            alert('Berhasil register!');
            document.location.href='login.php';
            </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>

<body>
    <section>
        <div class="container">
            <h1>Register</h1>
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
                    <label for="cpassword">Konfirmasi Password</label>
                    <input type="password" name="cpassword" id="cpassword" autofocus>
                </div>
                <div class="row">
                    <button type="submit" name="submit">Register</button>
                </div>
            </form>
        </div>

        <a href="login.php">Kembali</a>
    </section>
</body>

</html>