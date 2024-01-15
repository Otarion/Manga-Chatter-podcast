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

//Affichage des informations sur le podcast
$id = $_GET['id'];
$query = getPodcast($pdo, $id);

if ($query !== null && $query instanceof PDOStatement) {
  while ($post = $query->fetch()) {

  echo '<div class="article" style="border: none;">'.
  '<p class="titre" style="cursor: pointer;">' . 
  '<p>..</p>'.
  '<img src="design\img\sakura.png" style="height: 1rem;">'.' '.
  $post['name_podcast'] . '</p></a>'. 
  '<p class="description">'.$post['description'] . '</p>'.
  '<audio class="audio" src="" type="audio/mpeg"></audio>'.
  '<p class="date">'.$post['created_at_podcast'].'</p>' .
  '<p class="date">'.$post['update_at_podcast'].'</p>' .
  '</div>'.
  '<button onclick="window.location.href=\'index.php\'" class="retour-bouton">Retour à la page d\'accueil</button>';
  exit();
}
} else { //Si l'id appelé n'existe pas
echo'<div class="erreur">'.
'<p class="text-erreur"><b>Erreur 404</b></p>'.
'<p class="text-erreur">'."L'article que vous cherchez n'existe pas. Retourner sur la page d'accueil.".'</p>'.
'<button onclick="window.location.href=\'index.php\'" class="retour-bouton">Retour à la page d\'accueil</button>'
.'</div>';
exit();
}

//Affichage des commentaires
$comments = getComments($pdo);
foreach ($comments as $comment) {
 echo '<div class="commentaires" style"margin:1rem; padding: 0.5rem, border: 2px solid rgb(99,40,11); border-radius: 1rem; font-family:"Zen Loop", cursive;">'.
 '<p class="comTxt" style="text-align: justify;">'.$comment['body'].'</p>'.
 '<p class="date" style="font-size:smaller; color:gray">'.$comment['created_at_comments'].'</p>' .
 '<p class="date" style="font-size:smaller; color:gray">'.$comment['update_at_comments'].'</p>' .
 '</div>';
}

?>

    </div>

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