<html>
<head>
        <meta charset="utf-8">
        <title>Categorii</title>
        <link rel="stylesheet" href="stilMeniu.css">
        <style>
            p {text-align: center; font-family:Arial, Helvetica, sans-serif;}
          </style>
</head>
<body style="background-color:whitesmoke">
    <nav>
        <ul>
            <li><a href="../meniu.html">Meniu</a></li>
            <li><a href="../comenzi/comenzi.html">Comenzi</a></li>
            <li><a href="../magazine/magazine.html">Magazine</a></li>
            <li><a href="../furnizori/furnizori.html">Furnizori</a></li>
            <li><a href="../firme/firme.html">Firme de transport</a></li>
            <li><a href="../produse/produse.html">Produse</a></li>
            <li><a href="categorii.html">Categorii</a></li>
        </ul>
    </nav>
        
</body>
</html>

<p>
<?php

$conn = new mysqli('localhost', 'root', '', 'Proiect');

if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

$sql = "SELECT C.Nume FROM Categorii C WHERE NOT EXISTS (SELECT * FROM Produse P WHERE C.CategorieID = P.CategorieID)"; 

$result = $conn->query($sql);

echo '<br />';
echo '<b>Categoriile fara produse sunt:</b>';
echo '<br />';

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '<br />'. $row['Nume'];
  }
}
else {
  echo '0 results';
}

$conn->close();
?>
</p>