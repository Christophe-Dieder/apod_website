<?php

require_once(__DIR__ . '/submit_login.php');


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site qui utilise l'API forunie par Astronomy Picture of the Day - Page de recherche de publication</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
    >
</head>
<h1>


</h1>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Découvre des paysages magnifiques et partage-les</h1>

        <!-- Formulaire de connexion -->
        <?php require_once(__DIR__ . '/login.php'); ?>

        
    <?php 
    if(isset($_SESSION['LOGGED_USER']))
    {?>
    <form action="submit_choix_image.php" method="POST">
        <!-- si message d'erreur on l'affiche -->
        <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="date" class="form-label">Choisis une date entre le 16 juin 1995 et aujourd'hui pour consulter la publication</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <?php 
        if(isset($_SESSION['choix'])) :?>
        <ul id="nasa-list" class="mt-4"></ul>
        <script>
        fetch('get_apod.php')
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
        <?php endif; ?>
    </form>
    <?php }?>
   

    </div>
    <!-- inclusion du bas de page du site -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>