<?php

if (isset($_POST['Nume'])) {

    $conn = new mysqli('localhost', 'root', '', 'Proiect');

    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	
    $adds['Nume'] = $conn->real_escape_string($_POST['Nume']);

    $sql = "INSERT INTO `Categorii` (`Nume`) VALUES ('". $adds['Nume']. "')"; 

    if ($conn->query($sql) === TRUE) {
      header('Location: categorii.html');
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