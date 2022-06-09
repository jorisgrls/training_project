<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container py-4">
        <a class="navbar-brand" href="#">Toy Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class=" nav-item dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo($_SESSION['name'])?></button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="../pages/owngames.php">My games</a>
                        <a class="dropdown-item" href="../pages/wishlist.php">My wishlist</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../controllers/logout.php">Logout</a>
                    </div>
                </div>
            </ul>
            <form class="d-flex w-50 flex-column position-relative">
                <input id="searchbar" class="form-control" type="search" placeholder="Search" aria-label="Search">
                <ul id="results" style="display:none; top:38px; z-index:1" class="position-absolute left-0 bg-light">
                    
                </ul>
            </form>
        </div>
    </div>
</nav>

<div class="modal fade" id="modal-searchbar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <button id="validate-yes" type="button" class="btn btn-success validate-button" data-action="removeGame">YES, remove</button>
                <button id="validate-cancel" type="button" class="btn btn-danger cancel-button">Cancel</button>
                <button id="removeOwnGame" type="button" class="btn btn-outline-danger action-button">REMOVE</button>
            </div>
        </div>
    </div>
</div>
