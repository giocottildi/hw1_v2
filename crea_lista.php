<?php
session_start();
include 'menu.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Opzioni Lista</title>
    <link rel="stylesheet" href="crea_lista.css">
    <script src="crea_lista.js" defer></script>
</head>
<body>

<section id="page-lista">
    <div id="titolo">Compila questo form ed ottieni la tua sherlock-lista!</div>
    <div id="lista-form">
        <div class="lista">
            <form method="post" id="form-liste">
                <div class="flex-campo">

                    <div class="campi-uscita-titolo"><label>Titolo</label></div>
                    <div class="campi-uscita"><label>Letto</label></div>
                    <div class="campi-uscita"><label>Non letto</label></div>
                    <div class="campi-uscita"><label>Non ricordo</label></div>
                </div>
                <br>
                <div id="libri-list"></div>
                <div class="form-group">
                    <label for="nome_lista" id="label-nome-lista" id="nome_lista" name="nome_lista" placeholder="Inserisci il nome della lista">Nome Lista:</label>
                    <input type="text" id="nome_lista" name="nome_lista">
                </div>
                <input id="submit-lista" type="submit" value="Crea lista">
            </form>

            <div id="error" class="error" style="display:none;"></div>
        </div>
    </div>
</section>

<section id="tripla-lista">
    <div id="triplo-flex">
        <div id="libri-letti">
            <div class="info-lista"><h1>Libri letti</h1></div>
            <ul id="lista-letti"></ul>
        </div>
        <div id="libri-non-letti">
            <div class="info-lista"><h1>Libri non letti</h1></div>
            <ul id="lista-non-letti"></ul>
        </div>
        <div id="libri-non-ricordo">
            <div class="info-lista"><h1>Libri che non ricordo</h1></div>
            <ul id="lista-non-ricordo"></ul>
        </div>
    </div>
</section>
<section id="tabella">
    <h2>Liste create dall'utente</h2>

    <!-- Tabella delle liste -->
    <table>
        <thead>
            <tr>
                <th>Nome Lista</th>
                <th>Visualizza Dettagli</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <!-- Qui verranno aggiunti dinamicamente i dati delle liste -->
        </tbody>
    </table>

    <!-- Div per visualizzare dettagli della lista -->
    <div id="dettagli-lista" class="dettagli-lista">
        Seleziona una lista per visualizzare i dettagli
    </div>
</section>
</body>
</html>
