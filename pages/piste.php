<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/piste.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script src="https://kit.fontawesome.com/99e3b4866c.js" crossorigin="anonymous"></script>


    <title>Piste</title>
    <link rel="icon" href="../img/logoIcon.png" type="image/x-icon">
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
      <a href="piste.php" class="bar-item button" style="color: var(--main-color);">PISTE</a>
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
<nav class="sidebar bar-block black card animate-left hide-medium hide-large" style="display:none" id="mySidebar">
  <a href="../index.php"     onclick="closeSidebar()" class="bar-item button">HOME</a>
  <a href="#team"            onclick="closeSidebar()" class="bar-item button">TEAM</a>
  <a href="garage.php" onclick="closeSidebar()" class="bar-item button" >GARAGE</a>
  <a href="piste.php"         onclick="closeSidebar()" class="bar-item button" style="color: var(--main-color);">PISTE</a>
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
    echo "<script>console.log('Failed to connect to db')</script>";
  }
?>
<header class="bgimage display-container" id="home">
    
  <div class="container">
    <?php $result = $conn->fetch( $conn->query("select * from pista where nome like '%Mugello%'") )?>
    <!-- <img src="img/piste/mugellobg1.png" width="45%" class="margin-top-120"> -->
    
    <div class="card">
      <div class="content">
        <img src="img/piste/mugello1.png" class="track">
        <p><?php echo $result["nome"] ?></p>
        <p style="position:absolute; top: 2px; right: 5px;"><?php echo $result["citta"] ?></p>
        <p><?php echo $result["km"]."Km" ?></p>

        <div class="container" style="width: 100%">
          <button type="submit" value="monza" name="monza"
              class="button hover-red border-white text-white margin-bottom margin-top-40" 
              style="width:70%; font-size: 19px;">
              Gareggia
          </button>
        </div>
        
      </div>
      
    </div>
    
  </div>


  <div class="container">
    <?php $result = $conn->fetch( $conn->query("select * from pista where nome like '%Monza%'") )?>
    
    <div class="card">
      <div class="content">
        <img src="img/piste/monza.png" class="track">
        <p><?php echo $result["nome"] ?></p>
        <p style="position:absolute; top: 2px; right: 5px;"><?php echo $result["citta"] ?></p>
        <p><?php echo $result["km"]."Km" ?></p>

        <div class="container" style="width: 100%">
          <button type="submit" value="monza" name="monza"
              class="button hover-red border-white text-white margin-bottom margin-top-40" 
              style="width:70%; font-size: 19px;">
              Gareggia
          </button>
        </div>
      </div>
    </div>

    <!-- <img src="img/piste/mugellobg1.png" width="45%" class="margin-top-120"> -->
  </div>

<div class="container">
    <?php $result = $conn->fetch( $conn->query("select * from pista where nome like '%Vallelunga%'") )?>
    <!-- <img src="img/piste/vallelunga.jpg" width="40%" class="margin-top-100"> -->
    
    <div class="card">
      <div class="content">
      <img src="img/piste/circuitoVallelunga.png" class="track">
        <p><?php echo $result["nome"] ?></p>
        <p style="position:absolute; top: 2px; right: 5px;"><?php echo $result["citta"] ?></p>
        <p><?php echo $result["km"]."Km" ?></p>

        <div class="container" style="width: 100%">
          <button type="submit" value="Vallelunga" name="Vallelunga"
              class="button hover-red border-white text-white margin-bottom margin-top-40" 
              style="width:70%; font-size: 19px;">
              Gareggia
          </button>
        </div>
      </div>
    </div>
</div>

  
  <div class="container">
    <?php $result = $conn->fetch( $conn->query("select * from pista where nome like '%Autodromo Enzo e Dino Ferrari%'") )?>    
    <div class="card">
      <div class="content">
      <img src="img/piste/planimetraImola.png" class="track">
        <p><?php echo $result["nome"] ?></p>
        <p style="position:absolute; top: 2px; right: 5px;"><?php echo $result["citta"] ?></p>
        <p><?php echo $result["km"]."Km" ?></p>

        <div class="container" style="width: 100%">
          <button type="submit" value="Vallelunga" name="Vallelunga"
              class="button hover-red border-white text-white margin-bottom margin-top-40" 
              style="width:70%; font-size: 19px;">
              Gareggia
          </button>
        </div>
      </div>
       
    </div>
    <!-- <img src="img/piste/autodromoimola.jpg" width="40%" class="margin-top-100"> -->
  </div>
</header>
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
</script>

</body>
</html>