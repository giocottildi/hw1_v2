<?php
header('Content-Type: application/json');
session_start();

include 'connessione.php';

// Supponiamo che l'ID utente sia memorizzato nella sessione dopo l'autenticazione
$user_id = $_SESSION['user_id'];
$nome_lista = $_GET['nome_lista']; // Recupera il parametro nome_lista dalla richiesta GET

// Query per ottenere i libri della lista specificata
$query = "SELECT titolo, stato FROM libri WHERE nome_lista = '$nome_lista' AND user_id = $user_id";

$result = mysqli_query($conn, $query);
if (!$result) {
    die(json_encode(["error" => "Errore nella query: " . mysqli_error($conn)]));
}

$libri = [];
while ($row = mysqli_fetch_assoc($result)) {
    $libro = [
        "titolo" => $row['titolo'],
        "stato" => $row['stato']
    ];
    $libri[] = $libro;
}

mysqli_close($conn);

echo json_encode($libri);
?>
