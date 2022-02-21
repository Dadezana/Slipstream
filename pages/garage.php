<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="garage.css">
    <link rel="stylesheet" href="../index.css">
    <title>Slipstream | Garage</title>
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
      <a href="pages/garage.php" class="bar-item button" style="color: var(--main-color);">GARAGE</a>
      <a href="piste.php" class="bar-item button">PISTE</a>
      <a href="login.php" class="bar-item button">LOGIN</a>
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
  <a href="pages/garage.php" onclick="closeSidebar()" class="bar-item button" style="color: var(--main-color);">GARAGE</a>
  <a href="#pricing"         onclick="closeSidebar()" class="bar-item button">PISTE</a>
  <a href="login.php"        onclick="closeSidebar()" class="bar-item button">LOGIN</a>
</nav>

<header class="bgimage display-container" id="home">
    <!-- Page content here -->
</header>

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