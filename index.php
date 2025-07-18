<!-- inclusion des variables et fonctions -->
<?php
session_start();
require_once(__DIR__ . '/config/database_const.php');
require_once(__DIR__ . '/database_connection.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
$_SESSION['choix'] = date('Y-m-j'); 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site qui utilise l'API forunie par Astronomy Picture of the Day - Page d'accueil</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Découvre des paysages magnifiques et partage-les</h1>

        <!-- Formulaire de connexion -->
        <?php require_once(__DIR__ . '/login.php'); ?>

        <h3>L'image du jour <?php echo date('j-F-Y')?></h3>

        <ul id="nasa-list" class="mt-4"></ul>
        <script>
            fetch('get_apod.php')  // permet d'envoyer une requête à l'api
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const ul = document.getElementById("nasa-list");
                    const li = document.createElement("li");
                    li.innerHTML = `<strong>${data.title}</strong><br><img src="${data.url}" alt="${data.title}" style="max-width: 100%;"><p>${data.explanation}</p>`;
                    ul.appendChild(li);
                })
                .catch(error => {
                    console.error("Erreur lors de la récupération de l'image NASA :", error);
                });
        

        </script>
        <?php unset($_SESSION['choix']);?>
        
    </div>

    <!-- inclusion du bas de page du site -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>