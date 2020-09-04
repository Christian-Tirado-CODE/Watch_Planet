 <?php
    if (isset($_POST['suspend-submit'])) {
        require 'connection.inc.php';
        
        $watch_id = mysqli_real_escape_string($conn, $_POST['suspend-submit']);
        $status = mysqli_real_escape_string($conn, "suspended");

            $sql = "SELECT name FROM watch WHERE watch_id=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../products.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $watch_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql = "UPDATE watch SET status=? WHERE watch_id=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../products.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ss", $status, $watch_id);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../products.php");
                    exit();
                }
            }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else if (isset($_POST['restore-submit'])) {
        require 'connection.inc.php';
        
        $watch_id = mysqli_real_escape_string($conn, $_POST['restore-submit']);
        $status = mysqli_real_escape_string($conn, "active");

            $sql = "SELECT name FROM watch WHERE watch_id=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../products.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $watch_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql = "UPDATE watch SET status=? WHERE watch_id=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../products.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ss", $status, $watch_id);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../products.php");
                    exit();
                }
            }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else {
        header("Location: ../products.php?productadded");
        exit();
    }