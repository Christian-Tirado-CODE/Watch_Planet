<?php
    require 'connection.inc.php';
    $idNewId = $_POST['idNewId'];
    $sql = "SELECT * FROM user WHERE id='$idNewId';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
    }

    if ($row['status'] == "active") {
        echo '<form action="includes/suspend_user.inc.php" method="post">';
        echo '<div class="container fluid">';
        echo '<div class="form-group mt-4 mb-0">';
        echo '<h4 class="font-weight-light text-center">Are you sure you want to suspend</h4>';
        echo '<h4 class="font-weight-light text-center"><b>'.$row['name'].' '.$row['last_name'].'\'s</b> account? </h4></div>';
        echo '<div class="form-row"><div class="col-md mt-4 mb-0"><button class="btn btn-block pull-left" id="suspend-id" name="suspend-submit" type="submit" value="'.$row['id'].'" style="background-color: #a8fdcc"><i class="fas fa-user-times" aria-hidden="true"></i></i></button></div><div class="col-md mt-4 mb-0"><button class="btn btn-block pull-right" data-dismiss="modal" style="background-color: #580233"><i class="far fa-window-close" style="color:#DDDDDD;" aria-hidden="true"></i></i></button></div></div>';
        echo '</div>';
        echo '</form>';
    }
    else {
        echo '<form action="includes/restore_user.inc.php" method="post">';
        echo '<div class="container fluid">';
        echo '<div class="form-group mt-4 mb-0">';
        echo '<h4 class="font-weight-light text-center">Are you sure you want to restore</h4>';
        echo '<h4 class="font-weight-light text-center"><b>'.$row['name'].' '.$row['last_name'].'\'s</b> account? </h4></div>';
        echo '<div class="form-row"><div class="col-md mt-4 mb-0"><button class="btn btn-block pull-left" id="restore-id" name="restore-submit" type="submit" value="'.$row['id'].'" style="background-color: #a8fdcc"><i class="fas fa-user-check" aria-hidden="true"></i></i></button></div><div class="col-md mt-4 mb-0"><button class="btn btn-block pull-right" data-dismiss="modal" style="background-color: #580233"><i class="far fa-window-close" style="color:#DDDDDD;" aria-hidden="true"></i></i></button></div></div>';
        echo '</div>';
        echo '</form>';
    }

