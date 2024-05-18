<?php
    session_start();
    if(!isset($_SESSION["message"])){
        $_SESSION["message"] = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de onnexion</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <fieldset>
        <h2>Connexion</h2>
        <?php
            if($_SESSION["message"] !== false)
            {
                echo '<p class="msg">';
                echo $_SESSION["message"];
                $_SESSION["message"] = false;
                echo '</p>';
            }
        ?>
        <form action="../php/login.php" method="post">
            <div>
                <label for="mail">Votre mail:</label>
                <input type="email" name="mail" id="mail">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="btn">
                <button type="submit">login</button>
            </div>
        </form>
        <p class="btnmsg">Rapido transport interurbain de taxi <br>Welcome!</p>
    </fieldset>
</body>
</html>