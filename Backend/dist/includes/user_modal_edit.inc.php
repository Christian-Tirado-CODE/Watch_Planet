<?php
    require 'connection.inc.php';
    $idNewId = $_POST['idNewId'];
    $sql = "SELECT * FROM user WHERE admin_id='$idNewId';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
    }

    echo    '<form action="includes/edit_user.inc.php" method="post">';
    echo        '<div class="form-row">';
    echo            '<div class="col-md-6">';
    echo                '<div class="form-group"><label class="small mb-1" name="name" for="inputFirstName">First Name</label><input class="form-control py-4" type="text" name="name" value="'.$row['first_name'].'" placeholder="Enter first name" required></div>';
    echo            '</div>';
    echo            '<div class="col-md-6">';
    echo                '<div class="form-group"><label class="small mb-1" name="last_name" for="inputLastName">Last Name</label><input class="form-control py-4" type="text" name="last_name" value="'.$row['last_name'].'" placeholder="Enter last name" required></div>';
    echo            '</div>';
    echo        '</div>';
    echo        '<div class="form-group"><label class="small mb-1" name="email" for="inputEmailAddress">Email</label><input class="form-control py-4" type="email" aria-describedby="emailHelp" name="email" value="'.$row['email'].'" placeholder="Enter email address" required></div>';
    echo        '<div class="form-row">';
    echo            '<div class="col-md-6">';
    echo                '<div class="form-group"><label class="small mb-1" name="pass" for="inputPassword">Password</label><input class="form-control py-4" type="password" name="pass" placeholder="Enter password" required></div>';
    echo            '</div>';
    echo            '<div class="col-md-6">';
    echo                '<div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirm Password</label><input class="form-control py-4" name="pass_confirm" type="password" placeholder="Confirm password" required></div>';
    echo            '</div>';
    echo        '</div>';
    echo        '<div class="form-group mt-4 mb-0"><button class="btn btn-block" name="edit-submit" value="'.$row['id'].'" type="submit" style="background-color: #a8fdcc"><i class="far fa-edit" aria-hidden="true"></i></button></button></div>';
    echo    '</form>';