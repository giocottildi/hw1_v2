<?php
header('Content-Type: application/json');
session_start();

include 'connessione.php';

// Supponiamo che l'ID utente sia memorizzato nella sessione dopo l'autenticazione
$user_id = $_SESSION['user_id'];

// Inizializzazione delle variabili delle query
$query_letti = "SELECT DISTINCT titolo FROM libri WHERE stato = 'letti' AND user_id = $user_id";
$query_non_letti = "SELECT DISTINCT titolo FROM libri WHERE stato = 'non_letti' AND user_id = $user_id";
$query_non_ricordo = "SELECT DISTINCT titolo FROM libri WHERE stato = 'non_ricordo' AND user_id = $user_id";

// Se è stato inviato il parametro nome_lista, aggiungi il filtro alla query
if (isset($_POST['nome_lista'])) {
    $nome_lista = mysqli_real_escape_string($conn, $_POST['nome_lista']);
    $query_letti .= " AND nome_lista = '$nome_lista'";
    $query_non_letti .= " AND nome_lista = '$nome_lista'";
    $query_non_ricordo .= " AND nome_lista = '$nome_lista'";
}

// Esegui le query
$libri_letti = [];
$result_letti = mysqli_query($conn, $query_letti);
if ($result_letti) {
    while ($row = mysqli_fetch_assoc($result_letti)) {
        $libri_letti[] = $row['titolo'];
    }
} else {
    die(json_encode(["error" => mysqli_error($conn)]));
}

$libri_non_letti = [];
$result_non_letti = mysqli_query($conn, $query_non_letti);
if ($result_non_letti) {
    while ($row = mysqli_fetch_assoc($result_non_letti)) {
        $libri_non_letti[] = $row['titolo'];
    }
} else {
    die(json_encode(["error" => mysqli_error($conn)]));
}

$libri_non_ricordo = [];
$result_non_ricordo = mysqli_query($conn, $query_non_ricordo);
if ($result_non_ricordo) {
    while ($row = mysqli_fetch_assoc($result_non_ricordo)) {
        $libri_non_ricordo[] = $row['titolo'];
    }
} else {
    die(json_encode(["error" => mysqli_error($conn)]));
}

mysqli_close($conn);

// Restituisci i libri come JSON
echo json_encode([
    "libri_letti" => $libri_letti,
    "libri_non_letti" => $libri_non_letti,
    "libri_non_ricordo" => $libri_non_ricordo
]);
?>
