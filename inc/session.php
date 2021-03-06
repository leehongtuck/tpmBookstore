<?php
session_start();
require_once "conn.php";

$member = array();
$manager = array();

/*set member session*/
if(isset($_SESSION['memberId'],$_SESSION['memberPw'])){
    $sql="SELECT * FROM member WHERE memberId='$_SESSION[memberId]'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    $dbPassword=$row['memberPw'];
    

    if(password_verify($_SESSION['memberPw'], $dbPassword)){
        $member['id'] = $row['memberId'];
        $member['name'] = $row['memberName'];
        $member['email'] = $row['memberEmail'];
        $member['address']= $row['memberAddress'];
        $member['phone'] = $row['memberPhone'];
        $member['creditCard'] = $row['memberCreditCard'];
        $member['point'] = $row['memberPoint'];
    }
    else{
        unset($_SESSION['memberId'],$_SESSION['memberPw']);
        $member = null;
    }
}
else{
    $member = null;
}


/* set admin session*/
if(isset($_SESSION['managerId'], $_SESSION['managerPw'])){
    $sql="SELECT * FROM manager WHERE managerId = '$_SESSION[managerId]'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $dbPassword=$row['managerPw'];

    if(password_verify($_SESSION['managerPw'], $dbPassword)){
        $manager['id'] = $row['managerId'];
        $manager['name'] = $row['managerName'];
    }
    else{
        unset($_SESSION['managerId'],$_SESSION['managerPw']);
        $manager = null;
    }

}
else{
    $manager = null;
}