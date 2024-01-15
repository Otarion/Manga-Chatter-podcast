<?php

foreach ($podcasts as $podcast) {
    $id = $podcast['id'];
    echo '<div class="article">'.
        '<a href="page.php?id='.$id.'"><p class="titre" style="cursor: pointer;">' . '<img src="image\sakura.png" style="height: 1rem;">'.' '.
        $podcast['titre'] . '</p></a>'. 
        '<p class="description">'.$podcast['description'] . '</p>'.
        '<img src="image\play.svg" style="height: 2rem; cursor: pointer;">'.
        '<p class="date">'.$podcast['date'].'</p>' .
        '</div>';
 } 

 ?>