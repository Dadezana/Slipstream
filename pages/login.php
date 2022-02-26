<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | Slipstream</title>
	<link rel="stylesheet" href="css/login.css">
	<link rel="icon" href="img/icon.ico">
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
						<input id="usrreg" name="usrreg" type="text" class="input">
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="pswreg" name="pswreg" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" unchecked>
						<label for="check"><span class="icon"></span> Ricorda le mie credenziali</label>
					</div>
					<div class="group">
						<input type="submit" id="sub" name="sub" class="button" value="Accedi">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="#forgot">Password dimenticata?</a>
					</div>
				</div>
				<div class="sign-up-htm">
					<div class="group">
						<label for="user" class="label">Username</label>
						<input id="usrlog" name="usrlog" type="text" class="input">
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="pswlog" name="pswlog" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<label for="mail" class="label">Indirizzo Email</label>
						<input id="email" name="email" type="text" class="input">
					</div>
					<div class="group">
						<input type="submit" id="sub" name="sub" class="button" value="Registrati">
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
<?php
	if($_POST){
		$user = "root";
		$psw = "";
		$host = "127.0.0.1";
		$database = "slipstream";
		
	if($_POST["sub"] == "Registrati"){	
		if(!empty($_POST["usrreg"]) && !empty($_POST["pswreg"]) && !empty($_POST["email"])){
			$username = $_POST["usrreg"];
			$password = password_hash($_POST["pswreg"], PASSWORD_DEFAULT);
			$email = $_POST["email"];

			$conn = mysqli_connect($host, $user, $psw, $database) or die (mysqli_connect_error());

			$sql = "SELECT username FROM cliente WHERE username='$username'";
			$query = mysqli_query($conn, $sql) or die ("Errore nell'esecuzione della query sulla tabella registrazioni");

			if(mysqli_num_rows($query) == 0)
			{
				$sql = "INSERT INTO `cliente`(`username`, `password`, `email`) VALUES ('$username','$password','$email')";
				$query = mysqli_query($conn, $sql) or die ("Errore in fase di registrazione utente");
				echo "<script>alert('Registrazione effettuata con successo!'); </script>";
			}
			else echo "<script>alert('Attenzione, utente già registrato!');history.back(); </script>";
		}
		else echo "<script>alert('Compilare tutti i campi! reg');history.back();</script>";
	}
	else{
		if(!empty($_POST["usrlog"]) && !empty($_POST["pswlog"])){
			$username = $_POST["usrlog"];
			$password = $_POST["pswlog"];

		if($username == "admin" && $password == "admin"){
			session_start();
			$_SESSION["username"] = "admin";
			header("Location: admin.php");
		}
		else{
		
			$conn=mysqli_connect($host, $user, $psw, $database) or die (mysqli_connect_error());
			
			$sql="SELECT password FROM cliente WHERE username='$username'";
			
			$result=mysqli_query($conn, $sql);
			
			if (mysqli_num_rows($result) == 1) {
				
				$row = mysqli_fetch_assoc($result);
				$passdb = $row["password"]; 
				if (password_verify($password, $passdb)){
					session_start();
					$_SESSION["username"] = $username;
					header("Location: prenotazioni.php");
				}
				
			}
			else {
				echo "<script>alert('Utente inesistente!');history.back(); </script>";;
			}	
	  }
	}
	else echo "<script>alert('Compilare tutti i campi! log');history.back(); </script>";
  }
}
?>
</body>
</html>