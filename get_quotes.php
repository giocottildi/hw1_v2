<?php
include 'connessione.php';

// Query per ottenere una quote casuale
$sql = "SELECT actual_quote, quote_cit FROM quotes ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data della singola quote
    $row = $result->fetch_assoc();
    echo json_encode(['quote' => $row['actual_quote'], 'cit_quote' => $row['quote_cit']]);
} else {
    echo json_encode(['quote' => 'Nessuna quote trovata', 'cit_quote' => '']);
}

$conn->close();
?>