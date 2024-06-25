<?php

session_start();

include 'connessione.php';


$sql = "SELECT titolo FROM titoli_libri";
$result = $conn->query($sql);

$options = '';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['titolo'] . '">' . $row['titolo'] . '</option>';
    }
} else {
    $options = '<option value="">Nessun libro trovato</option>';
}


$conn->close();


echo $options;
?>
