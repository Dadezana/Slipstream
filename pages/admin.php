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
      <a href="admin.php" class="bar-item button" style="color: var(--main-color);">ACCOUNT</a>
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
  <a href="admin.php"  		onclick="closeSidebar()" class="bar-item button">ACCOUNT</a>
</nav>

<?php
	require "../db.php";

	$conn = new DB;

	if(!$conn->connect()){
		echo "console.log('Failed to connect to DB')";
		die();
	}

	$user = $_SESSION["user"];
	$sql = "SELECT * 
			FROM 
			cliente INNER JOIN prenotazione
			ON prenotazione.cliente=\"$user\"";
	$conn->query($sql);
	$res = $conn->fetch();

	$sql = "SELECT * 
			FROM 
			cliente INNER JOIN 
			(
			`prenotazione` INNER JOIN `auto` 
			ON 
			prenotazione.targa=auto.targa
			) 
			ON 
			prenotazione.cliente=cliente.username 
			WHERE 
			cliente=\"$user\"";

	$auto = $conn->fetch( $conn->query($sql) );

?>

<header class="bgimage display-container" id="home">

	<div class="container">
	<div class="card">
			<div class="icon-container">
				<i class="fas fa-clock icon"></i>
			</div>
			<div class="content">
				<p id="topRight"><?php echo $res["ora"]; ?></p>
				<!-- <img src="img/piste/monza.png" class="track"> -->
				<p id="mainContent"><?php echo $res["data"]; ?></p>
				<p>Data e Ora</p>
			</div>
		</div>

		<div class="card">
			<div class="icon-container">
				<i class="fas fa-steering-wheel icon wheel"></i>
			</div>
			<div class="content">
				<img src="<?php echo $auto["img"]; ?>" class="track">
				<!-- <img src="img/garage/ferrari488.png" class="track"> -->
				<p id="topRight"><?php echo $auto["modello"]; ?></p>
				<p>Auto</p>
			</div>
		</div>

		<div class="card">
			<div class="icon-container">
				<i class="fas fa-road icon"></i>
			</div>
			<div class="content">
				<img src="img/piste/monza.png" class="track">
				<p id="topRight">Monza</p>
				<p>Circuito</p>
			</div>
		</div>

		<div class="card">
			<div class="icon-container">
				<i class="fas fa-euro-sign icon"></i>
			</div>
			<div class="content">
				<!-- <img src="img/piste/monza.png" class="track"> -->
				<p id="mainContent"><?php echo $res["costo"]."€"; ?></p>
				<p>Prezzo</p>
			</div>
		</div>
	</div>
        
</header>
 
<a href="logout.php" style="color: white; font-size: 25px;">Logout</a>
<?php
	$conn->disconnect();
?>
</body>

</html>