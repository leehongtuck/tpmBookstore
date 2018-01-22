<?php
session_start();
require_once 'conn.php';

if(isset($_SESSION['userId'],$_SESSION['userPw'])){
    $sql="SELECT * FROM member WHERE memberId='$_SESSION[userId]'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_row($result);
    $dbPassword=$row['memberPw'];

    if(password_verify($_SESSION['userPw'], $dbPassword)){
        
    }
    else{
        unset($_SESSION['userId'],$_SESSION['userPw']);
    }
}