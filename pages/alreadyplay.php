<?php 
include("../controllers/checkAuth.php"); 
include("../controllers/getGames.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toy Library : games already play</title>
    <?php include("../includes/css.php");?>
    <link rel="stylesheet" href="../css/card.css">
</head>
<body>
    <?php include("../includes/navbar.php");?>
    <div class="container">
        <div class="row">
        <?php getGames($_SESSION['id'], 0, 0, 1); ?>
        </div>
    </div>
    <!-- Modal game -->
    <div class="modal fade" id="main-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">TITLE</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-stretch">
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <img id="img-modal" src="" alt="game" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <p id="desc-modal">DESCRIPTION</p>
                            </div>
                            <div class="row mb-0 mt-2">
                                <p><span id="nb-players-modal" class="badge bg-primary px-2"></span>   <span id="playingtime-modal" class="badge bg-secondary px-2"></span>   <span id="editor-modal" class="badge bg-warning px-2"></span> </p>   
                            </div>                          
                        </div>
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <p id="validate-question" class="question-action">Are you sure ?</p>
                    <button type="button" class="btn btn-success validate-button" data-action="removeAlreadyPlayAddOwnGames">YES, add to own games</button>
                    <button type="button" class="btn btn-success validate-button" data-action="addToWishlist">YES, add to wishlist</button>
                    <button type="button" class="btn btn-success validate-button" data-action="removeGame">YES, remove</button>
                    <button type="button" class="btn btn-danger cancel-button">Cancel</button>
                    <button type="button" class="btn btn-outline-success action-button">ADD TO OWN GAMES</button>
                    <button type="button" class="btn btn-outline-success action-button">ADD TO WISHLIST</button>
                    <button type="button" class="btn btn-outline-danger action-button">REMOVE</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/js.php");?>
    <script src="../js/getGame.js"></script>
    <script src="../js/searchbar.js"></script>
</body>
</html>