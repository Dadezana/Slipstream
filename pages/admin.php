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
      
      <a href="garage.php" class="bar-item button">GARAGE</a>
      <a href="piste.php" class="bar-item button">PISTE</a>
      <a href="admin.php" class="bar-item button" style="color: var(--main-color);"><?php echo $_SESSION["user"];?><i style="margin-left: 5px" class="fas fa-user-circle"></i></a>
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
	CAMBIARE STATO MANUTENZIONE
 -->
 <?php
	
	if(isset($_POST["mantSub"])){
		$auto = array();
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

<!-- 
	MODIFICARE/CANCELLARE PRENOTAZIONI
 -->
 <?php

	function notify_error($msg="Errore"){
		echo "<div class=\"notify-container bg-red\">
				<p>$msg</p>
				<p class=\"notify-line bg-white\"></p>
			</div>";
	}

	function check($usr, $db){
		$usr = new DateTime($usr);
		$db = new DateTime($db);

		if( $usr->format("H") > $db->format("H") ) return 1;
		if( ($usr->format("H")) < $db->format("H") ) return -1;
		if( $usr->format("H") == $db->format("H") )
		{
			if( $usr->format("i") > $db->format("i") ) return 1;
			if( $usr->format("i") < $db->format("i") ) return -1;
			else return 0;
		}
	}

	if(isset($_POST["del"])){
		$id = $_POST["del"];
		$sql = "DELETE FROM prenotazione WHERE ID=$id";
		$conn->query($sql) or die(notify_error("Errore nel cancellare la prenotazione"));
	}

	if(isset($_POST["mod"]))
	{
		$id = $_POST["mod"];
		$canUpdate = true;

		// controllo che tutto sia a norma
		$sql = "SELECT * FROM prenotazione WHERE ID=\"$id\"";
		$conn->query($sql);
		$res = $conn->fetch();
		
		// controllo della data
		if(!empty($_POST["data"])) $data = $_POST["data"];
		else $data = $res["data"];

		$current_date = date("Y-m-d");
		$user_date = ($data);

		if($user_date <= $current_date){
			notify_error("Selezionare una data dopo oggi");
			$canUpdate = false;
		}
		// controllo altri parametri
		if($canUpdate){
			if(!empty($_POST["ora"])) $ora = $_POST["ora"];
			else $ora = $res["ora"]; 

			if(!empty($_POST["oraFine"])) $oraFine = $_POST["oraFine"];
			else $oraFine = $res["oraFine"];

			if(!empty($_POST["auto"])) $targa = $_POST["auto"];
			else $targa = $res["targa"];

			// controllo se i minuti sono minimo 50
			$dateTime1 = date_create($ora);
			$dateTime2 = date_create($oraFine);
			$minutediff = date_diff($dateTime1, $dateTime2);
			$minutediff = $minutediff->h * 60 + $minutediff->i;

			if($minutediff < 50){
				notify_error("Impossibile effettuare prenotazioni inferiori ai 50 minuti");
				$canUpdate = false;
			}
			elseif($dateTime1 > $dateTime2){
				notify_error("La data di inizio non può essere maggiore di quella di fine");
				$canUpdate = false;
			}
			// prendo tutte le prenotazioni in quella data e con quella auto tranne che la prenotazione che si vuole modificare
			$sql = "SELECT * FROM prenotazione WHERE targa=\"$targa\" AND data=\"$data\" AND ID<>$id";
			$duplicate_query = $conn->query($sql);

			// ciclo attraverso tutte le prenotazione e verifico che quella fascia oraria non sia già occupata
			$usrStart = $ora;
			$usrEnd = $oraFine;

			if(check($usrEnd, "20:00") > 0){
				notify_error("La pista chiude alle ore 20:00");
				$canUpdate = false;
			}elseif(check($usrStart, "8:00") < 0){
				notify_error("La pista apre alle ore 8:00");
				$canUpdate = false;
			}

			if($canUpdate)
			while($res = $conn->fetch($duplicate_query))
			{
				$dbStart = $res["ora"];
				$dbEnd = $res["oraFine"];

				if( check($usrEnd, $dbStart) < 0 ){
					// ok
				}elseif( check($usrStart, $dbEnd) > 0 ){
					// ok
				}else{
					$canUpdate = false;
					notify_error("Fascia oraria non disponibile");
					break;
				}
			}
		}

		// effettuo gli aggiornamenti
		if($canUpdate)
		{
			$sql = "UPDATE prenotazione SET ora=\"$ora\", oraFine=\"$oraFine\" WHERE ID=\"$id\"";
			$conn->query($sql) or die(notify_error("Errore nell'effettuare la modifica"));

			$sql = "UPDATE prenotazione SET data=\"$data\" WHERE ID=\"$id\"";
			$conn->query($sql) or die(notify_error("Errore nell'effettuare la modifica"));

			$sql = "UPDATE prenotazione SET targa=\"$targa\" WHERE ID=\"$id\"";
			$conn->query($sql) or die(notify_error("Errore nell'effettuare la modifica"));
			
			$sql = "UPDATE prenotazione SET durata=$minutediff WHERE id=$id";
			$conn->query($sql) or die(notify_error("Errore nell'effettuare la modifica"));
		}	
	}
	
?>

<!-- 
	SELEZIONE DELLE PRENOTAZIONI
 -->
 <?php
	$user = $_SESSION["user"];
	$current_date = date("Y-m-d");
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
				ON pista.nome=auto.pista
				ORDER BY data DESC";
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

	$reserv_query = $conn->query($sql) or die(notify_error("Errore nel caricare le prenotazioni"));
?>

<header class="display-container" id="home">

<?php if(mysqli_num_rows($reserv_query) == 0){ ?>
    <div class="container reservation text-white" style="justify-content: center; background-color: rgba(255, 255, 255, 0.15)">
		<h2>Nessuna prenotazione effettuata</h2>
    </div>
<?php } ?>

<?php $i = 0; while($res = $conn->fetch($reserv_query)){ ?> <!-- Per mostrare più risultati della query -->

	<div class="container reservation" <?php if($res["data"] < $current_date){ echo "name=\"old_reservation\""; echo "style=\"display: none\"";}?> value="<?php if($user == "admin") echo $res["cliente"];?>">

		<?php if($user == "admin"){?>
			<div id="username-title">
				<h3 name="usernames"><?php echo $res["cliente"] ?></h3>
			</div>
		<?php } ?>

		<div class="card">
			<div class="icon-container">
				<i class="fas fa-clock icon"></i>
			</div>
			<div class="content">
				<p id="topRight"><?php echo $res["ora"]." - ".$res["oraFine"]; ?></p>
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
				<p id="mainContent"><?php echo round( floatval($res["prezzo"])*intval($res["durata"]),2)."€"; ?></p>
				<p>Prezzo</p>
			</div>
		</div>
		<form method="POST" action="admin.php" id="form-delete-btn">
		
			<button type="button" onclick="showForm(<?php echo $i ?>)" class="button control-btn"><i class="fas fa-cog margin-right"></i>Modifica</button>
			<button type="submit" value="<?php echo $res["ID"] ?>" name="del" class="button control-btn"><i class="fas fa-trash-alt margin-right"></i>Elimina</button>
		</form>

		<?php
			$sql = "SELECT modello, targa FROM auto WHERE manutenzione = false";
			$auto = $conn->query($sql);
		?>
		<!--
		//*	FORM MODIFICA PRENOTAZIONE
		 -->
		<form method="POST" action="admin.php" class="modify-form" id="<?php echo "modify-form".$i ?>">
			<label for="data">Data</label>
			<input type="date" name="data">
			
			<label for="ora">Ora inizio</label>
			<input type="time" name="ora">

			<label for="oraFine">Ora fine</label>
			<input type="time" name="oraFine">

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
//*	PULSANTE CHE MOSTRA PANNELLO PER MODIFICARE STATO MANUTENZIONE AUTO
-->
<div class="control-btn-low">
	<?php if($user == "admin"){ ?>
		
		<input type="text" id="user_searched" onkeyup="searchUser()">

		<button type="button" class="a tooltip" id="searchButton" onclick="displaySearchBar()">
			<span class="tooltiptext">Cerca utente</span>
			<i class="fas fa-search"></i>
		</button>

		<button type="submit" class="a tooltip" name="old_res" id="show_old_res" onclick="showOld(false)">
			<span class="tooltiptext" id="show_old_res_tooltip">Mostra vecchie prenotazioni</span>
			<i id="res_eye" class="fas fa-eye-slash"></i>
		</button>
		<button type="button" class="a tooltip" onclick="showMantainance()">
			<i class="fas fa-tools"></i>
			<span class="tooltiptext">Officina</span>
		</button>
	<?php } ?>
	<button type="button" onclick="window.location.href='logout.php'" class="a tooltip">
		<i class="fas fa-sign-out-alt"></i>
		<span class="tooltiptext">Logout</span>
	</button>
</div>

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
// TODO: se si cerca un utente e poi si clicca su "mostra vecchie prenotazioni" verranno mostrate anche le vecchie prenotazioni non di quell'utente

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
		// modifyForm.classList.add('');
	}
	function hideForm(index){
		let modifyForm = document.getElementById("modify-form" + index);
		modifyForm.style.display = 'none';
	}
</script>

<?php if($user == "admin"){ ?>
<script>
	var canShowOld = false;		// if it's possible to show old reservations
	var userToShow = "";
	function showMantainance(){
		officina = document.getElementById("officina");
		officina.style.display = 'flex';
	}

	function hideMantainance(){
		officina = document.getElementById("officina");
		officina.style.display = 'none';
	}

	function showOld(showNew){
		
		let btn = document.getElementById("show_old_res");
		let tooltip = document.getElementById("show_old_res_tooltip");
		let icon = document.getElementById("res_eye");
		let older_reserv = document.getElementsByName("old_reservation");

		if(showNew){
			btn.setAttribute('onclick', 'showOld(false)');
			for(let i = 0; i < older_reserv.length; i++){
				older_reserv[i].style.display = 'none';
			}
			tooltip.textContent = "Mostra vecchie prenotazioni";
			icon.className = "fas fa-eye-slash";
		}
		else{
			btn.setAttribute('onclick', 'showOld(true)');
			icon.className = "fas fa-eye";
			tooltip.textContent = "Mostra solo nuove prenotazioni";
			for(let i = 0; i < older_reserv.length; i++)
			{

				if(older_reserv[i].getAttribute('value').includes(userToShow) || userToShow === ""){
					console.log("yes");
					older_reserv[i].style.display = 'flex';
				}else{
					console.log("no");
					older_reserv[i].style.display = 'none';
				}
				
				// older_reserv[i].style.display = 'flex';
			}
			
			
		}
		canShowOld = !canShowOld;
	}

	function searchUser(){
		let user = document.getElementById("user_searched").value;
		let names = document.getElementsByName("usernames");
		let forms = document.getElementsByClassName("container reservation");

		userToShow = user;

		for(let i = 0; i < names.length; i++){
			if(names[i].textContent.includes(user)){
				if(forms[i].getAttribute("name") == "old_reservation")
				{
					if(canShowOld){
						forms[i].style.display = "flex";
					}else{
						forms[i].style.display = "none";
					}
				}else{
					forms[i].style.display = "flex";
				}
			}else{
				forms[i].style.display = "none";
			}
		}
	}

	function displaySearchBar(){
		let searchBar = document.getElementById('user_searched');
		let searchButton = document.getElementById("searchButton");
		let status = searchBar.className;
		if(status == "expand-search"){
			searchBar.classList.remove("expand-search");
			searchBar.classList.add("expand-search-reverse");
			searchBar.disabled = true;
			searchButton.style.color = "white";
		}else{
			searchBar.classList.remove("expand-search-reverse");
			searchBar.disabled = false;
			searchBar.classList.add("expand-search");
			searchButton.style.color = "var(--main-color)";
		}
	}
</script>
<?php } ?>

<?php
	$conn->disconnect();
?>
</body>

</html>