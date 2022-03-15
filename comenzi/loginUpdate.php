<?php

if (isset($_POST['Username']) && isset($_POST['Parola'])) {

    $conn = new mysqli('localhost', 'root', '', 'Proiect');

    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	
    $adds['Username'] = $conn->real_escape_string($_POST['Username']);
    $adds['Parola'] = $conn->real_escape_string($_POST['Parola']);

    $sql = "SELECT Username, Parola FROM `Login` WHERE Username='". $adds['Username']. "' AND Parola='". $adds['Parola']. "'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      header('Location: updateComenzi.html');
    }
    else {
      echo 'Nu se poate realiza operatia, deoarece utilizatorul nu este admin!';
    }

    $conn->close();
}
else {
  echo 'Nu sunt date de la formular';
}

?>