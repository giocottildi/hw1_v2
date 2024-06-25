<?php
header('Content-Type: application/json');
session_start();

include 'connessione.php';

// Supponiamo che l'ID utente sia memorizzato nella sessione dopo l'autenticazione
$user_id = $_SESSION['user_id'];

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_lista = $_POST['nome_lista']; // Ottieni il nome della lista dal form

    // Controlla se esiste già una lista con lo stesso nome per lo stesso utente
    $check_sql = "SELECT COUNT(*) AS num_liste FROM libri WHERE user_id = $user_id AND nome_lista = '$nome_lista'";
    $result = mysqli_query($conn, $check_sql);

    if (!$result) {
        die(json_encode(["error" => "Errore nella query: " . mysqli_error($conn)]));
    }

    $row = mysqli_fetch_assoc($result);
    $num_liste = $row['num_liste'];

    if ($num_liste > 0) {
        // Se esiste già una lista con lo stesso nome, l'utente sta modificando una lista esistente
        // Eseguire qui le operazioni per modificare la lista
        $sql = "SELECT titolo FROM titoli_libri";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die(json_encode(["error" => "Errore nella query: " . mysqli_error($conn)]));
        }

        $libri = [];
        while($row = mysqli_fetch_assoc($result)) {
            $libri[] = $row['titolo'];
        }

        $all_selected = true;
        foreach ($libri as $index => $titolo) {
            if (!isset($_POST['libro' . $index])) {
                $all_selected = false;
                break;
            }
        }

        if ($all_selected) {
            foreach ($libri as $index => $titolo) {
                $stato = $_POST['libro' . $index];

                // Controlla se esiste già una risposta per questo libro nella lista specificata
                $check_sql = "SELECT id FROM libri WHERE user_id = $user_id AND titolo = '$titolo' AND nome_lista = '$nome_lista'";
                $result = mysqli_query($conn, $check_sql);

                if (!$result) {
                    die(json_encode(["error" => "Errore nella query: " . mysqli_error($conn)]));
                }

                if (mysqli_num_rows($result) > 0) {
                    // Se esiste già, aggiorna la risposta
                    $update_sql = "UPDATE libri SET stato = '$stato' WHERE user_id = $user_id AND titolo = '$titolo' AND nome_lista = '$nome_lista'";
                    mysqli_query($conn, $update_sql);
                } else {
                    // Altrimenti, inserisci una nuova risposta nella lista specificata
                    $insert_sql = "INSERT INTO libri (titolo, stato, user_id, nome_lista) VALUES ('$titolo', '$stato', $user_id, '$nome_lista')";
                    mysqli_query($conn, $insert_sql);
                }
            }
        } else {
            $error = "E' NECESSARIO SELEZIONARE UN'OPZIONE PER OGNI LIBRO";
        }
    } else {
        // Altrimenti, l'utente sta creando una nuova lista
        $sql = "SELECT titolo FROM titoli_libri";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die(json_encode(["error" => "Errore nella query: " . mysqli_error($conn)]));
        }

        $libri = [];
        while($row = mysqli_fetch_assoc($result)) {
            $libri[] = $row['titolo'];
        }

        $all_selected = true;
        foreach ($libri as $index => $titolo) {
            if (!isset($_POST['libro' . $index])) {
                $all_selected = false;
                break;
            }
        }

        if ($all_selected) {
            foreach ($libri as $index => $titolo) {
                $stato = $_POST['libro' . $index];

                // Inserisci una nuova lista con il nome specificato
                $insert_sql = "INSERT INTO libri (titolo, stato, user_id, nome_lista) VALUES ('$titolo', '$stato', $user_id, '$nome_lista')";
                mysqli_query($conn, $insert_sql);
            }
        } else {
            $error = "E' NECESSARIO SELEZIONARE UN'OPZIONE PER OGNI LIBRO";
        }
    }
}

mysqli_close($conn);

if ($error) {
    echo json_encode(["error" => $error]);
} else {
    echo json_encode(["success" => true]);
}
?>
