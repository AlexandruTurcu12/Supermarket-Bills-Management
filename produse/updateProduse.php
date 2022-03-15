<?php

if (!empty($_POST['Nume'])) {

    $conn = new mysqli('localhost', 'root', '', 'Proiect');

    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	
    $adds['Nume'] = $conn->real_escape_string($_POST['Nume']);
	$adds['Pret'] = $conn->real_escape_string($_POST['Pret']);

    if (!empty($_POST['Pret']))
        $sql = "UPDATE Produse SET Pret='". $adds['Pret']. "' WHERE Nume='". $adds['Nume']. "'";

    if ($conn->query($sql) === TRUE) {
      header('Location: produse.html');
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