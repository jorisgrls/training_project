<?php
    function getGames($id, $isOwn = 1, $isWishlist = 0) {
        include(__DIR__."/../config.php"); 
        $getGamesQuery = "SELECT g.*, e.name AS name_editor FROM usersgames ug INNER JOIN games g ON ug.game_id = g.id INNER JOIN editors e ON g.id_editor = e.id WHERE ug.user_id = '$id' AND ug.is_own = '$isOwn' AND ug.is_wishlist = '$isWishlist'";
        $getGamesStatement = $login->prepare($getGamesQuery);
        $getGamesStatement->execute();
        $getGames = $getGamesStatement->fetchAll();
        for($i=0; $i<count($getGames); $i++){
            $id = $getGames[$i]['id'];
            $title = $getGames[$i]['title'];
            $img = $getGames[$i]['img'];
            $nb_players = $getGames[$i]['nb_players'];
            $name_editor = $getGames[$i]['name_editor'];
            echo (" <div class='col-3 mt-4'>
                        <div class='card'>
                            <img class='card-img-top' data-id='$id' src='$img' alt='image $title'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>$title</h5>
                                <p class='card-text'>$nb_players joueurs<br>$name_editor</p>
                                ");
                                /*if ($isOwn == 1) {  
                                    echo("<button data-id='$id' class='btn btn-primary w-100 modal-button' data-toggle='modal' data-target='#main-modal'>INFOS</button>");
                                }else{
                                    echo("<button href='#' class='btn btn-primary w-100'>JE L'AI</button>
                                        <button href='#' class='btn btn-primary w-100 mt-2'>ENLEVER DE LE WISHLIST</button>");
                                    
                                }*/
                                echo("
                            </div>
                        </div>
                    </div>");
        }
    }
?>