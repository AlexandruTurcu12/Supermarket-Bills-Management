<?php

if (!empty($_POST['Nume'])) {

    $conn = new mysqli('localhost', 'root', '', 'Proiect');

    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	
    $adds['Nume'] = $conn->real_escape_string($_POST['Nume']);
	$adds['Telefon'] = $conn->real_escape_string($_POST['Telefon']);
	$adds['Email'] = $conn->real_escape_string($_POST['Email']);

    if (!empty($_POST['Telefon']))
        $sql = "UPDATE Magazine SET Telefon='". $adds['Telefon']. "' WHERE Nume='". $adds['Nume']. "'";
    if (!empty($_POST['Email']))
        $sql = "UPDATE Magazine SET Email='". $adds['Email']. "' WHERE Nume='". $adds['Nume']. "'";
    if (!empty($_POST['Telefon']) && !empty($_POST['Email']))
        $sql = "UPDATE Magazine SET Telefon='". $adds['Telefon']. "', Email='". $adds['Email']. "' WHERE Nume='". $adds['Nume']. "'";

    if ($conn->query($sql) === TRUE) {
      header('Location: magazine.html');
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