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
    alert("Za da vnesete oceni treba kaj soodvetniot ucenik da ja izberete soodvetnata ocena za soodvetniot predmet. Odkako ke gi izvrsite site promeni, odnosno vnesete uceni go pritiskate kopceto POTVRDI. So toa se zacuvani vasite posledni promeni i vrz osnova na poslednite promeni na ocenite se presmetuva prosek za ucenikot. Inicijalno pocetnata ocena na sekoj ucenik e 0 (nula).");
}
</script>


<?php  

 $con=mysqli_connect("localhost","root","","ednevnik") or die("Neuspesen obid za povrzuvanje so serverot!");
 
   if(isset($_POST['submit']))
 {
	 
	 $prosek=0;
	 $br=0;
	 if($_POST['makedonski']!=NULL ){$prosek+=$_POST['makedonski']; $br++;}
     if($_POST['matematika']!=NULL ) {$prosek+=$_POST['matematika']; $br++;}
	 if($_POST['angliski']!=NULL ) { $prosek+=$_POST['angliski']; $br++;}
	 if($_POST['biznis']!=NULL ) { $prosek+=$_POST['biznis']; $br++;}
	 if($_POST['gragjansko']!=NULL ) { $prosek+=$_POST['gragjansko']; $br++;}
	 if($_POST['fizicko']!=NULL ) { $prosek+=$_POST['fizicko']; $br++;}
	 if($_POST['programiranje']!=NULL ) { $prosek+=$_POST['programiranje']; $br++;}
	 if($_POST['digitalnisistemi']!=NULL ) { $prosek+=$_POST['digitalnisistemi']; $br++;}
	 if($_POST['procesno']!=NULL ) { $prosek+=$_POST['procesno']; $br++;}
	 if($_POST['praksa']!=NULL ) { $prosek+=$_POST['praksa']; $br++;}
	 if($br>0){
	 $kraen_prosek=$prosek/$br;}
	 else{
	 $kraen_prosek=0;
	 
	 }
	 
	 $update_query="UPDATE oceni SET makedonski=$_POST[makedonski] , matematika='$_POST[matematika]', angliski='$_POST[angliski]', biznis='$_POST[biznis]', gragjansko='$_POST[gragjansko]', fizicko='$_POST[fizicko]', programiranje='$_POST[programiranje]' , digitalnisistemi='$_POST[digitalnisistemi]', procesno='$_POST[procesno]',praksa='$_POST[praksa]' ,prosek='$kraen_prosek'  WHERE id_user='$_POST[hidden]' ";
	 mysqli_query($con,$update_query);
	 
	 
 };
 

 
 $sqlquery=mysqli_query($con, "SELECT * FROM oceni ");
 $sql1query=mysqli_query($con, "SELECT * FROM podatoci WHERE pozicija=1 ");
 
 echo
   "<br><br><br>
    <table id='customers'><tr>
    <th>Ucenik </th>
	<th>Makedonski</th>
	<th>Matematika</th>
	<th>Angliski</th>
	<th>Biznis</th>
	<th>Gragjansko</th>
	<th>Fizicko</th>
	<th>Programiranje</th>
	<th>Digitalni sistemi</th>
	<th>Procesno</th>
	<th>Praksa</th>
	<th>Prosek</th>
	<th>Potvrdi</th></tr class='alt'>";
 while($ucenik = mysqli_fetch_array($sql1query) and $oceni = mysqli_fetch_array($sqlquery) )	
 {
	 echo "<form action='vnesioceni.php' method='POST'>";
	 echo "<tr>";
	 echo "<td>";
     echo $ucenik['ime']." ".$ucenik['prezime'];
     echo "<br>";
     echo $ucenik['datum_raganje']."<br>";
     echo $ucenik['mesto'];
     echo "</td>";
	 echo "<td>". 
	 "<select value='$oceni[makedonski]' selected='$oceni[makedonski]' name='makedonski'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option selected style='display:none;'>" .$oceni['makedonski']. "</option>
     </select></td>"; 
	 echo "<td>". 
	 "<select value='$oceni[matematika]' selected='$oceni[matematika]' name='matematika'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option selected style='display:none;'>" .$oceni['matematika']. "</option>
     </select></td>"; 
     echo "<td>". 
	 "<select value='$oceni[angliski]' selected='$oceni[angliski]' name='angliski'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option selected style='display:none;'>" .$oceni['angliski']. "</option>
     </select></td>"; 
	 echo "<td>". 
	 "<select value='$oceni[biznis]' selected='$oceni[biznis]' name='biznis'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option selected style='display:none;'>" .$oceni['biznis']. "</option>
     </select></td>"; 
	 echo "<td>". 
	 "<select value='$oceni[gragjansko]' selected='$oceni[gragjansko]' name='gragjansko'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option selected style='display:none;'>" .$oceni['gragjansko']. "</option>
     </select></td>"; 
	echo "<td>". 
	 "<select value='$oceni[fizicko]' selected='$oceni[fizicko]' name='fizicko'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option selected style='display:none;'>" .$oceni['fizicko']. "</option>
     </select></td>"; 
	echo "<td>". 
	 "<select value='$oceni[programiranje]' selected='$oceni[programiranje]' name='programiranje'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option selected style='display:none;'>" .$oceni['programiranje']. "</option>
     </select></td>";  
	 echo "<td>". 
	 "<select value='$oceni[digitalnisistemi]' selected='$oceni[digitalnisistemi]' name='digitalnisistemi'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option selected style='display:none;'>" .$oceni['digitalnisistemi']. "</option>
     </select></td>"; 
	 echo "<td>". 
	 "<select value='$oceni[procesno]' selected='$oceni[procesno]' name='procesno'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option selected style='display:none;'>" .$oceni['procesno']. "</option>
     </select></td>"; 
	 echo "<td>
	 <select value='$oceni[praksa]' selected='$oceni[praksa]' name='praksa'>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
	 <option value=5>5</option>
	 <option selected style='display:none;'>" .$oceni['praksa']. "</option>
     </select></td>";
	 echo "<td>". $oceni['prosek'] . "</td>";
	 echo "<td>". "<input type=submit name=submit class=button-success value=POTVRDI " . "</td>";
	 echo "<td>". "<input type=hidden name=hidden value=". $oceni['id_user']  . "</td>";
	 echo "</tr></form>";
 }
 echo "</table>";

?>
</body>
</html>

