<?php
  session_start();
  // echo '<div> <h1>Ciao ';
  // echo $_SESSION["username"];
  // echo'!</h1>';
  include 'menu.php';
  
  ?>

<html>


  <head>
    <title>Spotify2</title>
    <link rel="stylesheet" href="spotify.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="spotify.js" defer></script>
    
    <link rel="stylesheet" href="menu.css">
    <script src="menu.js" defer></script>
  </head>
  
  <body>

    <div id="overlay" class="hidden">
    </div>
 
    <section id="search">
      <form id="form-playlist">
        <div class="search">
          <input type='text' name="search" id="search-playlist" class="searchBar" placeholder="inserisci la ricerca">
          <input type="submit" value="Cerca">
        </div>
      </form>

      
    </section>
    <section id="flex-spotify">
        <div class="container">
            <div id="results">
                
            </div>

        </div>
                    <!--CRONOLOGIA -->
                    <div id="flex-cronologia">
                        <div id="sub-flexbox-cronologia">
                            <div id="cronologia-title"><a>CRONOLOGIA</a></div>
                            <div><button id="elimina-tutto">
                                <a id="cestina-cronologia"><img src="img/cestino.jpg"></a>
                            </button>
                            </div>
                        </div>
                        <div id="container-cronologia">
                        </div>
            </div>
    </section>
    
  </body>
  </html>