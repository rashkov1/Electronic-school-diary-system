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
 .button-success {
	        color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            background: rgb(28, 184, 65); /* this is a green */
        }
</style>
</head>
<body>
<div id="tabs25">
<ul>
  <li><a href="http://localhost/ednevnik/dodadiucenik.php">DODAVANJE UCENIK</a></li>
  <li><a href="http://localhost/ednevnik/izbrisiucenik.php">BRISENJE UCENIK</a></li>
  <li><a href="http://localhost/phpmyadmin/sql.php?db=ednevnik&table=promena_status&server=1&target=&token=2cde8bdddf0630b5176560148beee0ea#PMAURL-3:db_structure.php?db=ednevnik&table=&server=1&target=&token=2cde8bdddf0630b5176560148beee0ea">ADMIN PANEL</a></li>
  <li><a href="http://localhost/ednevnik/logout.php">ODJAVA</a></li>
</ul>
</div>
<br><br>

<?php 

 $con=mysqli_connect("localhost","root","","ednevnik") or die("Neuspesen obid za povrzuvanje so serverot!");
  if(isset($_POST['submit1']))
	 {
		 mysqli_query($con,"DELETE FROM dodadi_ucenik WHERE id = '$_POST[id]'");
	 }
  if(isset($_POST['submit']))
     {
	     mysqli_query($con,"INSERT INTO korisnik VALUES('','$_POST[username]','$_POST[password]','u','$_POST[email]')");
		 $id_ucenik=mysqli_query($con,"SELECT * FROM korisnik WHERE user='$_POST[username]' AND password='$_POST[password]'");
		 $id=mysqli_fetch_array($id_ucenik);
		 $ucenik=$id['id'];
		 mysqli_query($con,"INSERT INTO podatoci VALUES('','$ucenik','$_POST[ime]','$_POST[prezime]','$_POST[datum_raganje]','$_POST[mesto]','1')");
		 mysqli_query($con,"INSERT INTO oceni VALUES('','$ucenik','0','0','0','0','0','0','0','0','0','0','0')");
		 mysqli_query($con,"INSERT INTO povedenie VALUES('','$ucenik','0','0','0','p')");
		 mysqli_query($con,"DELETE FROM dodadi_ucenik WHERE id = '$_POST[id]'");
	  
     }
 
 echo "<strong>LISTA NA BARANJA ZA DODAVANJE NA UCENICI</strong><br><br>";
 $podatok_ucenik=mysqli_query($con,"SELECT * FROM dodadi_ucenik");
 echo "<table id='customers'><tr>
        <th>Ime Prezime</th>
		<th>Datum na raganje</th>
		<th>Mesto</th>
		<th>Email</th>
		<th>Zabeleska</th>
		<th>Potvrdi</th></tr><tr>";
 while($nov=mysqli_fetch_array($podatok_ucenik))
 {
	 echo "<form action='dodadiucenik.php' method='POST'>";
	 echo "<td>". $nov['ime'] . " " . $nov['prezime'] ."</td>";
	 echo "<td>". $nov['datum_raganje'] ."</td>";
	 echo "<td>". $nov['mesto'] ."</td>";
	 echo "<td>". $nov['email'] ."</td>";
	 echo "<td>". $nov['zabeleska'] ."</td>";
	 echo "<td><input type=submit name=submit class=button-success value=POTVRDI "."<br>
	 <input type=submit name=submit1 class=button-success value=ODBI "."</td>";
	 echo "<td><input type=hidden name=ime value=".$nov['ime']  ."></td>";
	 echo "<td><input type=hidden name=prezime value=". $nov['prezime']  ."></td>";
	 echo "<td><input type=hidden name=datum_raganje value=". $nov['datum_raganje']  ."></td>";
	 echo "<td><input type=hidden name=email value=". $nov['email']  ."></td>";
	 echo "<td><input type=hidden name=mesto value=".$nov['mesto'] ."></td>";
	 echo "<td><input type=hidden name=username value=".$nov['korisnicko_ime'] ."></td>";
	 echo "<td><input type=hidden name=password value=".$nov['lozinka'] ."></td>";
	 echo "<td><input type=hidden name=id value=".$nov['id'] ."></td>";
	 
	 echo "</tr></form>";
	 
 }
echo "</table>";






?>
</body>
</html>