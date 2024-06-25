<?php
session_start();

include 'connessione.php';

$user = mysqli_real_escape_string($conn, $_SESSION['username']);

$getUserID = "SELECT id FROM users WHERE username = '$user'";
$result_getUserID = $conn->query($getUserID);

if ($result_getUserID->num_rows > 0) {
    $row = $result_getUserID->fetch_assoc();
    $idUtente = $row['id'];

    $sql = "SELECT title, cover_id, autore, anno_pubblicazione 
            FROM OL_salvati 
            WHERE id_user = $idUtente";
            
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $books = array();
        while($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
        echo json_encode(['success' => true, 'books' => $books]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Nessun libro salvato trovato']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Nessun utente trovato']);
}

$conn->close();
?>
