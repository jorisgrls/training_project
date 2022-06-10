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
                        <a class="dropdown-item" href="../pages/alreadyPlay.php">Already play</a>
                        <?php
                        if($_SESSION['rank'] == 1){
                            echo("<div class='dropdown-divider'></div>
                                  <a class='dropdown-item text-danger' href='../controllers/devMajBdd.php'>DEV - Maj bdd</a>
                                ");
                        }
                        ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../controllers/logout.php">Logout</a>
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


