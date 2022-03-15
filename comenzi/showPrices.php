<html>
<head>
        <meta charset="utf-8">
        <title>Comenzi</title>
        <link rel="stylesheet" href="stilMeniu.css">
        <style>
            p {text-align: center; font-family:Arial, Helvetica, sans-serif;}
            table, td, th {  
                border: 1px solid #ddd;
                text-align: center;
                left: 50%;
            }
            table {
                border-collapse: collapse;
            }
            table.center {
                margin-left: auto; 
                margin-right: auto;
            }
            th, td {
                padding: 15px;
            }
            th {
                background-color: #0000FF;
                color: white;
            }
</style>
</head>
<body style="background-color:whitesmoke">
    <nav>
        <ul>
            <li><a href="../meniu.html">Meniu</a></li>
            <li><a href="comenzi.html">Comenzi</a></li>
            <li><a href="../magazine/magazine.html">Magazine</a></li>
            <li><a href="../furnizori/furnizori.html">Furnizori</a></li>
            <li><a href="../firme/firme.html">Firme de transport</a></li>
            <li><a href="../produse/produse.html">Produse</a></li>
            <li><a href="../categorii/categorii.html">Categorii</a></li>
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
 
$sql = "SELECT C.ComandaID, SUM(P.Pret * CP.Cantitate) AS Pret FROM Comenzi C JOIN ComenziProduse CP ON C.ComandaID = CP.ComandaID
JOIN Produse P ON P.ProdusID = CP.ProdusID GROUP BY C.ComandaID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table class=center border='2'>";
  echo"<tr><th>ID Comanda</th><th>Pretul comenzii</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['ComandaID']}</td><td>{$row['Pret']}</td></tr>";
  }
}
else {
  echo '0 results';
}

$conn->close();
?>
</p>