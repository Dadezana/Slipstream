<!DOCTYPE html>
<html>
<title>Slipstream | Home</title>
<link rel="icon" href="img/logoIcon.png" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src="https://kit.fontawesome.com/99e3b4866c.js" crossorigin="anonymous"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="index.css">
<body>

<!-- Navbar (sit on top) -->
<div class="top">
  <div class="bar white card" id="myNavbar">
    <!-- <a href="#home" class="bar-item button wide"> </a>-->
    
    <div class="left" style="display:block; width:fit-content; display:flex;">
      <img src="img/logoS.png" style="height: 48px;">
      <h4 style="color: rgb(228, 6, 6)">Slipstream</h4>
    </div>
    

    <!-- Right-sided navbar links -->
    <div class="right hide-small">
    <a href="index.php" class="bar-item button" style="color: var(--main-color);">HOME</a>
      <a href="pages/garage.php" class="bar-item button">GARAGE</a>
      <a href="pages/piste.php" class="bar-item button">PISTE</a>
      <?php
        session_start();
        if(!isset($_SESSION["user"])){
          echo "<a href=\"pages/login.php\" class=\"bar-item button\">LOGIN</a>";
        }else{
          $user = $_SESSION["user"];
          echo "<a href=\"pages/admin.php\" class=\"bar-item button\">$user<i style=\"margin-left: 5px\" class=\"fas fa-user-circle\"></i></a>";
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
  <a href="index.php"        onclick="closeSidebar()" class="bar-item button" style="color: var(--main-color);">HOME</a>
  <a href="pages/garage.php" onclick="closeSidebar()" class="bar-item button">GARAGE</a>
  <a href="pages/piste.php"  onclick="closeSidebar()" class="bar-item button">PISTE</a>
  <?php
        session_start();
        if(!isset($_SESSION["user"])){
          echo "<a href=\"pages/login.php\" class=\"bar-item button\" onclick=\"closeSidebar()\">LOGIN</a>";
        }else{
          $user = $_SESSION["user"];
          echo "<a href=\"pages/admin.php\" class=\"bar-item button\" onclick=\"closeSidebar()\">$user</a>";
        }
	?>
</nav>

<!-- Header with full-height image -->
<header class="bgimage display-container" id="home">
  <div class="display-left text-white" style="padding:48px">
    <span class="jumbo hide-small">La migliore esperienza di guida</span><br>
    <span class="xxlarge hide-large hide-medium">Start something that matters</span><br>
    <span class="large">Guida una supercar in pista e diventa un vero pilota per un giorno!</span>
    
    <p><a href="pages/garage.php" class="button padding-large large margin-top hover-red border-white">Scendi in pista</a></p>
  </div> 
  <div class="display-bottomleft text-grey large" style="padding:24px 48px">
    <i class="fa fa-facebook-official hover-opacity"></i>
    <i class="fa fa-instagram hover-opacity"></i>
    <i class="fa fa-twitter hover-opacity"></i>
  </div>
</header>

<!-- About Section -->
 
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
