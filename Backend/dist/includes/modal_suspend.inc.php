<?php
    require 'connection.inc.php';
    $idNewId = $_POST['idNewId'];
    $sql = "SELECT * FROM watch WHERE watch_id='$idNewId';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['status'] == "active") {
            echo '<form action="includes/suspend_product.inc.php" method="post">
                    <div class="container fluid">
                     <div class="form-group mt-4 mb-0">
                        <h4 class="font-weight-light text-center">Are you sure you want to suspend the product: </h4>
                        <h4 class="text-center">'.$row['brand'].' '.$row['name'].'</h4></div>
                     <div class="form-row"><div class="col-md mt-4 mb-0"><button class="btn btn-block pull-left" id="suspend-id" name="suspend-submit" type="submit" value="'.$row['watch_id'].'" style="background-color: #a8fdcc"><i class="far fa-stop-circle" aria-hidden="true"></i></i></button></div><div class="col-md mt-4 mb-0"><button class="btn btn-block pull-right" data-dismiss="modal" style="background-color: #580233"><i class="far fa-window-close" style="color:#DDDDDD;" aria-hidden="true"></i></i></button></div></div>
                     </div>
                  </form>';
        }
        else {
            echo '<form action="includes/suspend_product.inc.php" method="post">
                    <div class="container fluid">
                     <div class="form-group mt-4 mb-0">
                        <h4 class="font-weight-light text-center">Are you sure you want to restore the product: </h4>
                        <h4 class="text-center">'.$row['brand'].' '.$row['name'].'</h4></div>
                     <div class="form-row"><div class="col-md mt-4 mb-0"><button class="btn btn-block pull-left" id="restore-id" name="restore-submit" type="submit" value="'.$row['watch_id'].'" style="background-color: #a8fdcc"><i class="far fa-play-circle" aria-hidden="true"></i></i></button></div><div class="col-md mt-4 mb-0"><button class="btn btn-block pull-right" data-dismiss="modal" style="background-color: #580233"><i class="far fa-window-close" style="color:#DDDDDD;" aria-hidden="true"></i></i></button></div></div>
                     </div>
                  </form>';
        }
        

    }