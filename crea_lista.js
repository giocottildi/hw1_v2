function erroreFetch(error) {
    console.error('Errore durante la fetch:', error);
}

function inviaForm(event) {
    event.preventDefault();
    const form = document.getElementById('form-liste');
    const nomeListaInput = document.getElementById('nome_lista');
    const formData = new FormData(form);

    // Controlla se il campo nome_lista è compilato
    const nomeListaValue = nomeListaInput.value.trim(); // Rimuove spazi vuoti all'inizio e alla fine
    if (!nomeListaValue) {
        alert('Inserisci un nome per la lista!');
        return;
    }

    fetch('gestione_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Risposta raw da gestione_form.php:', data);
        const jsonData = JSON.parse(data);
        console.log('Risposta JSON da gestione_form.php:', jsonData);
        if (jsonData.error) {
            const errorElement = document.getElementById('error');
            errorElement.style.display = 'block';
            errorElement.innerText = jsonData.error;
        } else {
            document.getElementById('error').style.display = 'none';
            aggiornaListe();
        }
    }, erroreFetch); // Utilizzo della funzione erroreFetch per gestire gli errori
}



// Funzione per aggiornare la lista "letti" che è quella che a inizio sessione (senza form) contiene tutti i libri
function aggiornaLista(idLista, libri) {
    const ul = document.getElementById(idLista);
    ul.innerHTML = '';

    if (libri.length > 0) {
        libri.forEach(titolo => {
            const li = document.createElement('li');
            li.innerText = titolo;
            ul.appendChild(li);
        });
    } else {
        const p = document.createElement('p');
        p.innerText = idLista.includes('letti') ? 'Nessun libro letto' : 'Nessun libro';
        ul.appendChild(p);
    }
}

// Funzione per aggiornare le liste
function aggiornaListe() {
    fetch('query_lista.php', {
        method: 'POST',
        body: new FormData(document.getElementById('form-liste'))
    })
    .then(response => response.json())
    .then(data => {
        console.log('Risposta dalla query_lista.php:', data);
        aggiornaLista('lista-letti', data.libri_letti);
        aggiornaLista('lista-non-letti', data.libri_non_letti);
        aggiornaLista('lista-non-ricordo', data.libri_non_ricordo);
    }, erroreFetch); // Utilizzo della funzione erroreFetch per gestire gli errori
}

// Chiamata iniziale per popolare le liste al caricamento della pagina
aggiornaListe();



function errorePopola(error) {
    console.log('Errore nel recupero dei libri:', error); // Aggiunta della stampa dell'errore qui
}

function popolaLibri() {
    fetch('fetch_books.php')
    .then(response => {
        console.log('fetch_books.php response:', response);
        return response.json();
    })
    .then(libri => {
        console.log('Libri:', libri);
        const libriList = document.getElementById('libri-list');
        libri.forEach((titolo, index) => {
            const div = document.createElement('div');
            div.className = 'uscita-opzioni';

            const label = document.createElement('label');
            label.className = 'titolo-uscita';
            label.innerText = titolo;
            div.appendChild(label);

            ['letti', 'non_letti', 'non_ricordo'].forEach(stato => {
                const input = document.createElement('input');
                input.type = 'radio';
                input.name = `libro${index}`;
                input.value = stato;
                div.appendChild(input);
            });

            libriList.appendChild(div);
        });
    }, errorePopola); // Utilizzo della funzione errorePopola per gestire gli errori
}


// Chiamata iniziale per popolare le liste al caricamento della pagina
aggiornaListe();
popolaLibri();

// Aggiungi un event listener al bottone "Crea lista"
const submitButton = document.getElementById('submit-lista');
submitButton.addEventListener('click', inviaForm);











function erroreListe(error) {
    console.error('Errore nel caricamento delle liste:', error); // Aggiunta della stampa dell'errore qui
}

function caricaListe() {
    fetch('carica_liste.php')
    .then(response => response.json())
    .then(data => {
        const tableBody = document.getElementById('table-body');
        tableBody.innerHTML = '';

        data.forEach(lista => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${lista.nome_lista}</td>
                <td><button onclick="visualizzaDettagli('${lista.nome_lista}')">Visualizza</button></td>
            `;
            tableBody.appendChild(row);
        });
    }, erroreListe); // Utilizzo della funzione erroreListe per gestire gli errori
}


function erroreDettagliLista(error) {
    console.error('Errore durante la fetch:', error);
    console.error('Errore nel caricamento dei valori della lista:', error); // Aggiunta della stampa dell'errore qui
}

function visualizzaDettagli(nomeLista) {
    console.log('Visualizza dettagli per lista:', nomeLista);
    fetch(`visualizza_valori_lista.php?nome_lista=${encodeURIComponent(nomeLista)}`)
    .then(response => response.json())
    .then(data => {
        console.log('Valori della lista:', data);
        const dettagliLista = document.getElementById('dettagli-lista');
        dettagliLista.innerHTML = `<h3>Nome della lista: ${nomeLista}</h3>`;
        
        if (data.length > 0) {
            data.forEach(libro => {
                dettagliLista.innerHTML += `
                    <div>
                        <strong>Titolo:</strong> ${libro.titolo}<br>
                        <strong>Stato:</strong> ${libro.stato}<br>
                    </div>
                    <hr>
                `;
            });
        } else {
            dettagliLista.innerHTML += '<p>Nessun libro presente in questa lista.</p>';
        }
    }, erroreDettagliLista); // Utilizzo della funzione erroreDettagliLista per gestire gli errori
}


// Chiamata iniziale per caricare le liste al caricamento della pagina
caricaListe();
