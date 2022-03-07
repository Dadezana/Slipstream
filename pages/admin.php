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
		$conn->query($sql);
	}

	if(isset($_POST["mod"]))
	{
		$id = $_POST["mod"];

		if(!empty($_POST["data"]))
		{
			$data = $_POST["data"];
			$sql = "UPDATE prenotazione SET data=\"$data\" WHERE ID=\"$id\"";
			$conn->query($sql);
		}
		if(!empty($_POST["auto"]))
		{
			$targa = $_POST["auto"];
			$sql = "UPDATE prenotazione SET targa=\"$targa\" WHERE ID=\"$id\"";
			$conn->query($sql);


	$reserv_query = $conn->query($sql);

		}
		if(!empty($_POST["ora"]))
		{
			$ora = $_POST["ora"];
			$sql = "UPDATE prenotazione SET ora=\"$ora\" WHERE ID=\"$id\"";
			$conn->query($sql);
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

	$reserv_query = $conn->query($sql);
?>

<header class="display-container" id="home">

<?php $i = 0; while($res = $conn->fetch($reserv_query)){ ?> <!-- Per mostrare più risultati della query -->

	<div class="container" id="reservation">

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

			$sql = "SELECT * FROM pista";
			$piste = $conn->query($sql);
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

			<button type="submit" name="mod" value="<?php echo $res["ID"]; ?>" class="button hover-red border-white margin-bottom margin-top-40">Modifica</button>
			<button type="button" onclick="hideForm(<?php echo $i ?>)" id="closeBtn" class="button"><i class="fas fa-times"></i></button>
		</form>
	</div>
	
<?php $i++; } ?>

</header>
 
<a href="logout.php" id="logout-btn" style="color: white; font-size: 25px;">Logout</a>



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
}
function hideForm(index){
	let modifyForm = document.getElementById("modify-form" + index);
	modifyForm.style.display = 'none';
}
</script>

<?php
	$conn->disconnect();
?>
</body>

</html>