
<?php
include 'loginpage.php';
session_destroy();
header('location: http://localhost/ednevnik/proba.html');
mysqli_query($con,"DROP VIEW user");
mysqli_query($con,"DROP VIEW user123");
mysqli_query($con,"DROP VIEW uspeh");
mysqli_query($con,"DROP VIEW moepovedenie");
mysqli_query($con,"DROP VIEW nedelabr");
?>