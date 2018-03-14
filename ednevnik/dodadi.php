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
					width: 650,
					height: 530,
});
});
</script>


<img src=question-mark.png width="70"  height="70"align="right" onclick="myFunction()" alt="Pomos">
<script>
function myFunction() {
    alert("Za da dodadete ucenik treba najprvo da gi vnesete negovite osnovni podatoci kako sto se Ime, Prezime, Datum na raganje, Mesto i negoviot E-mail. Potoa treba da gi vnesite i negovite informacii za korisnickata smetka kako sto se Korisnicko ime i Lozinka. Od kako ke gi vnesete podatocite za noviot ucenik pritiskate na kopceto DODADI. Za da bide uspesno dodaden noviot ucenik baranjeto go odobruva Administratorot.");
}
</script>





 
<?php    


$con=mysqli_connect("localhost","root","","ednevnik") or die("Neuspesen obid za povrzuvanje so serverot!");

if(isset($_POST['dodadi_ucenik']))
{
	     
	if( $_POST['ime']!='' and $_POST['prezime']!='' and $_POST['mesto']!='' and $_POST['email']!='' and $_POST['datum_raganje']!='' and $_POST['username']!='' and $_POST['password']!='')
	{
		$a=mysqli_query($con,"SELECT * FROM korisnik WHERE user='$_POST[username]'");
		if(mysqli_num_rows($a)==0)
		{
		mysqli_query($con,"INSERT INTO dodadi_ucenik VALUES('','$_POST[ime]','$_POST[prezime]','$_POST[datum_raganje]','$_POST[mesto]','$_POST[email]','$_POST[username]','$_POST[password]','$_POST[textarea]')");
		}
		else
		{
			 echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h2><pre color=red>                   Vekje postoi takov korisnik ve molime smenete go korisnickoto ime</pre></h2>";
		}
	}
	else {
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h2><pre color=red>                                  Necelosno vneseni podatoci ve molime obidete se povtorno</pre></h2>";
	}
	
	
}


echo "<div id='dialog' title='DODADI UCENIK' >";
echo "<form action='dodadi.php' method='POST'>";
echo "Ime: "." "."<input type='text' name='ime' ><br><br>";
echo "Prezime: "." "."<input type='text' name='prezime'><br><br>";
echo "Datum na raganje: "." "."<input type='date' name='datum_raganje' id='datepicker'><br><br>";
echo "Mesto: "." "."<input type='text' name='mesto' ><br><br>"; 
echo "Email: "." "."<input type='text' name='email' ><br><hr>";
echo "Informacii za korisnicka smetka<br><br>";
echo "Korisnicko ime: "." "."<input type='text' name='username'><br><br>";
echo "Lozinka: "." "."<input type='text' name='password'><br><br>";
echo "<b>Zabeleska</b> ne e zadolzitelno<br><br>";
echo "<textarea name='textarea'> </textarea>
<input type='submit' value='DODADI' name='dodadi_ucenik'>
</form>
</div>";

 

?>
</body>
</html>

