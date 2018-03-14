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
	table-layout: fixed;
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
.mytext {
    width: 50px;
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
  <li><a href="http://localhost/ednevnik/pocetnaprofesor.php">LICNI PODATOCI</a></li>
  <li><a href="http://localhost/ednevnik/vnesioceni.php">VNESI OCENI</a></li>
  <li><a href="http://localhost/ednevnik/vnesiizostanoci.php">VNESI IZOSTANOCI</a></li>
  <li><a href="http://localhost/ednevnik/dodadi.php">DODADI UCENIK</a></li>
  <li><a href="http://localhost/ednevnik/izbrisi.php">IZBRISI UCENIK</a></li>
  <li><a href="http://localhost/ednevnik/Eroditelska.php">ERODITELSKA</a></li>
  <li><a href="http://localhost/ednevnik/logout.php">ODJAVA</a></li>
</ul>
</div>

<img src=question-mark.png width="70"  height="70"align="right" onclick="myFunction()" alt="Pomos">
<script>
function myFunction() {
    alert("Za da vnesete izostanoci treba da go izberete soodvetniot ucenik i da pritisnete na opagackoto meni (na srelkata nadolu) i da odberete kolku izostanoci ima od 1-7 soodvetno za Opravdani, odnosno Neopravdani. Potoa za da gi potvrdite vnesenite izostanoci pritiskate na kopceto POTVRDI so sto se zacuvuvaat vasite posledni promeni. Vrz baza na poslednite promeni se presmetuva vkupniot broj na Opravdani, Neopravdai, Vkupni izostanoci soodvetno i se proveruva Statusot na Povedenie, odnosno dali go zadovoluva uslovot za Primarno, Zadovolitelno ili Nezadovolitelno povedenie.");
}
</script>


<?php  

 $con=mysqli_connect("localhost","root","","ednevnik") or die("Neuspesen obid za povrzuvanje so serverot!");
 
   if(isset($_POST['submit']))
 {
		 $moe_povedenie=mysqli_query($con," SELECT * FROM povedenie WHERE id_user='$_POST[hidden]' ");
		 $result=mysqli_fetch_array($moe_povedenie);
		 $result['opravdani']+=$_POST['opravdani'];
		 $result['neopravdani']+=$_POST['neopravdani'];
		 $vkupno_izostanoci=$result['opravdani']+$result['neopravdani'];
	     
		 if($result['neopravdani']<=10) $tip="p";
         elseif(($result['neopravdani']>10) and ($result['neopravdani']<=15))	$tip="z";	
         else $tip="n";	 
		 
		 $query_izostanoci=mysqli_query($con,"UPDATE povedenie SET opravdani='$result[opravdani]', neopravdani='$result[neopravdani]', vkupno='$vkupno_izostanoci', povedenie='$tip' WHERE id_user='$_POST[hidden]'  ");	 	 
 };
 

 
 $sqlquery=mysqli_query($con, "SELECT * FROM povedenie ");
 $sql1query=mysqli_query($con, "SELECT * FROM podatoci WHERE pozicija=1 ");
 
 echo
   "<br><br><br>
    <table id='customers'><tr>
    <th>Ucenik </th>
	<th>Opravdani</th>
	<th>Neopravdani</th>
	<th>Br. Opravdani</th>
	<th>Br. Neopravdani</th>
	<th>Vkupno Izostanoci</th>
	<th>Povedenie</th>
	<th>Potvrdi Izostanoci</th>
	</tr class='alt'>";
 while($ucenik = mysqli_fetch_array($sql1query) and $povedenie = mysqli_fetch_array($sqlquery) )	
 {
	 if($povedenie['neopravdani']<=10)
	 {
		 $tip1="Primerno";
	 }
	 elseif(($povedenie['neopravdani']>10) and ($povedenie['neopravdani']<=15))
	 {
		 $tip1="Zadovolitelno";
	 }
	 else
	 {
		 $tip1="Nezadovolitelno";
	 } 
	 echo "<form action='vnesiizostanoci.php' method='POST'>";
	 echo "<tr>";
	 echo "<td>";
     echo $ucenik['ime']." ".$ucenik['prezime'];
     echo "<br>";
     echo $ucenik['datum_raganje']."<br>";
     echo $ucenik['mesto'];
     echo "</td>";
	 echo "<td>". 
	 "<select selected='$povedenie[opravdani]' name='opravdani'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option value=6>6</option>
	 <option value=7>7</option>
	 <option selected style='display:none;'>" . 0 . "</option>
     </select></td>";  
     echo "<td>". 
	 "<select selected='$povedenie[neopravdani]' name='neopravdani'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option value=6>6</option>
	 <option value=7>7</option>
	 <option selected style='display:none;'>" . 0 . "</option>
     </select></td>";  
     echo "<td>" .  $povedenie['opravdani'] . "</td>";
     echo "<td>" .  $povedenie['neopravdani'] . "</td>";
	 echo "<td>" .  $povedenie['vkupno'] . "</td>";
	 echo "<td>". $tip1 . "</td>";	 
	 echo "<td>". "<input type=submit name=submit class=button-success value=POTVRDI " . "</td>";
	 echo "<td>". "<input type=hidden name=hidden value=". $povedenie['id_user']  . "</td>";
	 echo "</tr></form>";
 }
 echo "</table>";

?>
</body>
</html>

