<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

li {
    float: left;
}

a:link, a:visited {
    display: block;
    width: 120px;
    font-weight: bold;
    color: #FFFFFF;
    background-color: #297ACC;
    text-align: center;
    padding: 4px;
    text-decoration: none;
    text-transform: uppercase;
}

a:hover, a:active {
    background-color: #5CADFF;
}
#tabs25{position:relative;display:block;height:42px;font-size:11px;font-weight:bold;background:transparent url(images/blueslate_background.gif) repeat-x top left;font-family:Arial,Verdana,Helvitica,sans-serif;text-transform:uppercase;}
#tabs25 ul{margin:0px;padding:0;list-style-type:none;width:auto;}
#tabs25 ul li{display:block;float:left;margin:0 1px 0 0;}
#tabs25 ul li a{display:block;float:left;color:#D5F1FF;text-decoration:none;padding:14px 22px 0 22px;height:28px;}
#tabs25 ul li a:hover,#tabs25 ul li a.current{color:#B8DBFF;background:transparent url(images/blueslate_backgroundOVER.gif) no-repeat top center;}
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 100%;
    border-collapse: collapse;
}

#customers td, #customers th {
    font-size: 1em;
    border: 1px solid #98bf21;
    padding: 3px 7px 2px 7px;
}

#customers th {
    font-size: 1.1em;
    text-align: left;
    padding-top: 5px;
    padding-bottom: 4px;
    background-color: #A7C942;
    color: #ffffff;
}

#customers tr.alt td {
    color: #000000;
    background-color: #EAF2D3;
}
</style>
</head>
<body>
<div id="tabs25"> 
<ul>
  <li><a href="http://localhost/ednevnik/pocetnaucenik.php">LICNI PODATOCI</a></li>
  <li><a href="http://localhost/ednevnik/oceniucenik.php">OCENI</a></li>
  <li><a href="http://localhost/ednevnik/povedenie.php">POVEDENIE</a></li>
  <li><a href="http://localhost/ednevnik/Eroditelskaucenik.php">ERODITELSKA</a></li>
  <li><a href="http://localhost/ednevnik/logout.php">ODJAVA</a></li>
</ul>


<img src=question-mark.png width="70"  height="70"align="right" onclick="myFunction()" alt="Pomos">
<script>
function myFunction() {
    alert("Vo delot Pocedenie moze da gi vidite informaciite za ucenikot, negovite izostanoci (Opravdani/Neopravdani), vkupniot broj na izostanoci i statusot na negovoto povedenie (Primerno, Zadovolitelno, Nezadovolitelno).");
}
</script>



</div>
<?php 
  $con=mysqli_connect("localhost","root","","ednevnik") or die("Neuspesen obid za povrzuvanje so serverot!");
  $sql=mysqli_query($con,"SELECT * FROM user123 ");
  $licni_podatoci=mysqli_fetch_array($sql);
  $povedenie=mysqli_query($con,"SELECT * FROM moepovedenie ");
  $moe_povedenie=mysqli_fetch_array($povedenie);
  	 if($moe_povedenie['povedenie']=="p")
	 {
		 $rezultat_povedenie="Primerno";
	 }
	 elseif($moe_povedenie['povedenie']=="z")
	 {
		 $rezultat_povedenie="Zadovolitelno";
	 }
	 elseif($moe_povedenie['povedenie']=="n")
	 {
		 $rezultat_povedenie="Nezadovolitelno";
	 } 
   echo
   "<br><br><br>
   <table id='customers'><tr>
   <th>Ucenik</th>
   <th>Opravdani</th>
   <th>Neopravdani</th>
   <th>Vkupno</th>
   <th>Povedenie</th>
   </tr class='alt'>";
   echo "<tr>";
   echo "<td>";
   echo $licni_podatoci['ime']." ".$licni_podatoci['prezime'];
   echo "<br>";
   echo $licni_podatoci['datum_raganje']."<br>";
   echo $licni_podatoci['mesto'];
   echo "</td><td>";
   echo $moe_povedenie['opravdani'];
   echo "</td><td>";
   echo $moe_povedenie['neopravdani'];
   echo "</td><td>";
   echo $moe_povedenie['vkupno'];
   echo "</td><td>";
   echo $rezultat_povedenie;
   echo "</td></tr></table>";
?>

</body>
</html>