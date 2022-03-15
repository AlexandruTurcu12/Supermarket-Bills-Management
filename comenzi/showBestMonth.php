<html>
<head>
        <meta charset="utf-8">
        <title>Cea mai ocupata luna</title>
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

    if (isset($_POST['Nume'])) {
$conn = new mysqli('localhost', 'root', '', 'Proiect');

if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

	$adds['Nume'] = $conn->real_escape_string($_POST['Nume']);

$sql = "SELECT MONTH(C.DataLivrare) as Luna FROM Comenzi C GROUP BY MONTH(C.DataLivrare) HAVING COUNT(Luna) =
(SELECT MAX(Luna) as maxim FROM (SELECT COUNT(C2.DataLivrare) as Luna FROM Comenzi C2 JOIN Magazine M WHERE
C2.MagazinID = M.MagazinID AND M.Nume = '". $adds['Nume']. "' GROUP BY MONTH(C2.DataLivrare)) as Luna)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '<br /> <br /> Luna cu cele mai multe comenzi este: ';
    if($row['Luna'] == 1)
        echo 'ianuarie';
    if($row['Luna'] == 2)
        echo 'februarie';
    if($row['Luna'] == 3)
        echo 'martie';
    if($row['Luna'] == 4)
        echo 'aprilie';
    if($row['Luna'] == 5)
        echo 'mai';
    if($row['Luna'] == 6)
        echo 'iunie';
    if($row['Luna'] == 7)
        echo 'iulie';
    if($row['Luna'] == 8)
        echo 'august';
    if($row['Luna'] == 9)
        echo 'septembrie';
    if($row['Luna'] == 10)
        echo 'octombrie';
    if($row['Luna'] == 11)
        echo 'noiembrie';
    if($row['Luna'] == 12)
        echo 'decembrie';
    }
}
else {
  echo '0 results';
}

$conn->close();
}
?>
</p>