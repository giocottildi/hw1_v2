<?php

include 'connessione.php';

// Esegui la query
$sql = "SELECT titolo, numero_uscita, DATE_FORMAT(data_uscita, '%d/%m/%Y') AS data_uscita_format FROM titoli_libri";

//DATE_FORMAT(data_uscita, '%d/%m/%Y') AS data_uscita_format 
// si utilizza per cambiare il formato della data da yyyy/mm/dd a dd/mm/yyyy


$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    // Output dei dati di ogni riga
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 risultati";
}
$conn->close();

// Restituisci i dati in formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>

