<?php
session_start();

include 'connessione.php';

// Recupero dei dati JSON inviati
$data = json_decode(file_get_contents("php://input"), true);

// Escape delle variabili per evitare SQL injection
$user = mysqli_real_escape_string($conn, $_SESSION['username']);
$idCover = mysqli_real_escape_string($conn, $data['cover_id']);
$title = mysqli_real_escape_string($conn, $data['title']);

// Ottieni l'ID dell'utente
$getUserID = "SELECT id FROM users WHERE username = '$user'";
$result_getUserID = $conn->query($getUserID);

if ($result_getUserID->num_rows > 0) {
    $row = $result_getUserID->fetch_assoc();
    $idUtente = $row['id'];

    // Elimina il libro salvato dal database
    $sql = "DELETE FROM OL_salvati 
            WHERE id_user = $idUtente 
            AND title = '$title' 
            AND cover_id = '$idCover'";

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
