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
        <title>Watch Planet - Home</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
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
                        <h1 class="mt-4">Home</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Financial Chart</div>
                            <?php
                                $january = "SELECT sum(watch.price*details.quantity) as revenue, sum(watch.cost*details.quantity) as cost, sum(watch.price*details.quantity)-sum(watch.cost*details.quantity) as profit
                                FROM details
                                JOIN watch
                                ON details.watch_id = watch.watch_id
                                JOIN  orders
                                ON orders.order_id = details.order_id
                                WHERE orders.order_date BETWEEN '2020-01-01' AND '2020-01-31';";
                                $february = "SELECT sum(watch.price*details.quantity) as revenue, sum(watch.cost*details.quantity) as cost, sum(watch.price*details.quantity)-sum(watch.cost*details.quantity) as profit
                                FROM details
                                JOIN watch
                                ON details.watch_id = watch.watch_id
                                JOIN  orders
                                ON orders.order_id = details.order_id
                                WHERE orders.order_date BETWEEN '2020-02-01' AND '2020-02-29';";
                                $march = "SELECT sum(watch.price*details.quantity) as revenue, sum(watch.cost*details.quantity) as cost, sum(watch.price*details.quantity)-sum(watch.cost*details.quantity) as profit
                                FROM details
                                JOIN watch
                                ON details.watch_id = watch.watch_id
                                JOIN  orders
                                ON orders.order_id = details.order_id
                                WHERE orders.order_date BETWEEN '2020-03-01' AND '2020-03-31';";
                                $april = "SELECT sum(watch.price*details.quantity) as revenue, sum(watch.cost*details.quantity) as cost, sum(watch.price*details.quantity)-sum(watch.cost*details.quantity) as profit
                                FROM details
                                JOIN watch
                                ON details.watch_id = watch.watch_id
                                JOIN  orders
                                ON orders.order_id = details.order_id
                                WHERE orders.order_date BETWEEN '2020-04-01' AND '2020-04-31';";
                                $may = "SELECT sum(watch.price*details.quantity) as revenue, sum(watch.cost*details.quantity) as cost, sum(watch.price*details.quantity)-sum(watch.cost*details.quantity) as profit
                                FROM details
                                JOIN watch
                                ON details.watch_id = watch.watch_id
                                JOIN  orders
                                ON orders.order_id = details.order_id
                                WHERE orders.order_date BETWEEN '2020-05-01' AND '2020-05-31';";
                                $june = "SELECT sum(watch.price*details.quantity) as revenue, sum(watch.cost*details.quantity) as cost, sum(watch.price*details.quantity)-sum(watch.cost*details.quantity) as profit
                                FROM details
                                JOIN watch
                                ON details.watch_id = watch.watch_id
                                JOIN  orders
                                ON orders.order_id = details.order_id
                                WHERE orders.order_date BETWEEN '2020-06-01' AND '2020-06-31';";

                                $januaryResult = mysqli_query($conn, $january);   
                                $januaryResultCheck = mysqli_num_rows($januaryResult);
                                $februaryResult = mysqli_query($conn, $february);   
                                $februaryResultCheck = mysqli_num_rows($februaryResult);
                                $marchResult = mysqli_query($conn, $march);   
                                $marchResultCheck = mysqli_num_rows($marchResult);
                                $aprilResult = mysqli_query($conn, $april);   
                                $aprilResultCheck = mysqli_num_rows($aprilResult);
                                $mayResult = mysqli_query($conn, $may);   
                                $mayResultCheck = mysqli_num_rows($mayResult);
                                $juneResult = mysqli_query($conn, $june);   
                                $juneResultCheck = mysqli_num_rows($juneResult);
                                 
                                if($januaryResultCheck > 0){
                                    while($row = mysqli_fetch_assoc($januaryResult)){
                                            $januaryRevenue = $row['revenue'];
                                            $januaryCost = $row['cost'];
                                            $januaryProfit = $row['profit'];
                                   }
                                }
                                if($februaryResultCheck > 0){
                                    while($row = mysqli_fetch_assoc($februaryResult)){
                                            $februaryRevenue = $row['revenue'];
                                            $februaryCost = $row['cost'];
                                            $februaryProfit = $row['profit'];
                                    }
                                   }
                                if($marchResultCheck > 0){
                                    while($row = mysqli_fetch_assoc($marchResult)){
                                            $marchRevenue = $row['revenue'];
                                            $marchCost = $row['cost'];
                                            $marchProfit = $row['profit'];
                                    }
                                   }
                                if($aprilResultCheck > 0){
                                    while($row = mysqli_fetch_assoc($aprilResult)){
                                            $aprilRevenue = $row['revenue'];
                                            $aprilCost = $row['cost'];
                                            $aprilProfit = $row['profit'];
                                    }
                                   }
                                if($mayResultCheck > 0){
                                    while($row = mysqli_fetch_assoc($mayResult)){
                                            $mayRevenue = $row['revenue'];
                                            $mayCost = $row['cost'];
                                            $mayProfit = $row['profit'];
                                   }
                                }
                                if($juneResultCheck > 0){
                                    while($row = mysqli_fetch_assoc($juneResult)){
                                            $juneRevenue = $row['revenue'];
                                            $juneCost = $row['cost'];
                                            $juneProfit = $row['profit'];
                                   }
                                }
                            ?>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
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
        <script>
            var januaryRevenue = <?php echo $januaryRevenue;?>;
            var januaryCost = <?php echo $januaryCost;?>;
            var januaryProfit = <?php echo $januaryProfit;?>;
            var februaryRevenue = <?php echo $februaryRevenue;?>;
            var februaryCost = <?php echo $februaryCost;?>;
            var februaryProfit = <?php echo $februaryProfit;?>;
            var marchRevenue = <?php echo $marchRevenue;?>;
            var marchCost = <?php echo $marchCost;?>;
            var marchProfit = <?php echo $marchProfit;?>;
            var aprilRevenue = <?php echo $aprilRevenue;?>;
            var aprilCost = <?php echo $aprilCost;?>;
            var aprilProfit = <?php echo $aprilProfit;?>;
            var mayRevenue = <?php echo $mayRevenue;?>;
            var mayCost = <?php echo $mayCost;?>;
            var mayProfit = <?php echo $mayProfit;?>;
            var juneRevenue = <?php echo $juneRevenue;?>;
            var juneCost = <?php echo $juneCost;?>;
            var juneProfit = <?php echo $juneProfit;?>;
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>




