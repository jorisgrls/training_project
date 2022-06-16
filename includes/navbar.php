<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container py-4">
        <a class="navbar-brand" href="#">Toy Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class=" nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo($_SESSION['name'])?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="../pages/owngames.php">My games</a>
                        <a class="dropdown-item" href="../pages/wishlist.php">My wishlist</a>
                        <a class="dropdown-item" href="../pages/alreadyplay.php">Already play</a>
                        <?php
                        if($_SESSION['rank'] == 1){
                            echo("<div class='dropdown-divider'></div>
                                  <a class='dropdown-item text-danger' href='../controllers/devMajBdd.php'>DEV - Maj bdd</a>
                                ");
                        }
                        ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../controllers/logout.php"><b>Logout</b></a>
                    </div>
                </div>
            </ul>
            <form class="d-flex w-50 flex-column position-relative">
                <input id="searchbar" class="form-control" type="search" placeholder="Search" aria-label="Search"> 
                <ul id="results" style="display:none; top:38px; z-index:1" class="list-group position-absolute left-0 bg-light"> 
                </ul>
            </form>
        </div>
    </div>
</nav>


<div class="modal fade" id="searchbar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-searchbar-title">TITLE</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-stretch">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <img id="img-searchbar-modal" src="" alt="game" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <p id="desc-searchbar-modal">DESCRIPTION</p>
                        </div>
                        <div class="row mb-0 mt-2">
                            <p><span id="nb-players-searchbar-modal" class="badge bg-primary px-2"></span>   <span id="playingtime-searchbar-modal" class="badge bg-secondary px-2"></span>   <span id="editor-searchbar-modal" class="badge bg-warning px-2"></span> </p>   
                        </div>                          
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <p id="validate-question" class="question-action">Are you sure ?</p>
                <button type="button" class="btn btn-success validate-button" data-action="addOwnGames">YES, add to own games</button>
                <button type="button" class="btn btn-success validate-button" data-action="addWishlist">YES, add to wishlist</button>
                <button type="button" class="btn btn-success validate-button" data-action="addAlreadyPlay">YES, add to already play</button>
                <button type="button" class="btn btn-success validate-button" data-action="removeGame">YES, remove from owngames</button>
                <button type="button" class="btn btn-success validate-button" data-action="removeGame">YES, remove from wishlist</button>
                <button type="button" class="btn btn-success validate-button" data-action="removeGame">YES, remove from already play</button>
                <button type="button" class="btn btn-danger cancel-button">Cancel</button>
                <button id="addToOwnGamesButton" type="button" class="btn btn-outline-success action-button">ADD TO OWN GAMES</button>
                <button id="addToWishlistButton" type="button" class="btn btn-outline-success action-button">ADD TO WISHLIST</button>
                <button id="addToAlreadyPlayButton" type="button" class="btn btn-outline-success action-button">ADD TO ALREADY PLAY</button>
                <button id="removeOwnGamesButton" type="button" class="btn btn-outline-danger action-button">REMOVE FROM OWNGAMES</button>
                <button id="removeWishlistButton" type="button" class="btn btn-outline-danger action-button">REMOVE FROM WISHLIST</button>
                <button id="removeAlreadyPlayButton" type="button" class="btn btn-outline-danger action-button">REMOVE FROM ALREADY PLAY</button>
            </div>
        </div>
    </div>
</div>