
<?php

include "conn.php";

if(isset($_POST['submit']))
{

	$ime=$_POST['ime'];
	$prezime=$_POST['prezime'];
	$datum_raganje=$_POST['datum'];
	$mesto=$_POST['mesto'];
	$email=$_POST['email'];
	$username=$_POST['user'];
	$password=$_POST['password'];
	$zabeleska=$_POST['zabeleska'];

	if(empty($username) or empty($password) or empty($ime) or empty($prezime) or empty($datum_raganje) or empty($mesto) or 
	empty($email) or empty($zabeleska))
	{
	     echo "<p>Fileds Empty!</p>";	
	}
	else
	{

	$ime=$_POST['ime'];
	$prezime=$_POST['prezime'];
	$datum_raganje=$_POST['datum'];
	$mesto=$_POST['mesto'];
	$email=$_POST['email'];
	$username=$_POST['user'];
	$password=$_POST['password'];
	$zabeleska=$_POST['zabeleska'];

	try {
   
	$stmt = $conn->prepare("INSERT INTO dodadi_ucenik (ime, prezime, datum_raganje, mesto, email, korisnicko_ime, lozinka, zabeleska) VALUES (:ime, :prezime, :datum_raganje, :mesto, :email, :korisnicko_ime, :lozinka, :zabeleska)");
	$stmt->bindParam(':ime', $ime);
    $stmt->bindParam(':prezime', $prezime);
    $stmt->bindParam(':datum_raganje', $datum_raganje);
	$stmt->bindParam(':mesto', $mesto);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':korisnicko_ime', $username);
	$stmt->bindParam(':lozinka', $password);
	$stmt->bindParam(':zabeleska', $zabeleska);
	$stmt->execute();
	
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }


 

}
}
?>

