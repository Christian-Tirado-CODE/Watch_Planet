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
        <title>Watch Planet - Returns</title>
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
                        <h1 class="mt-4">Sales By Month</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">Sales</li>
                            <li class="breadcrumb-item active">By Month</li>
                        </ol>
                         <?php
                             if(isset($_POST['submit'])){
                                $firstDayOfMonth = date ("Y-m-d", strtotime("first day of ". $_POST["month"])); // Week 1
                                $lastDayOfMonth =  date ("Y-m-t", strtotime($firstDayOfMonth));
                                //Convert strtotime to date format for displaying on screen
                                $firstDayOfMonthDateFormat =  getdate(strtotime($firstDayOfMonth));
                                $firstDayOfMonthDateFormat = $firstDayOfMonthDateFormat['month'].' '.$firstDayOfMonthDateFormat['mday'].', '.$firstDayOfMonthDateFormat['year'];
                                $lastDayOfMonthDateFormat =  getdate(strtotime($lastDayOfMonth));
                                $lastDayOfMonthDateFormat = $lastDayOfMonthDateFormat['month'].' '.$lastDayOfMonthDateFormat['mday'].', '.$lastDayOfMonthDateFormat['year'];
                                
                                if(!isset($_POST['group_products'])) 
                                    $_POST['group_products'] = 'no';
                                
                                    $group_products = $_POST['group_products'];
                                   echo '
                                   
                                   <div class="card mb-4 mt-4">
                
                                   <div class="card-header"><i class="fas fa-tags"></i> Sales between '.$firstDayOfMonthDateFormat.' and '.$lastDayOfMonthDateFormat.'</div>
                                   <div class="card-body">
                                       <div class="table-responsive">
                                           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                               <thead>
                                                   <tr>';
                                                          if($_POST['group_products'] == 'yes'){
                                                              echo " <th>Product Brand</th>
                                                                     <th>Product Name</th>
                                                                     <th>Sales</th>";
                                                          } else {
                                                               echo "<th>Total Sales</th>";
                                                          }
                    
                                        echo           '</tr>
                                            
                                               <tbody>';

                                               if($_POST['group_products'] == 'yes'){
                                                         $sql = "SELECT watch.brand, watch.name, SUM(details.quantity) as sales
	                                                     FROM watch 
	                                                     JOIN details 
	                                                     ON watch.watch_id = details.watch_id
	                                                     JOIN orders
	                                                     ON orders.order_id = details.order_id AND order_date BETWEEN '$firstDayOfMonth'AND '$lastDayOfMonth' GROUP BY name;";
                                                          mysqli_query($conn, $sql);
                                                          $result = mysqli_query($conn, $sql);   
                                                          $resultCheck = mysqli_num_rows($result);
                                                            
                                                          
                                                          if($resultCheck > 0){
                                                            while($row = mysqli_fetch_assoc($result)){
                                                             echo "<tr><td>".$row['brand']."</td>". 
                                                               "<td>".$row['name']."</td>".
                                                               "<td>".$row['sales']."</td>";
                                                           }
                                                        } else {
                                                         echo "<tr><td>No returns</td><td>No returns</td><td>No returns</td></tr>";
                                                               
                                                     
                                                        } 
                                                   } else { // WITHOUT GROUPING
                                                     $sql = "SELECT watch.brand, watch.name, SUM(details.quantity) as sales
                                                     FROM watch 
                                                     JOIN details 
                                                     ON watch.watch_id = details.watch_id
                                                     JOIN orders
                                                     ON orders.order_id = details.order_id AND order_date BETWEEN '$firstDayOfMonth'AND '$lastDayOfMonth';";
                                                      mysqli_query($conn, $sql);
                                                      $result = mysqli_query($conn, $sql);   
                                                      $resultCheck = mysqli_num_rows($result);
                                                        
                                                      if($resultCheck > 0){
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            if(!empty($row['sales'])){
                                                               echo "<td>".$row['sales']."</td>";
                                                            } else{
                                                                echo "<td>0</td>";
                                                            }
                                                        }
                                                     } else {
                                                       echo "<tr><td>N/A</td><td>N/A</td><td>0</td></tr>";
                                                             
                                                   
                                                      }
                                                  }    

                                        echo   '</tbody>
                                           </table>
                                       </div>
                                   </div>
                              </div>
                                   

                                   
                                   
                              ';


                              } else {
                                 echo' <div class="card rounded-lg mt-0">
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Choose a month:</h3></div>
                                                <div class="card-body">
                                                    <form id="revenueForm" action="sales-by-month.php" method="POST">
                                                        
                                         <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="month" id="example-date-input" name="month" required>
                                            </div>
                                            </div> 
                                             
                                                <div class="form-group row">
                                                    <div class="checkbox ml-3 mr-2">
                                                        <label><input type="checkbox" name="group_products" value="yes"></label>
                                                      </div>
                                                      <label>Group products</label>
                                                  </div>

                                                <button type="submit" name="submit" class="btn btn-success btn-block">Show Sales</button>
                                                </form>
                                            </div>
                                        </div>';

                              }
                        
                         
                        
                        
                        ?>
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>








           