<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Watch Planet - Register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Access Request</h3></div>
                                    <?php
                                        if (isset($_GET['error'])) {
                                            if ($_GET['error'] == "invalidinputs") {
                                                echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading text-center">Inputs are invalid!</h4></div>';
                                            }
                                            else if ($_GET['error'] == "invalidemail") {
                                                echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading text-center">Invalid email!</h4></div>';
                                            }
                                            else if ($_GET['error'] == "invalidname") {
                                                echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading text-center">Invalid name!</h4></div>';
                                            }
                                            else if ($_GET['error'] == "invalidlast_name") {
                                                echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading text-center">Invalid last name!</h4></div>';
                                            }
                                            else if ($_GET['error'] == "passwordcheck") {
                                                echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading text-center">Passwords do not match!</h4></div>';
                                            }
                                            else if ($_GET['error'] == "emailalreadyregistered") {
                                                echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading text-center">Email already registered!</h4></div>';
                                            }
                                            
                                        }
                                    ?>
                                    <div class="card-body">
                                        <form action="includes/signup.inc.php" method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" name="name" for="inputFirstName">First Name</label><input class="form-control py-4" id="inputFirstName" type="text" name="name" placeholder="Enter first name" required></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" name="last_name" for="inputLastName">Last Name</label><input class="form-control py-4" id="inputLastName" type="text" name="last_name" placeholder="Enter last name" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="small mb-1" name="email" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email address" required></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" name="pass" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" name="pass" placeholder="Enter password" required></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirm Password</label><input class="form-control py-4" id="inputConfirmPassword" name="pass_confirm" type="password" placeholder="Confirm password" required></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-block" name="signup-submit" type="submit" style="background-color: #a8fdcc"><i class="fas fa-user-plus"></i></button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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
                            <div class="text-muted">Copyright &copy; Watch Planet 2020</div>
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
