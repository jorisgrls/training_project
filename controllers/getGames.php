<?php
    include(__DIR__."/../config.php"); 
    if(!empty($_SESSION['id'])){
        $id = $_SESSION['id'];
        $getGames = "SELECT g.*, e.name AS name_editor FROM usersgames ug INNER JOIN games g ON ug.game_id = g.id INNER JOIN editors e ON g.id_editor = e.id WHERE ug.user_id = '$id' AND ug.is_own = 1";
        $getGamesStatement = $login->prepare($getGames);
        $getGamesStatement->execute();
        $getGames = $getGamesStatement->fetchAll();
        for($i=0; $i<count($getGames); $i++){
            $id = $getGames[$i]['id'];
            $title = $getGames[$i]['title'];
            $img = $getGames[$i]['img'];
            $nb_players = $getGames[$i]['nb_players'];
            $name_editor = $getGames[$i]['name_editor'];
            echo (" <div class=\"col mt-4\">
                        <div class=\"card\" style=\"width: 18rem;\">
                            <img class=\"card-img-top\" src=\"$img\" alt=\"image $title\">
                        <div class=\"card-body text-center\">
                            <h5 class=\"card-title\">$title</h5>
                            <p class=\"card-text\">$nb_players joueurs<br>$name_editor</p>
                            <a href=\"#\" class=\"btn btn-primary w-100\">JE N'AI PLUS</a>
                        </div>
                    </div>");
        }
    }    
?>