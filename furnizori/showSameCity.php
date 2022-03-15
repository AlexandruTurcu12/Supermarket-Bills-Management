<html>
<head>
        <meta charset="utf-8">
        <title>Furnizori</title>
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
            <li><a href="../comenzi/comenzi.html">Comenzi</a></li>
            <li><a href="../magazine/magazine.html">Magazine</a></li>
            <li><a href="furnizori.html">Furnizori</a></li>
            <li><a href="../firme/firme.html">Firme de transport</a></li>
            <li><a href="../produse/produse.html">Produse</a></li>
            <li><a href="../categorii/categorii.html">Categorii</a></li>
        </ul>
    </nav>
</body>
</html>

<p>
<?php

    if (isset($_POST['Oras']) && isset($_POST['Judet'])) {
$conn = new mysqli('localhost', 'root', '', 'Proiect');

if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

	$adds['Oras'] = $conn->real_escape_string($_POST['Oras']);
	$adds['Judet'] = $conn->real_escape_string($_POST['Judet']);

$sql = "SELECT Furnizori.Nume, Furnizori.Oras, Furnizori.Judet FROM `Furnizori` JOIN `FirmeTransport` ON 
(Furnizori.FirmaTransportID = FirmeTransport.FirmeTransportID) AND
('". $adds['Oras']. "' = Furnizori.Oras) AND ('". $adds['Judet']. "' = Furnizori.Judet) AND
(Furnizori.Oras = FirmeTransport.Oras) AND (Furnizori.Judet = FirmeTransport.Judet)"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table class=center border='2'>";
  echo"<tr><th>Nume</th><th>Oras</th><th>Judet</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['Nume']}</td><td>{$row['Oras']}</td><td>{$row['Judet']}</td></tr>";
    }
}
else {
  echo '0 results';
}

$conn->close();
}
?>
</p>