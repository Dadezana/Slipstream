<?php
	session_start();
	
	if(!isset($_SESSION["user"])){
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Slipstream | Account</title>
    <link href="css/admin.css" rel="stylesheet" />
    <link rel="icon" href="../img/logoIcon.png" type="image/x-icon">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script src="https://kit.fontawesome.com/99e3b4866c.js" crossorigin="anonymous"></script>


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
      <a href="admin.php" class="bar-item button" style="color: var(--main-color);"><?php echo $_SESSION["user"];?></a>
    </div>
    
  <!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="bar-item button right hide-large hide-medium" onclick="openSidebar()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="sidebar bar-block black card animate-left hide-medium hide-large" style="display:none" id="mySidebar">
  <a href="../index.php"    onclick="closeSidebar()" class="bar-item button" style="color: var(--main-color);">HOME</a>
  <a href="#team"           onclick="closeSidebar()" class="bar-item button">TEAM</a>
  <a href="garage.php" 		onclick="closeSidebar()" class="bar-item button">GARAGE</a>
  <a href="piste.php"       onclick="closeSidebar()" class="bar-item button">PISTE</a>
  <a href="admin.php"  		onclick="closeSidebar()" class="bar-item button"><?php echo $_SESSION["user"];?></a>
</nav>
<!-- <a href="logout.php" style="color: white; font-size: 25px;">Logout</a> -->

<?php
	require "../db.php";

	$conn = new DB;

	if(!$conn->connect()){
		echo "console.log('Failed to connect to DB')";
		die();
	}
?>
<!-- 
	GESTIRE PRENOTAZIONI
 -->
 <?php
	if(isset($_POST["del"])){
		$id = $_POST["del"];
		$sql = "DELETE FROM prenotazione WHERE ID=$id";
		$conn->query($sql) or die("<div class=\"notify-container bg-red\">
									<p>Errore nel cancellare la prenotazione</p>
									<p class=\"notify-line bg-white\"></p>
								</div>");
	}

	if(isset($_POST["mod"]))
	{
		$id = $_POST["mod"];

		if(!empty($_POST["data"]))
		{
			$data = $_POST["data"];

			$current_date = date("Y-m-d");
			$user_date = strtotime("$data");

			if($user_date <= $current_date){
				echo "<div class=\"notify-container bg-red\">
						<p>La data selezionata non è valida</p>
						<p class=\"notify-line bg-white\"></p>
					</div>";
			}else{
				$sql = "UPDATE prenotazione SET data=\"$data\" WHERE ID=\"$id\"";
				$conn->query($sql) or die("<div class=\"notify-container bg-red\">
											<p>Errore nell'effettuare la modifica</p>
											<p class=\"notify-line bg-white\"></p>
										</div>");

				if(!empty($_POST["auto"]))
				{
					$targa = $_POST["auto"];
					$sql = "UPDATE prenotazione SET targa=\"$targa\" WHERE ID=\"$id\"";
					$conn->query($sql) or die("<div class=\"notify-container bg-red\">
												<p>Errore nell'effettuare la modifica</p>
												<p class=\"notify-line bg-white\"></p>
											</div>");
				}
				if(!empty($_POST["ora"]))
				{
					$ora = $_POST["ora"];
					$sql = "UPDATE prenotazione SET ora=\"$ora\" WHERE ID=\"$id\"";
					$conn->query($sql) or die("<div class=\"notify-container bg-red\">
												<p>Errore nell'effettuare la modifica</p>
												<p class=\"notify-line bg-white\"></p>
											</div>");
				}
			}
		}
		
	}
	
?>
<?php
	$user = $_SESSION["user"];
	
	if($user == "admin")
		$sql = "SELECT * FROM 
				pista INNER JOIN
				(
					cliente INNER JOIN
					( 
						prenotazione INNER JOIN `auto` 
						ON prenotazione.targa=auto.targa
					) 
					ON prenotazione.cliente=cliente.username
				)
				ON pista.nome=auto.pista";
	else
		$sql = "SELECT * FROM 
		pista INNER JOIN
		(
			cliente INNER JOIN
			( 
				prenotazione INNER JOIN `auto` 
				ON prenotazione.targa=auto.targa
			) 
			ON prenotazione.cliente=cliente.username
		)
		ON pista.nome=auto.pista
		WHERE cliente=\"$user\"";

	$reserv_query = $conn->query($sql) or die("<div class=\"notify-container bg-red\">
												<p>Errore nel caricare le prenotazioni</p>
												<p class=\"notify-line bg-white\"></p>
											</div>");
?>

<header class="display-container" id="home">

<?php if(mysqli_num_rows($reserv_query) == 0){ ?>
    <div class="container reservation text-white" style="justify-content: center; background-color: rgba(255, 255, 255, 0.15)">
		<h2>Nessuna prenotazione effettuata</h2>
    </div>
<?php } ?>

<?php $i = 0; while($res = $conn->fetch($reserv_query)){ ?> <!-- Per mostrare più risultati della query -->

	<div class="container reservation" id="">

		<?php if($user == "admin"){?>
			<div id="username-title">
				<h3><?php echo $res["cliente"] ?></h3>
			</div>
		<?php } ?>

		<div class="card">
			<div class="icon-container">
				<i class="fas fa-clock icon"></i>
			</div>
			<div class="content">
				<p id="topRight"><?php echo $res["ora"]; ?></p>
				<p id="mainContent"><?php echo $res["data"]; ?></p>
				<p>Data e Ora</p>
			</div>
		</div>

		<div class="card">
			<div class="icon-container">
				<i class="fas fa-car icon wheel"></i>
			</div>
			<div class="content">
				<img src="<?php echo $res["img"]; ?>" class="track">
				<p id="topRight"><?php echo $res["modello"]; ?></p>
				<p>Auto</p>
			</div>
		</div>

		<div class="card">
			<div class="icon-container">
				<i class="fas fa-road icon"></i>
			</div>
			<div class="content">
				<img src="<?php echo $res["imgT"] ?>" class="track">
				<p id="topRight"><?php echo $res["citta"] ?></p>
				<p>Circuito</p>
			</div>
		</div>

		<div class="card">
			<div class="icon-container">
				<i class="fas fa-euro-sign icon"></i>
			</div>
			<div class="content">
				<p id="mainContent"><?php echo $res["costo"]."€"; ?></p>
				<p>Prezzo</p>
			</div>
		</div>
		<form method="POST" action="admin.php" id="form-delete-btn">
		
			<button type="button" onclick="showForm(<?php echo $i ?>)" class="button control-btn"><i class="fas fa-cog margin-right"></i>Modifica</button>
			<button type="submit" value="<?php echo $res["ID"] ?>" name="del" class="button control-btn"><i class="fas fa-trash-alt margin-right"></i>Elimina</button>
		</form>

		<?php
			$sql = "SELECT modello, targa FROM auto";
			$auto = $conn->query($sql);
		?>
		<form method="POST" action="admin.php" class="modify-form" id="<?php echo "modify-form".$i ?>">
			<label for="data">Data</label>
			<input type="date" name="data">
			
			<label for="ora">Ora</label>
			<input type="time" name="ora">

			<label for="auto">Auto</label>
			<select name="auto">
				<option value=""></option>
				<?php while( $temp = $conn->fetch($auto) ) { ?>
					<option value="<?php echo $temp["targa"] ?>"><?php echo $temp["modello"] ?></option>
				<?php } ?>
			</select>

			<button type="submit" name="mod" value="<?php echo $res["ID"]; ?>" style="width: 50%;" class="button hover-red border-black margin-bottom margin-top-20">Modifica</button>
			<button type="button" onclick="hideForm(<?php echo $i ?>)" id="closeBtn" class="button"><i class="fas fa-times"></i></button>
		</form>
	</div>
	
<?php $i++; } ?>

</header>

<!--
	MODIFICARE STATO MANUTENZIONE AUTO
-->
<div class="control-btn-low">
	<?php if($user == "admin"){ ?>
		<button type="button" class="a" onclick="showMantainance()">Officina</button>
	<?php } ?>
	<button type="button" onclick="window.location.href='logout.php'" class="a">Logout</a>
</div>

<!--
	CAMBIARE STATO MANUTENZIONE
 -->
 <?php
	$auto = array();
	if(isset($_POST["mantSub"])){
		
		// if(!empty($_POST["auto"])){

			foreach($_POST["auto"] as $targa)
			{
				array_push($auto, $targa);
				$sql = "UPDATE 
							auto 
						SET 
							manutenzione = true
						WHERE
							targa = \"$targa\"";
				$conn->query($sql) or die("<div class=\"notify-container bg-red\">
											<p>Errore: modifica non effettuata</p>
											<p class=\"notify-line bg-white\"></p>
										</div>");
			}

		// }

		$auto_query = $conn->query("SELECT * FROM auto");

		while($res = $conn->fetch($auto_query))
		{
			$targa = $res["targa"];
			if( !in_array($targa, $auto) )
			{
				$sql = "UPDATE 
							auto 
						SET 
							manutenzione = false
						WHERE
							targa = \"$targa\"";
				$conn->query($sql) or die("<div class=\"notify-container bg-red\">
											<p>Errore: modifica non effettuata</p>
											<p class=\"notify-line bg-white\"></p>
										</div>");
			}
		}
		echo "<div class=\"notify-container bg-red\">
				<p>Modifica effettuata!</p>
				<p class=\"notify-line bg-white\"></p>
			</div>";
	}
	
?>

<?php
	if($user == "admin"){
		$sql = "SELECT * FROM auto";
		$conn->query($sql);
?>
		<div class="manutenzione-container" id="officina">
			<form action="admin.php" method="POST" class="manutenzione-form">

				<div style="width: 100%;display: flex;justify-content: space-between;align-items: center;">
					<p style="margin-left: 80px">Auto</p>
					<p style="margin-right: 80px">Manutenzione</p>
				</div>    
				
				<?php $i = 0;while($res = $conn->fetch()) {?>
					<div class="content">
						<?php if($res["manutenzione"]) {?>
							<i class="fas fa-tools" style="margin-left: 20px; font-size:13px; color: rgba(0, 0, 0, 0.5)"></i> 
						<?php }else { ?>
							<i class="fas fa-tools" style="margin-left: 20px; font-size:13px; color:transparent"></i>
						<?php } ?>				

						<label for="manutenzione<?php echo $i;?>"><?php echo $res["modello"] ?></label>
						<input type="checkbox" value="<?php echo $res["targa"];?>" id="manutenzione<?php echo $i;?>" name="auto[]" <?php if($res["manutenzione"]) echo "checked"; ?>>
					</div>
				<?php $i++;} ?>
				<button type="button" onclick="hideMantainance()" id="closeBtn" class="button"><i class="fas fa-times"></i></button>
				
				<button type="submit" name="mantSub" style="width: 73%;" class="button hover-red border-black margin-bottom-20 margin-top">Modifica</button>
				
			</form>
		</div>
<?php } ?>


<script>
	// Toggle between showing and hiding the sidebar when clicking the menu icon
	var mySidebar = document.getElementById("mySidebar");

	function openSidebar() {
	if (mySidebar.style.display === 'block') {
		mySidebar.style.display = 'none';
	} else {
		mySidebar.style.display = 'block';
	}
	}
	// Close the sidebar with the close button
	function closeSidebar() {
		mySidebar.style.display = "none";
	}


	function showForm(index){
		let modifyForm = document.getElementById("modify-form" + index);
		modifyForm.style.display = 'flex';
		modifyForm.classList.add('');
	}
	function hideForm(index){
		let modifyForm = document.getElementById("modify-form" + index);
		modifyForm.style.display = 'none';
	}
</script>

<?php if($user == "admin"){ ?>
<script>
	function showMantainance(){
		officina = document.getElementById("officina");
		officina.style.display = 'flex';
	}

	function hideMantainance(){
		officina = document.getElementById("officina");
		officina.style.display = 'none';
	}
</script>
<?php } ?>

<?php
	$conn->disconnect();
?>
</body>

</html>