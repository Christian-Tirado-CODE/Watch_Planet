<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Watch Planet - Log In</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <?php
                                        if (isset($_GET['error'])) {
                                            if ($_GET['error'] == "accountsuspended") {
                                                echo '<div class="alert alert-warning" role="alert"><h4 class="alert-heading text-center">Account has been suspended!</h4></div>';
                                            }
                                            else if ($_GET['error'] == "accountpendingapproval") {
                                                echo '<div class="alert alert-warning" role="alert"><h4 class="alert-heading text-center">Account pending approval!</h4></div>';
                                            }
                                            else if ($_GET['error'] == "accountnotapproved") {
                                                echo '<div class="alert alert-warning" role="alert"><h4 class="alert-heading text-center">Account not approved!</h4></div>';
                                            }
                                            else if ($_GET['error'] == "wrongpassword") {
                                                echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading text-center">Password is incorrect!</h4></div>';
                                            }
                                            else if ($_GET['error'] == "adminnotfound") {
                                                echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading text-center">Email is not registered!</h4></div>';
                                            }
                                        }
                                    ?>
                                    <div class="card-body">
                                        <form action="includes/login.inc.php" method="post">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email address" required></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" name="pass" placeholder="Enter password" required></div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><button class="btn btn-block" name="login-submit" type="submit" style="background-color: #a8fdcc">Login <i class="fas fa-sign-in-alt"></i></button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Watch Masters 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
