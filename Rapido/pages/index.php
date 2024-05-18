<?php
    session_start();
    if(!isset($_SESSION["onuser"]) || $_SESSION["onuser"] === false){
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAPIDO Transport Interurbain</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/ajouter.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/corps.css">
    
</head>
<body>
    <div class="corps">
        <header>
            <div>
                <img src="../assets/images/Logo-Rapido-16x9.jpg" alt="RAPIDO">
                <p>Transport Interurbain De Taxi</p>
            </div>
        </header>
        <hr>
        <nav>
            <div><button id="btnajouter">Ajouter un transport</button></div>
            <div><button id="btnchauffeur">Ajouter un chauffeur</button></button></div>
            <div><button id="btnattente">Les courses en attente</button></div>
            <div><button id="btncours">Les courses en cours</button></button></div>
            <div><button id="btnterminer">Les courses terminée</button></div>
        </nav>
        <br>
        <section id="accueil">
            <div>
                <p>Bienvenue sur l'application web de gestion des transports de Rapido, conçue exclusivement pour simplifier les déplacements de votre entreprise ! Avec notre plateforme intuitive, les administrateurs, les chauffeurs et les employés peuvent coordonner efficacement les trajets professionnels, garantissant ainsi une mobilité fluide et optimisée.</p>
            </div>
            <div class="admin">
                <h3>Pour les administrateurs :</h3>
                <ul>
                    <li>Gérez facilement les réservations de transport, attribuez les chauffeurs et suivez les trajets en temps réel.</li>
                    <li>Accédez à des rapports détaillés pour optimiser l'utilisation des ressources et contrôler les coûts.</li>
                    <li>Personnalisez les paramètres de l'application pour répondre aux besoins spécifiques de votre entreprise.</li>
                </ul>
            </div>
            <div class="chauffeurs">
                <h3>Pour les chauffeurs :</h3>
                <ul>
                    <li>Consultez votre planning de manière transparente et recevez des notifications en temps réel pour les nouvelles affectations.</li>
                    <li>Accédez aux détails des trajets et aux informations sur les passagers pour assurer un service de qualité.</li>
                    <li>Signalez facilement les imprévus ou les retards pour une communication fluide avec l'équipe administrative.</li>
                </ul>
            </div>
            <div class="employe">
                <h3>Pour les employés :</h3>
                <ul>
                    <li>Réservez rapidement vos trajets professionnels en quelques clics, en indiquant vos préférences et contraintes éventuelles.</li>
                    <li>Suivez l'arrivée de votre chauffeur en temps réel et recevez des notifications pour rester informé tout au long du trajet.</li>
                    <li>Contribuez à une gestion efficace des transports en fournissant des retours d'expérience et des suggestions d'amélioration.</li>
                </ul>
            </div>
            <div >
                <p>Avec l'application de gestion des transports de Rapido, simplifiez la logistique de vos déplacements professionnels et offrez à votre entreprise une solution efficace et sur mesure. Merci de choisir Rapido pour vos besoins de mobilité d'entreprise !</p>
            </div>
        </section>

        <section class="mybody">
            <div id="divajouter">
                <h2>Ajouter un transport</h2>
                <?php include("ajouter.php")?>
            </div>

            <div id="divchauffeur">
                <h2>Ajouter un chauffeur</h2>
                <?php include("chauffeur.php")?>
            </div>

            <div class="courses">
                <div id="divattente">
                    <h2>Les courses en attente</h2>
                    <?php include("attente.php")?>
                </div>

                <div id="divenCours">
                    <h2>Les courses en cours</h2>
                    <?php include("enCours.php")?>
                </div>

                <div id="divterminer">
                    <h2>Les courses terminée</h2>
                    <?php include("traminer.php");?>
                </div>
            </div>
        </section>
        
        <footer>
            <h6 class="botTitle">TRANSPORT INTERURBAIN DE TAXI</h6>
            <aside>
                <img src="../assets/images/Logo-Rapido-16x9.jpg" alt="RAPIDO">
                <div>
                    <h6>Les Responsables</h6>
                    <ul>
                        <li>M. Jackson</li>
                        <li>M. Oliver</li>
                        <li>Md. Edi</li>
                    </ul>
                </div>
            </aside>
            <form action="../php/logout.php" method="post">
                <div id="logout">
                    <button type="submit">Déconnexion</button>
                </div>
            </form>
        </footer>
    </div>
   
    <script src="../javascript/mon-script.js"></script>
    <script src="../javascript/monajax.js"></script>
</body>
</html>