<?php
session_start();
unset($_SESSION['managerId'], $_SESSION['managerPw']);
header("location:managerLogin.php");
?>