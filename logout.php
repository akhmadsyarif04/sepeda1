<?php

session_start();
unset($_SESSION['user']);
unset($_SESSION['pass']);
unset($_SESSION['name']);

session_destroy();
header('location: login.php');
?>
