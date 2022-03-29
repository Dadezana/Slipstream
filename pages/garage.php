<?php

	if(isset($_POST["subT"])){$pista='"'.$_POST["subT"].'"';}
  else($pista="1 OR 1=1");

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/garage.css">
    <script src="https://kit.fontawesome.com/99e3b4866c.js" crossorigin="anonymous"></script>

    <title>Slipstream | Garage</title>
    <link rel="icon" href="../img/logoIcon.png" type="image/x-icon">
</head>
<body>
    
<div class="top">
  <div class="bar white card1" id="myNavbar">
    <!-- <a href="#home" class="bar-item button wide"> </a>-->
    
    <div class="left" style="display:block; width:fit-content; display:flex;">
      <img src="../img/logoS.png" style="height: 48px;">
      <h4 style="color: rgb(228, 6, 6)">Slipstream</h4>
    </div>
    

    <!-- Right-sided navbar links -->
    <div class="right hide-small">
    <a href="../index.php" class="bar-item button">HOME</a>
      <a href="garage.php" class="bar-item button" style="color: var(--main-color);">GARAGE</a>
      <a href="piste.php" class="bar-item button">PISTE</a>
      <?php
        session_start();
        if(!isset($_SESSION["user"])){
          echo "<a href=\"login.php\" class=\"bar-item button\">LOGIN</a>";
        }else{
          $user = $_SESSION["user"];
          echo "<a href=\"admin.php\" class=\"bar-item button\">$user</a>";
        }
      ?>
    </div>
   
 <!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="bar-item button right hide-large hide-medium" onclick="openSidebar()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="sidebar bar-block black card1 animate-left hide-medium hide-large" style="display:none" id="mySidebar">
  <a href="../index.php"     onclick="closeSidebar()" class="bar-item button">HOME</a>
  <a href="garage.php" onclick="closeSidebar()" class="bar-item button" style="color: var(--main-color);">GARAGE</a>
  <a href="#pricing"         onclick="closeSidebar()" class="bar-item button">PISTE</a>
  <?php
        session_start();
        if(!isset($_SESSION["user"])){
          echo "<a href=\"login.php\" class=\"bar-item button\" onclick=\"closeSidebar()\">LOGIN</a>";
        }else{
          $user = $_SESSION["user"];
          echo "<a href=\"admin.php\" class=\"bar-item button\" onclick=\"closeSidebar()\">$user</a>";
        }
	?>
</nav>


<?php
  require "../db.php";

  $conn = new DB;

  if(!$conn->connect()){
    // echo "<script>console.log('Failed to connect to db')</script>";
  }
?>

<?php
		$sql = "SELECT * FROM auto INNER JOIN pista ON auto.pista=pista.nome WHERE nome=$pista";
    $reserv_query = $conn->query($sql);
?>

<div style="position: absolute; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5)"></div>

<header class="bgimage display-container margin-top-50" id="home" style="transform: translate(0, 9%);">

<div class="slideshow-container" style="height: 550px; min-width: 90%">

<?php $i=0; while($res = $conn->fetch($reserv_query)){ ?>
      <div class="mySlides fade">
        
        <div class="container">
          <div id="carName">
            <h2 class="text-white" style="margin-left: 10px; margin-right: 10px;"><?php echo $res["modello"]; ?></h2>
            <h5 class="text-white margin-bottom"><?php echo $res["pista"]; ?></h4>
          </div>
          <img src="<?php echo $res["img"]?>" style="width:600px;margin-top:70px">
          <div class="card">
            <div class="container" style="margin-top:80px">
              <!-- <h3 class="text-white"> -->
                <img src="<?php echo $res["logo"] ?>" style="height: 90px;margin-top: 25px;position: absolute;top: -90px;">
              <!-- </h3> -->
            </div>
            <div class="content">
                <p id="info2">Potenza</p>
                <p id="value2"><?php echo $res["potenza"]." Cv" ?></p>  <!-- cavalli -->
            </div>

            <div class="content">
                <p id="info3">Coppia</p>
                <p id="value3"><?php echo $res["coppia"]." Nm" ?></p> <!-- Newton metro -->
            </div>

            <div class="content">
                <p id="info4">Freni</p>
                <p id="value4"><?php echo $res["freni"]." m" ?></p> <!-- Metri. Calcolati andando a 100km/h -->
            </div>
            
            <div class="content">
                <p id="info5">Cilindrata</p>
                <p id="value5"><?php echo $res["cilindrata"]." cc" ?></p> <!-- Centimetri cubici -->
            </div>

            <div class="content">
                <p id="info5">Peso</p>
                <p id="value5"><?php echo $res["peso"]." Kg" ?></p> <!-- Kilogrammi -->
            </div>

            <div class="content">
                <p id="info5">Passo</p>
                <p id="value5"><?php echo $res["passo"]." mm" ?></p> 
            </div>
        <!-- <div class="container" style="width: 100%"> -->
        
          <?php
            if($res["manutenzione"]){?>
            <div class="container">
              <button 
                disabled 
                class="button hover-grey border-white text-white margin-bottom margin-top-50" 
                style="width:70%; font-size: 19px; cursor: not-allowed;margin-left: 20px; font-size:20px;">
                In manutenzione <i class="fas fa-tools"></i>
              </button>
            </div>
              
          <?php   
            }else{?>
              
            <div class="container">
              <?php if(isset($_SESSION["user"])){echo "<button type=\"button\" onclick=\"showForm("?><?php echo $i?><?php echo")\" class=\"button hover-red border-white text-white margin-bottom margin-top-50\" style=\"width:70%; font-size: 19px;\">Gareggia</button>";}
                    else{echo "<button type=\"button\" onclick=\"window.location.href='admin.php'\" class=\"button hover-red border-white text-white margin-bottom margin-top-50\" style=\"width:70%; font-size: 19px;\">Gareggia</button>";}
                ?>
            </div>
            <form method="POST" action="garage.php" class="modify-form" id="<?php echo "modify-form".$i?>">                
                  <label for="data">Data</label>
                  <input type="date" name="data" required>
              
                  <label for="ora">Ora inizio</label>
                  <input type="time" name="ora" required>

                  <label for="oraFine">Ora fine</label>
                  <input type="time" name="oraFine" required>
                
                  <button type="osubmit" name="subC" value="<?php echo $res["targa"];?>" style="width: 70%;" class="button hover-red border-white text-white margin-bottom margin-top-20">Prenota</button>
                  <button type="button" id="closeBtn" class="button" onclick="hideForm(<?php echo $i?>)"><i class="fas fa-times"></i></button>
              </form>
          <?php }?>
            </div>     
        </div>
      </div>


<?php $i++;} ?>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
    <br>


    <div style="text-align:center">
      <?php for($j = 1; $j <= $i; $j++) {?>
        <span class="dot" onclick="currentSlide(<?php echo $j ?>)"></span>
      <?php }?>
    </div>
    <script>
      var slideIndex = 1;
      showSlides(slideIndex);
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if(n > slides.length) {
          slideIndex = 1
        }
        if(n < 1) {
          slideIndex = slides.length
        }
        for(i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for(i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
      }
    </script>
</header>

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

if(isset($_POST["subC"]))
  if(!empty($_POST["data"]) && !empty($_POST["ora"])){

    $targa = $_POST["subC"];
    $data = $_POST["data"];
    $ora = $_POST["ora"];
    $oraFine = $_POST["oraFine"];
    $cliente = $_SESSION["user"];
  
		$canUpdate = true;

    $sql = "SELECT manutenzione FROM auto WHERE targa=\"$targa\"";
    $conn->query($sql);
    $res = $conn->fetch();

    if($res["manutenzione"]){
      $canUpdate = false;
    }

		$current_date = date("Y-m-d");
		$user_date = ($data);
		// //  echo "<script>console.log('data before manipulation: $data')</script>";
		// //  echo "<script>console.log('current_date: $current_date')</script>";
		// //  echo "<script>console.log('user_date: $user_date')</script>";
		if($user_date <= $current_date){
			notify_error("Selezionare una data dopo oggi");
			$canUpdate = false;
		}
    if($canUpdate){
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
        $durata = $minutediff;
        // prendo tutte le prenotazioni in quella data e con quella auto
        $sql = "SELECT * FROM prenotazione WHERE targa=\"$targa\" AND data=\"$data\"";
        $duplicate_query = $conn->query($sql);
  
        // ciclo attraverso tutte le prenotazione e verifico che quella fascia oraria non sia già occupata
        $usrStart = $ora;
        $usrEnd = $oraFine;
  
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
    if($canUpdate){
      $sql = "INSERT INTO prenotazione (durata, data, ora, oraFine, targa, cliente) VALUES (\"$durata\", \"$data\", \"$ora\", \"$oraFine\", \"$targa\", \"$cliente\")";
      $conn->query($sql);
      notify_error("Prenotazione effettuata!");
    }   
  }else{
    notify_error("Compilare tutti i campi");
  }
?>

<?php
  $conn->disconnect();
?>

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
		let modifyForm = document.getElementById("modify-form"+index);
		modifyForm.style.display = 'flex';
		modifyForm.classList.add('');
	}
	function hideForm(index){
		let modifyForm = document.getElementById("modify-form"+index);
		modifyForm.style.display = 'none';
	}
</script>

</body>
</html>