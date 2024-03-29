<?php
session_start();
if(isset($_SESSION['admin_username'])) {
  header("location:index.php");
}
include("koneksi.php");
$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    if ($username == '' or $password == '') {
        $err .= "<li>Silakan masukkan username dan password</li>";
    }
    if (empty($err)) {
        $sql1 = "select * from admin where username = '$username'";
        $sq1 = mysqli_query($koneksi, $sql1);
        $data = mysqli_fetch_array($sq1);
        if ($data['password'] != md5($password)) {
            $err .= "<li>Akun tidak ditemukan</li>";
        }
    }
    if (empty($err)) {
        $_SESSION['admin_username'] = $username;
        header("location:index.php");
        exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="app">
    <div class="container" style="text-align: center">
        <img src="images/logo5.png" width="200px">
    </div>

      <h1>Halaman Login</h1>
        <?php
        if ($err) {
            echo "<ul>$err</ul>";
        }
        ?>
        <form action="" method="post">
            <input type="text" value="<?php echo $username?>" name="username" class="input" placeholder="Username" /><br /><br />
            <input type="password" name="password" class="input" placeholder="Password" /><br /><br />
            <input type="submit" name="login" value="Login"/>
        </form>
    </div>
</body>

</html>
