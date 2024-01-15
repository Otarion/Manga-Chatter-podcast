<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="general/general.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Zen+Loop:ital@0;1&display=swap" rel="stylesheet">
    <title>Otaku Talks - Page d'accueil</title>
</head>
<body>

    <div class="banniere">
Manga Chatter
    </div>

    <div class="centre">

    <?php

include("general/fonction.php");

//Affichage de chaque tableau résumant chaque podcast sur la page d'accueil
$podcasts = getPodcasts($pdo);
foreach ($podcasts as $post) {
   if (isset($post)) {
       echo '<div class="article">'.
           '<a href="page.php?id='.$post['id_podcast'].'"><p class="titre" style="cursor: pointer;">' . '<img src="design\img\sakura.png" style="height: 1rem;">'.' '.
           $post['name_podcast'] . '</p></a>'. 
           '<p class="description">'.$post['excerpt'] . '</p>'.
           '<audio class="audio" src="" type="audio/mpeg"></audio>'.
           '<p class="date">'.$post['created_at_podcast'].'</p>' .
           '<p class="date">'.$post['update_at_podcast'].'</p>' .
           '</div>';
   }
}

?>

    </div>

    <audio autoplay loop>
        <source src="design\Fall Colors - ann annie.mp3" type="audio/mpeg" class="audio">
    </audio>

    <div class="footer">

        <div class="rs">
            <img src="design\img\insta.svg" class="logo">
            <img src="design\img\x-t.svg" class="logo">
            <img src="design\img\youtube.svg" class="logo">
        </div>

        <div class="regle">
            A propos
            <br>
            Conditions d'utilisations
            <br>
            Politique de confidentialité
        </div>

    </div>

</body>
</html>