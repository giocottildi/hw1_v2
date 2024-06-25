<?php
    require_once 'auth.php';

    if (checkAuth()) {
        header("Location: index.php");
        exit;
    }   
    include 'menu.php';

    // Verifica l'esistenza di dati POST
    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["name"]) && 
        !empty($_POST["surname"]))
    {
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        
        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }
        # PASSWORD
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 

        # EMAIL
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }


        # REGISTRAZIONE NEL DATABASE
        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(username, password, name, surname, email) VALUES('$username', '$password', '$name', '$surname', '$email')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["user_id"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: index.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }

?>
<html>
    <head>
        <link rel='stylesheet' href='register.css'>
        <script src='register.js' defer></script>
        <script src='login.js' defer></script>
        <link rel='stylesheet' href='menu.css'>
        <script src='menu.js' defer></script>

    </head>
    <body>

        <?php
            // Verifica la presenza di errori
            if(isset($errore))
            {
                echo "<p class='errore'>";
                echo "Credenziali non valide.";
                echo "</p>";
            }
        ?>

    
<div id="container">
      <section id="register"> 
        
        <div id="log-account" >
          
          <div id="registrazione">
            <h1>Registrati</h1>

            <div id="registra-account" >
              
                <form name="sign-in" id="sign-in" method='post'>    
                    <div class="name">
                        <label>Name <input type='text' name='name' placeholder="name" 
                            <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> >
                        </label>
                        <div><span>Devi inserire il tuo nome</span></div>
                    </div>
                    <div class="surname">
                        <label>Surname <input type='text' name='surname' placeholder="surname"
                            <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> >
                        </label>
                        <div><span>Devi inserire il tuo cognome</span></div>
                    </div>
                    <div class="username">
                        <label>Username <input type='text' name='username' placeholder="username"
                            <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?> >
                        </label>
                        <div><span>Nome utente non disponibile</span></div>
                    </div>
                    <div class="email">
                        <label>E-mail <input type='text' name='email' placeholder="email"
                            <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?> >                            
                        </label>
                        <div><span>Indirizzo email non valido</span></div>
                    </div>
                    <div class="password">
                        <label>Password <input type='password' name='password' placeholder="Password"
                            <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?> >
                        </label>
                        <div><span>Inserisci almeno 8 caratteri</span></div>
                    </div>

                    <?php if(isset($error)) {
                        foreach($error as $err) {
                            echo "<div class='errorj'><span>".$err."</span></div>";
                        }
                    } ?>

                    <label>&nbsp;<input class="submit" type='submit' value="Registra"></label>
                </form>
              
            </div>
            
            <div id="links"><a href="login.php">Hai già un account?</a></div>
          </div>

        </div>
          
        </div>


      </section>
    </div>
    </body>
</html>