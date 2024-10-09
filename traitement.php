<?php
require_once 'bddcnx.php';

if(empty($_POST['title'])
    || empty($_POST['artist'])
    || strlen($_POST['description']) < 3
    || empty($_POST['image'])
    || !filter_var($_POST['image'], FILTER_SANITIZE_URL)
){ 
    header('Location: ajouter.php');
} else {
    $title = htmlspecialchars($_POST['title']);
    $artist = htmlspecialchars($_POST['artist']);
    $description = htmlspecialchars($_POST['description']);
    $image = htmlspecialchars($_POST['image']);

    $query = $cnx->prepare('INSERT into oeuvres(title, artist, description, image) VALUES(?, ?, ?, ?)');
    $query->execute([$title, $artist, $description, $image]);

    header('Location: index.php');
};