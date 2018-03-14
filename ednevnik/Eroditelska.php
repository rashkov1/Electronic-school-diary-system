<!DOCTYPE html>
<html>
<head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />

        <script type="text/javascript">
            $(document).ready(function() {

                $('#wrapper').dialog({
                    autoOpen: false,
                    title: 'RODITELSKA TEMI',
					width: 550,
					height: 350,
					
                });
                $('#opener').click(function() {
                    $('#wrapper').dialog('open');
                });
            });
			   
        </script>
<script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />

        <script type="text/javascript">
$(document).ready(function() {

                $('#zabeleska1').dialog({
                    autoOpen: false,
                    title: 'Basic Dialog',
					width: 550,
					height: 350,
					
                });
                $('#opener1').click(function() {
                    $('#zabeleska1').dialog('open');
                });
            });
</script>
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
    alert("Vo delot E-RODITELSKA moze da ja pisuvate temata i dnevnikot red na slednata roditelska sto ja imate zakazano, za da se informira roditelot. So pritiskanje na kopceto Roditelska vi se otvora nov prozorec kade sto ja pisuvate temata i dnevniot red. Potoa so pritiskanje na kopceto VNESI TEMI vie uspesno ste ja vnele temata i sodrzinata na slednata roditelska sredba so sto roditelot veke moze da ja vidi sodrzinata.");
}
</script>



<?php  

$con=mysqli_connect("localhost","root","","ednevnik") or die("Neuspesen obid za povrzuvanje so serverot!");



if(isset($_POST['vnesi']))
{
	mysqli_query($con,"DELETE FROM roditelska_temi");
	mysqli_query($con,"INSERT INTO roditelska_temi VALUES ('$_POST[textarea]')");
	

}

$sql1query=mysqli_query($con, "SELECT * FROM podatoci WHERE pozicija=1 ");

 echo " <br><br><button id='opener' type='button' class='button-success' name='Roditelska'>Roditelska</button>";
 echo "<div id='wrapper'>";
 echo "<form action='Eroditelska.php' method='POST'>";
 echo "<textarea name='textarea' rows='9' cols='45'> </textarea><br><br><br>
       <input type='submit' id='opener' value='VNESI TEMI' name='vnesi'>
  </form>
	</div>";
	



?>
</body>
</html>