<html>
<body>
<?php

// definizione variabili di collegamento

$user = "root";
$psw = "";
$host  = "127.0.0.1";
$database = "slipstream";

// connessione a mysql e contestualmente al database da utilizzare
$conn=mysqli_connect($host, $user, $psw, $database) or die (mysqli_connect_error());

// creazione interrogazione sql per visualizazzione tabella impiegati
$sql = "SELECT * FROM utenti";

// esecuzione interrogazione sql
$query = mysqli_query($_conn,$sql)or die ("Errore nell'esecuzione della query sulla tabella impiegati");

// visualizza il contenuto della tabella Impiegati
 echo "<table width='70%' border='2' bgcolor='orange'>";
 echo "<CAPTION> Contenuto tabella Utenti </CAPTION> ";
 echo "<tr>";
 echo "<td>".'username'."<td>".'password'."<td>";
 echo "</tr>";
 while($row = mysqli_fetch_assoc($query))
   { 
   echo "<tr>";
     echo "<td>".$row['username']."<td>".$row['password'];
   echo "</tr>"; 
   }
echo "</table>"; 
echo "<br>";
echo "<a href='Menu.html'>Torna al menu'</a>";
?>
</body>
</html>