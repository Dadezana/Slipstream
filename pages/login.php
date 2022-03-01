<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Slipstream | Login</title>
	<link rel="icon" href="../img/logoIcon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/login.css">
	<link rel="icon" href="img/icon.ico">
</head>
<body>


<div class="top">
  <div class="bar white card" id="myNavbar">
    <!-- <a href="#home" class="bar-item button wide"> </a>-->
    
    <div class="left" style="display:block; width:fit-content; display:flex;">
      <img src="../img/logoS.png" style="height: 48px;">
      <h4 style="color: rgb(228, 6, 6)">Slipstream</h4>
    </div>
    

    <!-- Right-sided navbar links -->
    <div class="right hide-small">
    <a href="../index.php" class="bar-item button">HOME</a>
      <a href="#team" class="bar-item button">TEAM</a>
      <a href="garage.php" class="bar-item button">GARAGE</a>
      <a href="piste.php" class="bar-item button">PISTE</a>
      <a href="login.php" class="bar-item button" style="color: var(--main-color);">LOGIN</a>
    </div>
    
  <!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="bar-item button right hide-large hide-medium" onclick="openSidebar()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="sidebar bar-block black card animate-left hide-medium hide-large" style="display:none" id="mySidebar">
  <a href="../index.php"        onclick="closeSidebar()" class="bar-item button" style="color: var(--main-color);">HOME</a>
  <a href="#team"            onclick="closeSidebar()" class="bar-item button">TEAM</a>
  <a href="garage.php" onclick="closeSidebar()" class="bar-item button">GARAGE</a>
  <a href="piste.php"         onclick="closeSidebar()" class="bar-item button">PISTE</a>
  <a href="login.php"  onclick="closeSidebar()" class="bar-item button">LOGIN</a>
</nav>

<header class="bgimage display-container" id="home">
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
							<input type="submit" id="sub" name="sub" class="button text-white border-white hover-red" value="Accedi">
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
							<input type="submit" id="sub" name="sub" class="button text-white hover-red border-white" value="Registrati">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<label for="tab-1" style="cursor: pointer">Sei gia' registrato?</label>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</form>
</header>


	
<?php
	require "../db.php";
	if($_POST){
		// $user = "root";
		// $psw = "";
		// $host = "127.0.0.1";
		// $database = "slipstream";
		$conn = new DB;
		
	if($_POST["sub"] == "Registrati"){	
		if(!empty($_POST["usrreg"]) && !empty($_POST["pswreg"]) && !empty($_POST["email"])){
			$username = $_POST["usrreg"];
			$password = password_hash($_POST["pswreg"], PASSWORD_DEFAULT);
			$email = $_POST["email"];

			// $conn = mysqli_connect($host, $user, $psw, $database) or die (mysqli_connect_error());
			if(!$conn->connect()){
				echo "<script>alert('Errore nel connettersi al db')</script>";
				die(mysqli_connect_error());
			}

			$sql = "SELECT username FROM cliente WHERE username='$username'";
			$query = $conn->query($sql);

			if(mysqli_num_rows($query) == 0)
			{
				$sql = "INSERT INTO `cliente`(`username`, `password`, `email`) VALUES ('$username','$password','$email')";
				$query = $conn->query($sql) or die ("Errore in fase di registrazione utente");
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
			
				if(!$conn->connect()){
					echo "<script>alert('Errore nel connettersi al db')</script>";
					die(mysqli_connect_error());
				}
				
				$sql="SELECT password FROM cliente WHERE username='$username'";
				
				$result = $conn->query($sql);
				
				if (mysqli_num_rows($result) == 1) {
					
					$row = $conn->fetch();
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