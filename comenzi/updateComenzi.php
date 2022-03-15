<?php

if (!empty($_POST['ComandaID'])) {

    $conn = new mysqli('localhost', 'root', '', 'Proiect');

    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	
    $adds['ComandaID'] = $conn->real_escape_string($_POST['ComandaID']);
    $adds['DataPrimire'] = $conn->real_escape_string($_POST['DataPrimire']);
	$adds['DataLivrare'] = $conn->real_escape_string($_POST['DataLivrare']);

    if (!empty($_POST['DataPrimire']))
        $sql = "UPDATE Comenzi SET DataPrimire='". $adds['DataPrimire']. "' WHERE ComandaID='". $adds['ComandaID']. "'";
    if (!empty($_POST['DataLivrare']))
        $sql = "UPDATE Comenzi SET DataLivrare='". $adds['DataLivrare']. "' WHERE ComandaID='". $adds['ComandaID']. "'";
    if (!empty($_POST['DataPrimire']) && !empty($_POST['DataLivrare']))
        $sql = "UPDATE Comenzi SET DataPrimire='". $adds['DataPrimire']. "', DataLivrare='". $adds['DataLivrare']. "' WHERE ComandaID='". $adds['ComandaID']. "'";

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