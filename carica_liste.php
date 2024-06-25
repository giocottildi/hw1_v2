<?php
header('Content-Type: application/json');
session_start();

include 'connessione.php';

// Supponiamo che l'ID utente sia memorizzato nella sessione dopo l'autenticazione
$user_id = $_SESSION['user_id'];

$query = "SELECT DISTINCT nome_lista FROM libri WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

$liste = [];
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $liste[] = $row;
    }
}

mysqli_close($conn);

echo json_encode($liste);
?>
