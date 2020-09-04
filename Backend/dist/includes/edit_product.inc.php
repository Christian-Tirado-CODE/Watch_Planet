 <?php
    if (isset($_POST['edit-submit'])) {
        require 'connection.inc.php';
    
        $watch_id = mysqli_real_escape_string($conn, $_POST['edit-submit']);
        $brand = mysqli_real_escape_string($conn, $_POST['brand']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $material = mysqli_real_escape_string($conn, $_POST['material']);
        $band = mysqli_real_escape_string($conn, $_POST['band']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $cost = mysqli_real_escape_string($conn, $_POST['cost']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        
        if (!preg_match("/^[a-zA-Z0-9]*$/", $brand) && !preg_match("/^[a-zA-Z0-9]*$/", $name) && !preg_match("/^[a-zA-Z]*$/", $type) && !preg_match("/^[a-zA-Z]*$/", $material) && !preg_match("/^[a-zA-Z]*$/", $band) && !preg_match("/^[0-9]*$/", $quantity) && !preg_match("/^[0-9]*$/", $cost) && !preg_match("/^[0-9]*$/", $price)) {
            header("Location: ../products.php?error=invalidinputs");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $brand)) {
            header("Location: ../products.php?error=invalidbrand");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
            header("Location: ../products.php?error=invalidname");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z]*$/", $type)) {
            header("Location: ../products.php?error=invalidtype");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z]*$/", $material)) {
            header("Location: ../products.php?error=invalidmaterial");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z]*$/", $band)) {
            header("Location: ../products.php?error=invalidband");
            exit();
        }
        else if (!preg_match("/^[0-9]*$/", $quantity)) {
            header("Location: ../products.php?error=invalidmaterial");
            exit();
        }
        else if (!preg_match("/^[0-9.]*$/", $cost)) {
            header("Location: ../products.php?error=invalidcost");
            exit();
        }
        else if (!preg_match("/^[0-9.]*$/", $price)) {
            header("Location: ../products.php?error=invalidprice");
            exit();
        }
        else {
            $sql = "SELECT name FROM watch WHERE brand=? AND name=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../products.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $brand, $name);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql = "UPDATE watch SET brand=?, name=?, type=?, material=?, band=?, quantity=?, cost=?, price=?, description=? WHERE watch_id=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../products.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ssssssssss", $brand, $name, $type, $material, $band, $quantity, $cost, $price, $description, $watch_id);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../products.php");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else {
        header("Location: ../products.php&productadded");
        exit();
    }