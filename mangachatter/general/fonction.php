<?php 

$pdo = new PDO('mysql:host=localhost;dbname=otakutalks', 'root', '');

//Fonction d'affichage des podcasts au moment du clique sur le lien
function getPodcast(PDO $pdo, $id) : array {
    $stmt = $pdo->prepare("SELECT * FROM podcasts WHERE id_podcast = ?");
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $podcast = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $podcast !== false ? $podcast : false;
 }

//Fonction de récupération des podcasts pour créer un tableau 
function getPodcasts(PDO $pdo) : array {
 $query = $pdo->query('SELECT id_podcast, name_podcast, description, excerpt, category_id, link, created_at_podcast, update_at_podcast FROM podcasts', PDO::FETCH_ASSOC);
 
 $podcasts = [];
 while ($podcast = $query->fetch()) {
     $podcasts[] = $podcast;
 }
 
 return $podcasts;
}

//Fonction d'apparition des commentaires en fonction des pages
function getComments(PDO $pdo) : array {
    $podcastId = $_GET['id']; 
 
    $stmt = $pdo->prepare("SELECT * FROM commentaires WHERE podcast_id = ?");
    $stmt->bindParam(1, $podcastId, PDO::PARAM_INT);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    return $comments;
 }
 