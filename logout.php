<?php
session_start();
unset($_SESSION['memberId'], $_SESSION['memberPw']);
header("location:index.php");
?>