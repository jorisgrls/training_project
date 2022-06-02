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
</head>
<body>
    <?php include("../includes/navbar.php");?>
    <div class="container">
        <div class="row">
            <?php getGames($_SESSION['id'], 1, 0); ?>
        </div>
    </div>
    <?php include("../includes/js.php");?>
</body>
</html>