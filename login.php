<?php
session_start();
include_once('connect.php');
?>
<link rel="stylesheet" type="text/css" href="modif.css">

<center>
    <div class="login">
        <center>
            <form action="" method="post" >
                <table>
                    <tr>
                        <td>Username</td> <td>:</td> <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td> <td>:</td> <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td><input id="tombol-log" type="submit" name="login" value="Login"></td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
</center>
<?php
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $hasil = $db->query("SELECT * from login WHERE user='$user'");
    $data = $hasil->fetch_assoc();
    $username = $data['user'];
    $password = $data['pass'];
    $name = $data['nama'];
    $type = $data['type'];
    $verify = password_verify($pass, $password);
    if ($verify) {
        if ($type == 'admin') {
            $_SESSION['name'] = $name;
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            echo "<script>location.assign('admin/sepeda.php')</script>";
        } else {
            echo "<script>window.alert('Maaf, Login Anda Salah')</script>";
        }
    } else {
            echo "<script>window.alert('Maaf, cek lagi username dan password anda')</script>";
    }
}
?>
