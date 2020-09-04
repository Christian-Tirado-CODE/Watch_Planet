<?php
    session_start();
    require 'includes/connection.inc.php';
    if (!isset($_SESSION['id'])) {
        header("Location: 401.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Watch Planet - Products</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img class="img-fluid" src="img/watch_planet.png"></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars fa-2x"></i></button>
            <!-- Navbar Search
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn" type="button" style="background-color: #a8fdcc"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            -->
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggledropdown-item" href="includes/logout.inc.php">Sign Out <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-home fa-fw"></i></div>
                                Home</a
                            ><a class="nav-link" href="products.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-box-open fa-fw" aria-hidden="true"></i></div>
                                Products</a
                            ><a class="nav-link" href="admin.php"
                                ><div class="sb-nav-link-icon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></div>
                                Admins</a
                            ><a class="nav-link" href="user.php"
                                ><div class="sb-nav-link-icon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></div>
                                Users</a
                            >
                            <div class="sb-sidenav-menu-heading">Reports</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts"
                            ><div class="sb-nav-link-icon"><i class="fas fa-tags fa-fw"></i></div>
                                Sales
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="sales-by-day.php">By Day</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="sales-by-week.php">By Week</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="sales-by-month.php">By Month</a></nav>
                            </div>
                           
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts"
                            ><div class="sb-nav-link-icon"><i class="fas fa-chart-line fa-fw"></i></div>
                            Revenue
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="revenue-by-day.php">By Day</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="revenue-by-week.php">By Week</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="revenue-by-month.php">By Month</a></nav>
                            </div>
                           
                            
                           
                            <a class="nav-link collapsed" href="inventory.php" 
                            ><div class="sb-nav-link-icon"><i class="fas fa-boxes fa-fw"></i></i></div>
                            Inventory
                           
                            </a>
                        </div>
                    </div>
                    <?php
                        if (isset($_SESSION['id'])) {
                            echo '<div class="sb-sidenav-footer"><div class="small">Logged in as:</div>'.$_SESSION['name'].' '.$_SESSION['last_name'].'</div>';
                        }
                        else {
                            echo '<div class="sb-sidenav-footer"><div class="small">Logged out</div></div>';
                        }
                    ?>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                        <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == "invalidinputs") {
                                    echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading text-center">Inputs are invalid!</h4></div>';
                                }
                                else if ($_GET['error'] == "watchalreadyadded") {
                                    echo '<div class="alert alert-danger" role="alert"><h4 class="alert-heading text-center">Watch is already in the database!</h4></div>';
                                }

                            }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-box-open" aria-hidden="true"></i> watch</div>
                            <div class="card-body">
                              <div class="d-flex justify-content-end"> 
                                <button class="btn btn-success mb-2 text-dark" data-toggle="modal" data-target="#product-add"><i class="fa fa-plus " aria-hidden="true"></i> Add Product</button></div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Brand</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Material</th>
                                                <th>Band</th>
                                                <th>Quantity</th>
                                                <th>Cost</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM watch;";
                                                $result = mysqli_query($conn, $sql);
                                                $resultCheck = mysqli_num_rows($result);

                                                if ($resultCheck > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>";
                                                        echo "<td>" .$row['watch_id']. "</td>";
                                                        echo "<td>" .$row['brand']. "</td>";
                                                        echo "<td>" .$row['name']. "</td>";
                                                        echo "<td>" .$row['type']. "</td>";
                                                        echo "<td>" .$row['material']. "</td>";
                                                        echo "<td>" .$row['band']. "</td>";
                                                        echo "<td>" .$row['quantity']. "</td>";
                                                        echo "<td>" .$row['cost']. "</td>";
                                                        echo "<td>" .$row['price']. "</td>";
                                                        if ($row['status'] == "active") {
                                                                echo "<td class='text-success'>" . $row['status'] . "</td>";
                                                                echo '<td><div class="text-center"><button class="btn btn-primary mx-3 mb-1 text-dark" onclick="editId('.$row['watch_id'].')" data-toggle="modal" data-target="#product-edit"><i class="fas fa-pencil-alt fa-fw" aria-hidden="true"></i> Edit</button><button class="btn btn-warning mx-3 text-dark" onclick="suspendId('.$row['watch_id'].')" data-toggle="modal" data-target="#product-suspend"><i class="far fa-stop-circle fa-fw" aria-hidden="true"></i> Suspend</button></div></td>';
                                                            }
                                                            else if ($row['status'] == "suspended"){
                                                                echo "<td class='text-warning'>" . $row['status'] . "</td>";
                                                                echo '<td><div class="text-center"><button class="btn btn-primary mx-3 mb-1 text-dark" onclick="editId('.$row['id'].')" data-toggle="modal" data-target="#product-edit"><i class="fas fa-pencil-alt fa-fw" aria-hidden="true"></i> Edit</button><button class="btn btn-success mx-3 text-dark" onclick="suspendId('.$row['watch_id'].')" data-toggle="modal" data-target="#product-suspend"><i class="far fa-play-circle fa-fw" aria-hidden="true"></i> Restore</button></div></td>';
                                                            }
                                                        
                                                        echo "</tr>";
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
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
        <!-- Add Product -->
        <div id="product-add" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg py-4">
                <div class="modal-content border-5 mt-3">
                    <div class="modal-header bg-light text-center ">
                        <h3 class="font-weight-light my-2 w-100">Add Product</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="modal-add">
                        <form action="includes/add_product.inc.php" method="post">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" name="brand">Brand</label><input class="form-control py-4" type="text" name="brand" placeholder="Enter product brand" required></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" name="name">Product Name</label><input class="form-control py-4" type="text" name="name" placeholder="Enter product name" required></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" name="type">Watch Type</label><input class="form-control py-4" type="text" name="type" placeholder="Enter watch type" required></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" name="material">Watch Material</label><input class="form-control py-4" type="text" name="material" placeholder="Enter watch material" required></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" name="band">Watch Band Material</label><input class="form-control py-4" type="text" name="band" placeholder="Enter watch band material" required></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" name="quantity">Quantity</label><input class="form-control py-4" type="text" name="quantity" placeholder="Enter product quantity" required></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" name="cost">Cost</label><input class="form-control py-4" type="text" name="cost" placeholder="Enter cost" required></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" name="price">Price</label><input class="form-control py-4" type="text" name="price" placeholder="Enter price" required></div>
                                </div>
                            </div>
                            <div class="form-group"><label class="small mb-1" name="image">Image</label><input class="form-control py-4" type="text" name="image" placeholder="Enter image path" required></div>
                            <div class="form-group"><label class="small mb-1" name="description">Description</label><textarea class="form-control" type="text" row="4" name="description" placeholder="Enter product description" required></textarea></div>
                            <div class="form-group mt-4 mb-0"><button class="btn btn-block" name="add-submit" type="submit" style="background-color: #a8fdcc"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Product -->
        <div id="product-edit" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg py-4">
                <div class="modal-content border-5 mt-3">
                    <div class="modal-header bg-light text-center ">
                        <h3 class="font-weight-light my-2 w-100">Edit Product</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="modal-edit">
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete Product -->
        <div id="product-suspend" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg py-4">
                <div class="modal-content border-5 mt-3">
                    <div class="modal-header bg-light text-center ">
                        <h3 class="font-weight-light my-2 w-100">Suspend Product</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="modal-suspend">
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="js/table.js"></script>
        <script>
            function editId(id) {
                jQuery("#modal-edit").load("includes/modal_edit.inc.php", {
                idNewId: id
            });
            }
        </script>
        <script>
            function suspendId(id) {
                jQuery("#modal-suspend").load("includes/modal_suspend.inc.php", {
                idNewId: id
            });
            }
        </script>
    </body>
</html>
