<?php

if (isset($_POST['CategorieID']) && isset($_POST['Nume']) && isset($_POST['Pret'])) {

    $conn = new mysqli('localhost', 'root', '', 'Proiect');

    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	
    $adds['CategorieID'] = $conn->real_escape_string($_POST['CategorieID']);
    $adds['Nume'] = $conn->real_escape_string($_POST['Nume']);
    $adds['Pret'] = $conn->real_escape_string($_POST['Pret']);
	  
    $sql = "INSERT INTO `Produse` (`CategorieID`, `Nume`, `Pret`) 
	  VALUES ('". $adds['CategorieID']. "', '". $adds['Nume']. "', '". $adds['Pret']. "')"; 

    if ($conn->query($sql) === TRUE) {
      //echo 'Datele au fost adaugate';
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