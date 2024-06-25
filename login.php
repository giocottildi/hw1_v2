<?php
    // Verifica che l'utente sia già loggato, in caso positivo va direttamente alla home
    include 'auth.php';
    if (checkAuth()) {
        header('Location: index.php');
        exit;
    }
    include 'menu.php';

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        // Se username e password sono stati inviati
        // Connessione al DB
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        // ID e Username per sessione, password per controllo
        $query = "SELECT * FROM users WHERE username = '".$username."'";
        // Esecuzione
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        if (mysqli_num_rows($res) > 0) {
            // Ritorna una sola riga, il che ci basta perché l'utente autenticato è solo uno
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {

                // Imposto una sessione dell'utente
                $_SESSION["username"] = $entry['username'];
                $_SESSION["user_id"] = $entry['id'];
                header("Location: index.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        // Se l'utente non è stato trovato o la password non ha passato la verifica
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        // Se solo uno dei due è impostato
        $error = "Inserisci username e password.";
    }

?>

<html>
    <head>
        <title>Login4</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='login.css'>
        <script src='login.js' defer></script>
        <link rel='stylesheet' href='menu.css'>
        <script src='menu.js' defer></script>
    </head>

   <body>

            <div id="container">
                <section id="login"> 
                    
                    <div id="log-account" >
                    
                        <div id="accesso">
                            <h1>Accedi</h1>
        <?php
            // Verifica la presenza di errori
                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }
        ?>

                            <div id="accedi-account" >
                            
                            <form name="log-in" method='post' id="log-in">    
                                <label for='username'>Username <input type='text' name='username' placeholder="username"
                                    <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?> ></label>
                                <label for='password'>Password <input type='password' name='password' placeholder="Password"
                                    <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></label>
                                <label>&nbsp;<input class="submit" type='submit' value="Accedi"></label>
                            </form>
                            
                            </div>
                            
                            <div id="links"><a href="register.php">Non hai ancora un account?</a></div>
                        </div>

                    
                    </div>


                </section>
            </div>

    </body>
</html>