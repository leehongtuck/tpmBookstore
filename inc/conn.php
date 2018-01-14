<?php
session_start();
define("SERVERNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "test");
// Create connection
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>