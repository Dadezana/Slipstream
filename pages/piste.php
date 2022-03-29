<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/piste.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script src="https://kit.fontawesome.com/99e3b4866c.js" crossorigin="anonymous"></script>


    <title>Piste | Slipstream</title>
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

<?php
		$sql = "SELECT * FROM pista";
    $reserv_query = $conn->query($sql);
?>

<header class="bgimage display-container" id="home">


<form method="POST" action="garage.php" style="margin-top: 80px;">
  <div class="container">
<?php while($res = $conn->fetch($reserv_query)){ ?>     

    
    <div class="card">
      <div class="content">
      <img class="track" src="<?php echo $res["imgT"];?>">
        <p><?php echo $res["nome"] ?></p>
        <p style="position:absolute; top: 2px; right: 5px;"><?php echo $res["citta"] ?></p>
        <p><?php echo $res["km"]."Km" ?></p>

        <div class="container" style="width: 100%">
          <button type="submit" value="<?php echo $res["nome"];?>" name="subT" onclick="window.location.href='garage.php';"
              class="button hover-red border-white text-white margin-bottom margin-top-40" 
              style="width:70%; font-size: 19px;">
              Gareggia
          </button>
        </div>
        
      </div>
      
    </div>
    


<?php } ?>
  </div>
</form>
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