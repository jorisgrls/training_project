<?php
    function getGames($id, $isOwn = 1, $isWishlist = 0, $alreadyPlay = 0) {
        include(__DIR__."/../config.php"); 
        $getGamesQuery = "SELECT g.*, e.name AS name_editor FROM usersgames ug INNER JOIN games g ON ug.game_id = g.id INNER JOIN editors e ON g.id_editor = e.id WHERE ug.user_id = '$id' AND ug.is_own = '$isOwn' AND ug.is_wishlist = '$isWishlist'  AND ug.alreadyplay = '$alreadyPlay'";
        $getGamesStatement = $login->prepare($getGamesQuery);
        $getGamesStatement->execute();
        $getGames = $getGamesStatement->fetchAll();
        for($i=0; $i<count($getGames); $i++){
            $id = $getGames[$i]['id'];
            $title = $getGames[$i]['title'];
            $img = $getGames[$i]['img'];
            $nb_players = $getGames[$i]['nb_players'];
            $name_editor = $getGames[$i]['name_editor'];
            echo (" <div id='game_$id' class='col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 mt-4'>
                        <div class='card'>
                            <img class='card-img-top img-card' data-id='$id' src='$img' alt='image $title'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>$title</h5>
                                <p class='card-text'>$nb_players joueurs<br>$name_editor</p>
                                ");
                                echo("
                            </div>
                        </div>
                    </div>");
        }
    }
?>