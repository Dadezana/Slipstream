<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/garage.css">
    <!-- <link rel="stylesheet" href="../index.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    /> -->
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
<nav class="sidebar bar-block black card1 animate-left hide-medium hide-large" style="display:none" id="mySidebar">
  <a href="../index.php"     onclick="closeSidebar()" class="bar-item button">HOME</a>
  <a href="#team"            onclick="closeSidebar()" class="bar-item button">TEAM</a>
  <a href="pages/garage.php" onclick="closeSidebar()" class="bar-item button" style="color: var(--main-color);">GARAGE</a>
  <a href="#pricing"         onclick="closeSidebar()" class="bar-item button">PISTE</a>
  <a href="login.php"        onclick="closeSidebar()" class="bar-item button">LOGIN</a>
</nav>


<?php
  require "../db.php";

  $conn = new DB;

  if(!$conn->connect()){
    echo "<script>console.log('Failed to connect to db')</script>";
  }

  $result = $conn->query("select * from auto");

  if(mysqli_num_rows($result) >= 1){
    $result = $conn->fetch();
    // echo "<script>console.log('$result')</script>";
  }else{
    echo "<script>console.log('no data found')</script>";
  }
?>


<header class="bgimage display-container margin-top-50" id="home">

  <div class="car-container">
    <div class="imgContainer">
      <img class="garageCar" src="img/garage/ferrari488.png" style="width: 576px">
      <img class="garageCar" src="img/garage/ferrari488back.png" style="width: 576px">
    </div>
  
    <div class="container">
      <div class="card">
      <?php $result = $conn->fetch( $conn->query("select * from auto where modello LIKE 'Ferrari 488'") ); ?>
      
      <div class="container" style="width: 100%">
        <h2 class="text-white"><?php echo $result["modello"]; ?></h2>
        <h5 class="text-white margin-bottom"><?php echo $result["pista"]; ?></h4>
      </div>
      

        <div class="content">
            <p id="info2">Potenza</p>
            <p id="value2"><?php echo $result["potenza"]."cv" ?></p>  <!-- cavalli -->
        </div>

        <div class="content">
            <p id="info3">Coppia</p>
            <p id="value3"><?php echo $result["coppia"]."Nm" ?></p> <!-- Newton metro -->
        </div>

        <div class="content">
            <p id="info4">Freni</p>
            <p id="value4"><?php echo $result["freni"]."m" ?></p> <!-- Metri. Calcolati andando a 100km/h -->
        </div>

        <div class="content">
            <p id="info5">Cilindrata</p>
            <p id="value5"><?php echo $result["cilindrata"]."cc" ?></p> <!-- Centimetri cubici -->
        </div>

        <div class="content">
            <p id="info5">Peso</p>
            <p id="value5"><?php echo $result["peso"]."Kg" ?></p> <!-- Kilogrammi -->
        </div>

        <div class="content">
            <p id="info5">Colore</p>
            <p id="value5"><?php echo $result["colore"] ?></p> 
        </div>

        <div class="container" style="width: 100%">

          <button type="submit" value="ferrari488" name="ferrari488"
              class="button hover-red border-white text-white margin-bottom margin-top-50" 
              style="width:70%; font-size: 19px;">
              Gareggia
          </button>

          
        </div>
        

      </div>
    </div>
  </div>

<!-- CAR 2 -->
  <div class="car-container">
  
    <div class="container">
      <div class="card">
        <?php $result = $conn->fetch( $conn->query("select * from auto where modello LIKE 'Audi R8'") ); ?>
      
        <div class="container" style="width: 100%">
          <h2 class="text-white"><?php echo $result["modello"]; ?></h2>
          <h5 class="text-white margin-bottom"><?php echo $result["pista"]; ?></h4>
        </div>
      
        <div class="content">
            <p id="info2">Potenza</p>
            <p id="value2"><?php echo $result["potenza"]."cv" ?></p>  <!-- cavalli -->
        </div>

        <div class="content">
            <p id="info3">Coppia</p>
            <p id="value3"><?php echo $result["coppia"]."Nm" ?></p> <!-- Newton metro -->
        </div>

        <div class="content">
            <p id="info4">Freni</p>
            <p id="value4"><?php echo $result["freni"]."m" ?></p> <!-- Metri. Calcolati andando a 100km/h -->
        </div>

        <div class="content">
            <p id="info5">Cilindrata</p>
            <p id="value5"><?php echo $result["cilindrata"]."cc" ?></p> <!-- Centimetri cubici -->
        </div>

        <div class="content">
            <p id="info5">Peso</p>
            <p id="value5"><?php echo $result["peso"]."Kg" ?></p> <!-- Kilogrammi -->
        </div>

        <div class="content">
            <p id="info5">Colore</p>
            <p id="value5"><?php echo $result["colore"] ?></p> 
        </div>

        <div class="container" style="width: 100%">

          <button type="submit" value="ferrari488" name="ferrari488"
              class="button hover-red border-white text-white margin-bottom margin-top-50" 
              style="width:70%; font-size: 19px;">
              Gareggia
          </button>

          
        </div>
        

      </div>
    </div> <!-- Card -->

    <div class="imgContainer">
      <img class="garageCar" src="img/garage/ferrari488.png" style="width: 576px">
      <img class="garageCar" src="img/garage/ferrari488back.png" style="width: 576px">
    </div>

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