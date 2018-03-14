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
<link rel="stylesheet"
href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#dialog" ).dialog({
	
	resizable: false,
					width: 500,
					height: 300,
});
});
</script>

<img src=question-mark.png width="70"  height="70"align="right" onclick="myFunction()" alt="Pomos">
<script>
function myFunction() {
    alert("Za da izbrisete nekoj ucenik najprvo go izbirate ucenikot i potoa pritiskate na kopceto OTSTRANI. Za ucenikot da bide izbrisan baranjeto treba da go odobri Administratorot.");
}
</script>




<?php  

 $con=mysqli_connect("localhost","root","","ednevnik") or die("Neuspesen obid za povrzuvanje so serverot!");
 $izbrisi_ucenik=mysqli_query($con,"SELECT * FROM podatoci WHERE pozicija=1");
 if(isset($_POST['otstrani_ucenik']))
 {
	 if($_POST['ucenik1'] !='')
	 {
		  $ucenik = $_POST['ucenik1'];
          
          $text = mysqli_real_escape_string($con,$_POST['textarea']);
   $profesor1=mysqli_query($con,"SELECT * FROM user");
   $profesor=mysqli_fetch_array($profesor1);
   
   mysqli_query($con, "INSERT INTO promena_status VALUES ('','$ucenik', '$text','$profesor[id]')");
	 }
	 
	 
 }

echo "<div id='dialog' title='OTSTRANI UCENIK' >";

$ucenik=mysqli_fetch_array($izbrisi_ucenik);
$br=mysqli_num_rows($izbrisi_ucenik);
echo "<form action='izbrisi.php' method='POST'>";
echo "<b> Selektiraj go ucenikot</b><br>";
echo"<select  name='ucenik1'>
<option value=''></option>";
while($ucenik1=mysqli_fetch_array($izbrisi_ucenik) )
{
	
	
	 echo
	 "<option value='$ucenik1[id_user]'>".$ucenik1['ime']." ".$ucenik1['prezime']." ".$ucenik1['datum_raganje']." ".$ucenik1['mesto']."</option>";
    
	
     
	
}
echo "</select><br><br>"; 
echo "<b>Zabeleska</b> ne e zadolzitelno<br>";
echo "<textarea name='textarea'> </textarea><br><br>
<input type='submit' value='OTSTRANI' name='otstrani_ucenik'>
</form>
</div>";

 

?>
</body>
</html>

