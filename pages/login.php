<?php 
    $error = "";
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) {
            $error = "Your name or password are incorrect.";
        }
        else if ($_GET['error'] == 2) {
            $error = "One of the fields is empty.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Toy Library : log in</title>
    <?php include("../includes/css.php");?>
    <link href="../css/login.css" rel="stylesheet">
</head>
<body>
    <section class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <h4 class="mt-1 mb-5 pb-1">Toy Library</h4>
                                </div>
                                <?php if (isset($_GET['error'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Oops ! </strong> <?php echo($error)?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <form action="../controllers/connexion.php" method="post">
                                    <p>Please login to your account</p>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="name" >Name</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Your name" required></input>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password" >Password</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Your password" required></input>
                                    </div>
                                    <button class="btn btn-primary w-100 fa-lg gradient-custom-2 mb-3 border-0" name="login" type="submit">Log-in</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">You don't have an account ?</h4>
                                <p class="small mb-0">Currently you can't add an user if you're not an admin. Please contact us if you want an acces.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </section>
    </div>
    <script src="../externals/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>