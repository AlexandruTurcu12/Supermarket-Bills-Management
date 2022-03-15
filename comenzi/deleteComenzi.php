<?php

if (isset($_POST['ComandaID'])) {

    $conn = new mysqli('localhost', 'root', '', 'Proiect');

    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	
    $adds['ComandaID'] = $conn->real_escape_string($_POST['ComandaID']);

    $sql = "DELETE FROM Comenzi WHERE ComandaID='". $adds['ComandaID']. "'";

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