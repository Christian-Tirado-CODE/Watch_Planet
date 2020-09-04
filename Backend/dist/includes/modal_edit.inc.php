<?php
    require 'connection.inc.php';
    $idNewId = $_POST['idNewId'];
    $sql = "SELECT * FROM watch WHERE watch_id='$idNewId';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
    }

    echo '<form action="includes/edit_product.inc.php" method="post">';
    echo   '<div class="form-row">';
    echo        '<div class="col-md-6">';
    echo            '<div class="form-group"><label class="small mb-1" name="brand">Brand</label><input class="form-control py-4" type="text" name="brand" value="'.$row['brand'].'" placeholder="Enter product brand" required></div>';
    echo        '</div>';
    echo        '<div class="col-md-6">';
    echo            '<div class="form-group"><label class="small mb-1" name="name">Product Name</label><input class="form-control py-4" type="text" name="name" value="'.$row['name'].'" placeholder="Enter product name" required></div>';
    echo        '</div>';
    echo    '</div>';
    echo    '<div class="form-row">';
    echo        '<div class="col-md-6">';
    echo            '<div class="form-group"><label class="small mb-1" name="type">Watch Type</label><input class="form-control py-4" type="text" name="type" value="'.$row['type'].'" placeholder="Enter watch type" required></div>';
    echo        '</div>';
    echo        '<div class="col-md-6">';
    echo            '<div class="form-group"><label class="small mb-1" name="material">Watch Material</label><input class="form-control py-4" type="text" name="material" value="'.$row['material'].'" placeholder="Enter watch material" required></div>';
    echo        '</div>';
    echo    '</div>';
    echo    '<div class="form-row">';
    echo        '<div class="col-md-6">';
    echo            '<div class="form-group"><label class="small mb-1" name="band">Watch Band Material</label><input class="form-control py-4" type="text" name="band" value="'.$row['band'].'" placeholder="Enter watch band material" required></div>';
    echo        '</div>';
    echo        '<div class="col-md-6">';
    echo            '<div class="form-group"><label class="small mb-1" name="quantity">Quantity</label><input class="form-control py-4" type="text" name="quantity" value="'.$row['quantity'].'" placeholder="Enter product quantity" required></div>';
    echo        '</div>';
    echo    '</div>';
    echo    '<div class="form-row">';
    echo        '<div class="col-md-6">';
    echo            '<div class="form-group"><label class="small mb-1" name="cost">Cost</label><input class="form-control py-4" type="text" name="cost" value="'.$row['cost'].'" placeholder="Enter cost" required></div>';
    echo        '</div>';
    echo        '<div class="col-md-6">';
    echo            '<div class="form-group"><label class="small mb-1" name="price">Price</label><input class="form-control py-4" type="text" name="price" value="'.$row['price'].'" placeholder="Enter price" required></div>';
    echo        '</div>';
    echo    '</div>';
    echo    '<div class="form-group"><label class="small mb-1" name="description">Description</label><textarea class="form-control" type="text" row="4" name="description" placeholder="Enter product description" required>'.$row['description'].'</textarea></div>';
    echo    '<div class="form-group mt-4 mb-0"><button class="btn btn-block" id="edit-id" name="edit-submit" type="submit" value="'.$row['watch_id'].'" style="background-color: #a8fdcc"><i class="far fa-edit" aria-hidden="true"></i></button></div>';
    echo'</form>';