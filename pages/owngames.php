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
    <title>Toy Library : my games</title>
    <?php include("../includes/css.php");?>
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/modal.css" rel="stylesheet">
</head>
<body>
    <?php include("../includes/navbar.php");?>
    <div class="container">
        <div class="row">
            <?php getGames($_SESSION['id'], 1, 0); ?>
        </div>
    </div>
    <?php include("../includes/js.php");?>
    <div class="modal fade" id="main-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <button id="removeOwnGame" type="button" class="btn btn-outline-success">REMOVE</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/js.php");?>
    <script src="../js/getGame.js"></script>
</body>
</html>