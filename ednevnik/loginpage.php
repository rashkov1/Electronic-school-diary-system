<?php
$con=mysqli_connect("localhost","root","","ednevnik") or die("Neuspesen obid za povrzuvanje so serverot!");
if (isset($_POST['submit']))
{
	if(empty($_POST['user']) or empty($_POST['password']))
	{
	
         echo "<p> Necelosno Venesni podatoci</p>";		 
	}
	else
	{
		
		$user=$_POST['user'];
		$password=$_POST['password'];
		
		$result=mysqli_query($con,"SELECT * FROM korisnik WHERE user='$user' AND password='$password' ");
		
        mysqli_query($con,"CREATE VIEW user AS SELECT * FROM korisnik WHERE user='$user' AND password='$password' "); 
		
			   if($rowcount=mysqli_fetch_array($result))
			   {
				      mysqli_query($con,"CREATE VIEW user AS SELECT * FROM korisnik WHERE user='$user' AND password='$password' "); 
                      $result = mysqli_query($con, "SELECT id FROM korisnik WHERE user='$user' AND password='$password' ");
                      $row = mysqli_fetch_assoc($result);
                      $mydata=$row['id'];
		              mysqli_query($con,"CREATE VIEW user123 AS SELECT * FROM podatoci WHERE id_user='$mydata' ");
				     $type=mysqli_query($con,"SELECT account_type FROM korisnik WHERE user='$user' AND password='$password' AND account_type='u'");
					 $type1=mysqli_query($con,"SELECT account_type FROM korisnik WHERE user='$user' AND password='$password' AND account_type='a'");
					 if($acctype=mysqli_fetch_array($type))
					 {
						  mysqli_query($con,"CREATE VIEW uspeh AS SELECT * FROM oceni WHERE id_user='$mydata' ");
						  mysqli_query($con,"CREATE VIEW moepovedenie AS SELECT * FROM povedenie WHERE id_user='$mydata' ");
						 header('location: ucenik.php');
					 }
					 else
					 {
						 header('location: profesor.php');
					 }
					 if($admin=mysqli_fetch_array($type1)) 
					 {
						 header('location: admin.php');
					 }

			    }
			   else
			   {
				   
				  
				     echo "Nevalidno korisnicko ime ili lozinka";
					
			   }
                
            
        


	}
	
}
?>