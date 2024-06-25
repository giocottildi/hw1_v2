<?php
header('Content-Type: application/json');

include 'connessione.php';

$sql = "SELECT titolo FROM titoli_libri";
$result = mysqli_query($conn, $sql);

$libri = [];
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $libri[] = $row['titolo'];
    }
}

mysqli_close($conn);

echo json_encode($libri);
?>
