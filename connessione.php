<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hw1";

// Creazione connessione
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Controllo connessione
if (!$conn) {
    die(json_encode(["error" => "Connessione fallita: " . mysqli_connect_error()]));
}
?>
