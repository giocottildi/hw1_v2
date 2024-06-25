
//Cambiamento dinamico dell'altezza dell'header

function toggleHeaderPosition() {
  const header = document.querySelector('header');
  const sh_img = document.querySelector('.flex-item2 a img');
  if (window.scrollY > 0) {
      header.style.position = 'fixed';
      header.style.top = '0';
      header.style.height = '80px'; // New height when scrolling
      sh_img.style.width = '100%';
      sh_img.style.height = '50%';
  } else {
      header.style.position = 'static';
      header.style.height = '120px'; // Default height
      sh_img.style.width = '100%';
      sh_img.style.height = '100%';
  }
}

window.addEventListener('scroll', toggleHeaderPosition);


// Gestione di apertura e chiusura MENU PER COLLEGAMENTI NELLA STESSA PAGINA

function unvediMenu(event)
{
    console.log('Chiudi menu');
    const chiudiMenu = event.currentTarget;
    chiudiMenu.removeEventListener('click', unvediMenu);

    const chiudiSubMenu = document.querySelector('#container-menu');

    chiudiSubMenu.classList.add('hidden');
    const apriMenu = document.querySelector('#menu img');
    apriMenu.addEventListener('click', vediMenu);
}



function vediMenu(event)
{
    console.log('Apri menu');
    const apriMenu = event.currentTarget;
    apriMenu.removeEventListener('click', vediMenu);

    const apriSubMenu = document.querySelector('#container-menu');

    apriSubMenu.classList.remove('hidden');
    const chiudiMenu = document.querySelector('#menu img');
    chiudiMenu.addEventListener('click', unvediMenu);
}
const apriMenu = document.querySelector('#menu img');
apriMenu.addEventListener('click', vediMenu);


// Gestione di apertura e chiusura MY ACCOUNT

function unvediMyAccount(event)
{
    console.log('Chiudi account');
    const chiudiMyAccount = event.currentTarget;
    chiudiMyAccount.removeEventListener('click', unvediMyAccount);

    const chiudiSubMyAccount = document.querySelector('#container-account');

    chiudiSubMyAccount.classList.add('hidden');
    const apriMyAccount = document.querySelector('#account h1');
    apriMyAccount.addEventListener('click', vediMyAccount);
}



function vediMyAccount(event)
{
    console.log('Apri account');
    const apriMyAccount = event.currentTarget;
    apriMyAccount.removeEventListener('click', vediMyAccount);

    const apriSubMyAccount = document.querySelector('#container-account');

    apriSubMyAccount.classList.remove('hidden');
    const chiudiMyAccount = document.querySelector('#account h1');
    chiudiMyAccount.addEventListener('click', unvediMyAccount);
}
const apriMyAccount = document.querySelector('#account h1');
apriMyAccount.addEventListener('click', vediMyAccount);


// utilizzo di addEventListener e modifica dinamica di una img tramite src

function cambiaImmaginedx()
{
    const image_dx = document.querySelector('.magazine a img');
    
    if(image_dx.src.includes('img/libri.jpg')){
        image_dx.src = 'img/uscita1.png';
    }else if(image_dx.src.includes('img/uscita1.png')){
        image_dx.src = 'img/uscita2.png';
    }
    else if(image_dx.src.includes('img/uscita2.png')){
        image_dx.src = 'img/uscita3.png';
    }
    else if(image_dx.src.includes('img/uscita3.png')){
        image_dx.src = 'img/libri.jpg';
    }
    // console.log(image.src);
    console.log('cambio dx effettuato!');
    image_dx.removeEventListener('click', cambiaImmaginedx);
}

const image_dx = document.querySelector('#right-arrow');
image_dx.addEventListener('click', cambiaImmaginedx);


function cambiaImmaginesx()
{
    const image_sx = document.querySelector('.magazine a img');
    
    if(image_sx.src.includes('img/libri.jpg')){
        image_sx.src = 'img/uscita3.png';
    }
    else if(image_sx.src.includes('img/uscita3.png')){
        image_sx.src = 'img/uscita2.png';
    }
    else if(image_sx.src.includes('img/uscita2.png')){
        image_sx.src = 'img/uscita1.png';
    }
    else if(image_sx.src.includes('img/uscita1.png')){
        image_sx.src = 'img/libri.jpg';
    }
    // console.log(image.src);
    console.log('cambio sx effettuato!');
    image_sx.removeEventListener('click', cambiaImmaginesx);
}

const image_sx = document.querySelector('#left-arrow');
image_sx.addEventListener('click', cambiaImmaginesx);

// Utilizzo di modifica dinamica del display + utilizzo di classList

function unvediUscite(event)
{
    // console.log('Chiudi');
    const chiudi = event.currentTarget;
    chiudi.removeEventListener('click', unvediUscite);

    const chiudiUscite = document.querySelector('#nascosto');

    chiudiUscite.classList.add('hidden');
    const apri = document.querySelector('.uscite a');
    apri.addEventListener('click', vediUscite);
}



function vediUscite(event)
{
    const apri = event.currentTarget;
    apri.removeEventListener('click', vediUscite);

    const apriUscite = document.querySelector('#nascosto');

    apriUscite.classList.remove('hidden');
    const chiudi = document.querySelector('.uscite a');
    chiudi.addEventListener('click', unvediUscite);
}
const apri = document.querySelector('.uscite a');
apri.addEventListener('click', vediUscite);




// uso di document.createElement() + data-*

function sfida(event){
    const new_h1 = document.createElement('h1');
    new_h1.textContent = 'MPH! Non credevo avresti accettato, hai del fegato! Questo è il primo passo per diventare un detective!';
    const new_img = document.createElement('img');
    new_img.src = 'img/post_game_sh.jpg';
    const gioco = document.querySelector('#gioco button');
    gioco.innerHTML = '';
    gioco.appendChild(new_h1);
    gioco.appendChild(new_img);

    
  console.log(event.currentTarget.dataset.clicked, 'Cliccato');
  }
  const game = document.querySelector('#gioco button');
  game.addEventListener('click', sfida);

  
// API GUTENBERG


function onJson1(json) {
    console.log('JSON ricevuto');
    // Svuotiamo la libreria
    const elenco = document.querySelector('#elenco-view');
    
    elenco.innerHTML = '';
    // Leggi il numero di risultati
    let num_results = json.count;
    // Mostriamone al massimo 15
    if(num_results > 15)
      num_results = 15;

    console.log(num_results);
// Processa ciascun risultato
for(let i=0; i<num_results; i++)
    {
        
      // Leggi il documento
      const doc = json.results[i]
      // Leggiamo info
      const title = doc.title;
      const id = doc.id[0];      
      // Creiamo il div che conterrà la didascalia
      const book = document.createElement('div');
      book.classList.add('book');
      // // Creiamo la didascalia
       const caption = document.createElement('div');
       caption.textContent = title;
       // Aggiungiamo didascalia al div
       book.appendChild(caption);
      // Aggiungiamo il div alla libreria
      elenco.appendChild(book);
    }
    console.log('ecco il risultato');
  }
  function onResponse1(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }

  function search1(event)
{
  // Impedisci il submit del form
  event.preventDefault();
  // Leggi valore del campo di testo
  const topic_input = document.querySelector('#topic');
  const topic_value = encodeURIComponent(topic_input.value);
  const language_input = document.querySelector('#language');
  const language_value = encodeURIComponent(language_input.value);

  console.log('Eseguo ricerca: ' + topic_value + language_value);
  // Prepara la richiesta
  rest_url = 'https://gutendex.com/books/?topic=' + topic_value + '&language=' + language_value;
  console.log('URL: ' + rest_url);
  // Esegui fetch
  fetch(rest_url).then(onResponse1).then(onJson1);
}

// Aggiungi event listener al form
const form1=document.querySelector('#form1');
form1.addEventListener('submit', search1)


//sistemazione scroll collegamenti interni alla index

// FUNZIONE PER LO SCORRIMENTO CON OFFSET DINAMICO E SMOOTH SCROLL


function scrollToSectionWithOffset(event) {
  event.preventDefault();

  // Ottieni l'ID della sezione di destinazione dal valore href del link cliccato
  const targetId = event.currentTarget.getAttribute('href').substring(1);

  // Trova l'elemento di destinazione tramite l'ID
  const targetElement = document.getElementById(targetId);

  if (targetElement) {
    // Determina l'offset in base alla posizione dello scroll
    const offset = window.scrollY > 0 ? 80 : 200; // Esempio: 80 se scroll > 0, altrimenti 200

    // Calcola la posizione di scorrimento con l'offset corrente
    const targetPosition = targetElement.offsetTop - offset;

    // Esegui lo scorrimento della finestra in modo fluido
    window.scrollTo({
      top: targetPosition,
      behavior: 'smooth'
    });
  }
}

// Aggiungi event listener a tutti gli elementi <a> con attributo href in #sub-menu
const linksInSubMenu = document.querySelectorAll('#sub-menu a');
linksInSubMenu.forEach(link => {
  link.addEventListener('click', scrollToSectionWithOffset);
});

// Aggiungi event listener a tutti gli elementi <a> in #flex-container2
const linksInFlexContainer = document.querySelectorAll('#flex-container2 a');
linksInFlexContainer.forEach(link => {
  link.addEventListener('click', scrollToSectionWithOffset);
});

function headerDinamico() {
  const header = document.querySelector('header');
  const sh_img = document.querySelector('.flex-item2 a img');

  if (window.scrollY > 0) {
      header.classList.add('fixed');
      sh_img.classList.add('scrolled');
  } else {
      header.classList.remove('fixed');
      sh_img.classList.remove('scrolled');
  }
}

window.addEventListener('scroll', headerDinamico);