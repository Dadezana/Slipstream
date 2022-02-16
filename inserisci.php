<?php

	$user = "root";
	$psw = "";
	$host  = "127.0.0.1";
	$database = "slipstream";

	$utente=$_POST["usr"];
	$password=$_POST["psw"];
	$email=$_POST["mail"];

	$conn=mysqli_connect($host, $user, $psw, $database) or die (mysqli_connect_error());

	$sql="SELECT username FROM cliente WHERE username='$utente'";
	$query=mysqli_query($conn, $sql)or die ("Errore nell'esecuzione della query sulla tabella registrazioni");

	if(mysqli_num_rows($query)==0)
		{
		$sql="INSERT INTO `cliente`(`username`, `password`, `email`) VALUES ('$utente','$password','$email')";
		$query=mysqli_query($conn, $sql)or die ("Errore in fase di registrazione utente");
		echo "<script>alert('Registrazione effettuata con successo!'); </script>";
		}
	
	else 
		echo "<script>alert('Attenzione, utente già registrato!');history.back(); </script>";
   
?>