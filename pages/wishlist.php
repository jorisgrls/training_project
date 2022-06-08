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
    <title>Toy Library : my wishlist</title>
    <?php include("../includes/css.php");?>
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/modal.css" rel="stylesheet">
</head>
<body>
    <?php include("../includes/navbar.php");?>
    <div class="container">
        <div class="row">
        <?php getGames($_SESSION['id'], 0, 1); ?>
        </div>
    </div>
    <!-- Modal game -->
    <div class="modal fade" id="main-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">TITLE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-stretch">
                        <div class="col-4">
                            <img id="img-modal" src="" alt="game" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div id="desc-modal" class="row"></div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <p id="nb-players-modal"></p>
                    </div>
                    <div class="row">
                        <p id="editor-modal"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <p id="validate-question" class="question-action">Are you sure ?</p>
                    <button id="validate-add-owngames" type="button" class="btn btn-success validate-button" data-action="removeWishlistAddOwnGames">YES, add to own games</button>
                    <button id="validate-remove-wishlist" type="button" class="btn btn-success validate-button" data-action="removeGame">YES, remove from wishlist</button>
                    <button id="validate-cancel" type="button" class="btn btn-danger cancel-button">Cancel</button>
                    <button id="removeWishlistAddOwnGames" type="button" class="btn btn-outline-success action-button">ADD TO OWN GAMES</button>
                    <button id="removeWishlist" type="button" class="btn btn-outline-danger action-button">REMOVE FROM WISHLIST</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/js.php");?>
    <script src="../js/getGame.js"></script>
</body>
</html>