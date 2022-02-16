<!DOCTYPE html>
<html lang="it">
<?php

// $user = "root";
// $psw = "";
// $host  = "127.0.0.1";
// $database = "slipstream";

// $utente=$_POST["usr"];
// $password=$_POST["psw"];
// $email=$_POST["mail"];

// $conn=mysqli_connect($host, $user, $psw, $database) or die (mysqli_connect_error());

// $sql="SELECT username FROM cliente WHERE username='$utente'";
// $query=mysqli_query($conn, $sql)or die ("Errore nell'esecuzione della query sulla tabella registrazioni");

// if(mysqli_num_rows($query)==0)
// 	{
// 	$sql="INSERT INTO `cliente`(`username`, `password`, `email`) VALUES ('$utente','$password','$email')";
// 	$query=mysqli_query($conn, $sql)or die ("Errore in fase di registrazione utente");
// 	echo "<script>alert('Registrazione effettuata con successo!'); </script>";
// 	}

// else 
// 	echo "<script>alert('Attenzione, utente già registrato!');history.back(); </script>";

?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Slipstream</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<form name="form" method="post">
	<div class="login-wrap">
		<div class="login-html">
			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Accedi</label>
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrati</label>
			<div class="login-form">
				<div class="sign-in-htm">
					<div class="group">
						<label for="user" class="label">Username</label>
						<input id="usr" name="usr" type="text" class="input" required>
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="psw" name="psw" type="password" class="input" data-type="password" required>
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" checked>
						<label for="check"><span class="icon"></span> Ricorda le mie credenziali</label>
					</div>
					<div class="group">
						<input type="submit" class="button" value="Accedi">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="#forgot">Password dimenticata?</a>
					</div>
				</div>
				<div class="sign-up-htm">
					<div class="group">
						<label for="user" class="label">Username</label>
						<input id="usr" name="usr" type="text" class="input">
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="psw" name="psw" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<label for="mail" class="label">Indirizzo Email</label>
						<input id="mail" name="mail" type="text" class="input">
					</div>
					<div class="group">
						<input type="submit" class="button" value="Registrati">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<label for="tab-1">Sei gia' registrato?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</body>
</html>