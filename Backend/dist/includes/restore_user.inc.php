 <?php
    if (isset($_POST['restore-submit'])) {
        require 'connection.inc.php';
        
        $admin_admin_id = mysqli_real_escape_string($conn, $_POST['restore-submit']);
        $status = mysqli_real_escape_string($conn, "active");

            $sql = "SELECT name FROM user WHERE admin_id=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../user.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $admin_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql = "UPDATE user SET status=? WHERE admin_id=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../user.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ss", $status, $id);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../user.php");
                    exit();
                }
            }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else {
        header("Location: ../user.php&suspended");
        exit();
    }