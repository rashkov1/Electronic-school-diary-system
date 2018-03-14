<?php 

$con=mysqli_connect("localhost","root","","ednevnik") or die("Neuspesen obid za povrzuvanje so serverot!");

mysqli_query($con,"INSERT INTO roditelska VALUES ('$_POST[hidden]','$_POST[textarea1]')");


?>