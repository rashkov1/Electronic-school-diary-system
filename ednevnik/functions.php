<?php 

session_start();
function loggedin(){
	if(isset($_SESSION['id']) && !empty($SESSION['id']))
	{
		return true;
	}
	else
	{
		return false;
	}
}

?>