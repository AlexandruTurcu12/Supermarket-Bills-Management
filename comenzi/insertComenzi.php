<?php

if (isset($_POST['ComandaID']) && isset($_POST['MagazinID']) && isset($_POST['FurnizorID']) && isset($_POST['DataPrimire']) && isset($_POST['DataLivrare'])) {

    $conn = new mysqli('localhost', 'root', '', 'Proiect');

    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	
    $adds['ComandaID'] = $conn->real_escape_string($_POST['ComandaID']);
    $adds['MagazinID'] = $conn->real_escape_string($_POST['MagazinID']);
    $adds['FurnizorID'] = $conn->real_escape_string($_POST['FurnizorID']);
	  $adds['DataPrimire'] = $conn->real_escape_string($_POST['DataPrimire']);
	  $adds['DataLivrare'] = $conn->real_escape_string($_POST['DataLivrare']);

    $sql = "INSERT INTO `Comenzi` (`ComandaID`, `MagazinID`, `FurnizorID`, `DataPrimire`, `DataLivrare`) 
	  VALUES ('". $adds['ComandaID']. "', '". $adds['MagazinID']. "', '". $adds['FurnizorID']. "', '". $adds['DataPrimire']. "', '". $adds['DataLivrare']. "')"; 

    if ($conn->query($sql) === TRUE) {
      header('Location: comenzi.html');
    }
    else {
      echo 'Error: '. $conn->error;
    }

    $conn->close();
}
else {
  echo 'Nu sunt date de la formular';
}



?>