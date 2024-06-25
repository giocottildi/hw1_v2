<?php
session_start();

include 'connessione.php';

// Recupero dei dati JSON inviati
$data = json_decode(file_get_contents("php://input"), true);

// Escape delle variabili per evitare SQL injection
$user = mysqli_real_escape_string($conn, $_SESSION['username']);
$idCover = mysqli_real_escape_string($conn, $data['cover_id']);
$title = mysqli_real_escape_string($conn, $data['title']);
$author = mysqli_real_escape_string($conn, $data['author']);
$publishYear = intval($data['publishYear']); // Conversione esplicita a numero intero



// Ottieni l'ID dell'utente
$getUserID = "SELECT id FROM users WHERE username = '$user'";
$result_getUserID = $conn->query($getUserID);

if ($result_getUserID->num_rows > 0) {
    $row = $result_getUserID->fetch_assoc();
    $idUtente = $row['id'];

    // Inserisci il libro salvato nel database
    $sql = "INSERT INTO OL_salvati (id_user, title, cover_id, autore, anno_pubblicazione) 
            VALUES ($idUtente, '$title', '$idCover', '$author', $publishYear)";

    // Esecuzione della query
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Errore: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Nessun utente trovato']);
}

$conn->close();
?>
