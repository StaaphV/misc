<?php

function chargerClasse($classe){
    if (file_exists("PHP/controleur/" . $classe . ".class.php")){
        require "PHP/controleur/" . $classe . ".class.php";
    }
    if (file_exists("PHP/modele/" . $classe . ".class.php")){
        require "PHP/modele/" . $classe . ".class.php";
    }
}

function chargerPage($tab){
    $chemin = $tab[0];
    $nom = $tab[1];
    $titre = $tab[2];

    include 'PHP/vue/head.php';
    include 'PHP/vue/header.php';
    include $chemin . $nom . '.php'; //Chargement de la page en fonction du chemin et du nom
    include 'PHP/vue/footer.php';
}

function crypter($mdp){
    return md5(md5($mdp).strlen($mdp));
}    
