<!--
///     ___  _ _       _             _____     _
///    / _ \| (_)_   _(_) ___ _ __  |  ___|_ _| |__  _ __ ___
///   | | | | | \ \ / / |/ _ \ '__| | |_ / _` | '_ \| '__/ _ \
///   | |_| | | |\ V /| |  __/ |    |  _| (_| | |_) | | |  __/
///    \___/|_|_| \_/ |_|\___|_|    |_|  \__,_|_.__/|_|  \___|
///
///         mon code en ligne: https://github.com/olfabre


   Structure du site internet: réservation hotel

   > Objectif: 
            création d'un site internet dynamique de réservations de chambres d'hotel.
            Le site doit être réalisé avec le framework w3.css et utilisé le html, le javascript, le php.
            L'accès à la base de données se fera à partir d'un accès d'un fichier sous format texte.

 
    > Le fichier point d'entrée
        . index.php

    > Les fichiers "include"
        . header.php
        . main.php
        . footer.php
-->
<!DOCTYPE html>
<html>
<head>
<title>Accueil - Hôtel Normandy Deauville - Hôtel 3 étoiles</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<!-- <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body id="maPage" onload="move()">
<?php 
    // gestion des parties de page 
    
    /* EnTête du site */
    include 'header.php';
    
    /* Affichage du contenu sélectionné */
        if (isset($_GET["page"])){
            include $_GET["page"].'.php';
        }
        else{

            // Affichage défaut
            include 'main.php';
        }

    /* Pied de page du site */
        include 'footer.php';
?>         