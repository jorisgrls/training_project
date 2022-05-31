<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Mes jeux</title>
    <?php include("../includes/css.php");?>
</head>
<body>
    <div class="container">
        <!--<?php include("../includes/header.php");?>!-->
        <div class="row">
            <div class="col-md-12">
                <h1>Connexion</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="../controllers/connexion.php" method="post">
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary mt-4">Log In</button>
                </form>
            </div>
        </div>
    </div>
    <?php




    ?>
</body>
</html>