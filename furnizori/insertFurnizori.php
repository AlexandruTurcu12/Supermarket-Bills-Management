<?php

if (isset($_POST['FirmaTransportID']) && isset($_POST['Nume']) && isset($_POST['Strada']) && isset($_POST['Numar']) && 
isset($_POST['Oras']) && isset($_POST['Judet']) && isset($_POST['CodPostal']) && isset($_POST['Telefon']) && isset($_POST['Email'])) {

    $conn = new mysqli('localhost', 'root', '', 'Proiect');

    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	
    $adds['FirmaTransportID'] = $conn->real_escape_string($_POST['FirmaTransportID']);
    $adds['Nume'] = $conn->real_escape_string($_POST['Nume']);
    $adds['Strada'] = $conn->real_escape_string($_POST['Strada']);
    $adds['Numar'] = $conn->real_escape_string($_POST['Numar']);
	$adds['Oras'] = $conn->real_escape_string($_POST['Oras']);
	$adds['Judet'] = $conn->real_escape_string($_POST['Judet']);
	$adds['CodPostal'] = $conn->real_escape_string($_POST['CodPostal']);
	$adds['Telefon'] = $conn->real_escape_string($_POST['Telefon']);
	$adds['Email'] = $conn->real_escape_string($_POST['Email']);

    $sql = "INSERT INTO `Furnizori` (`FirmaTransportID`, `Nume`, `Strada`, `Numar`, `Oras`, `Judet`, `CodPostal`, `Telefon`, `Email`) 
	  VALUES ('". $adds['FirmaTransportID']. "', '". $adds['Nume']. "', '". $adds['Strada']. "', '". $adds['Numar']. "', '". $adds['Oras']. "', 
      '". $adds['Judet']. "', '". $adds['CodPostal']. "', '". $adds['Telefon']. "', '". $adds['Email']. "')"; 

    if ($conn->query($sql) === TRUE) {
      //echo 'Datele au fost adaugate';
      header('Location: furnizori.html');
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