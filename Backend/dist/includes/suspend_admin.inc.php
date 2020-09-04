 <?php
    if (isset($_POST['suspend-submit'])) {
        require 'connection.inc.php';
        
        $admin_id = mysqli_real_escape_string($conn, $_POST['suspend-submit']);
        $status = mysqli_real_escape_string($conn, "suspended");

            $sql = "SELECT first_name FROM admin WHERE admin_id=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../admin.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $admin_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql = "UPDATE admin SET status=? WHERE admin_id=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../admin.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ss", $status, $admin_id);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../admin.php");
                    exit();
                }
            }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else if (isset($_POST['restore-submit'])) {
        require 'connection.inc.php';
        
        $admin_id = mysqli_real_escape_string($conn, $_POST['restore-submit']);
        $status = mysqli_real_escape_string($conn, "active");

            $sql = "SELECT first_name FROM admin WHERE admin_id=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../admin.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $admin_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql = "UPDATE admin SET status=? WHERE admin_id=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../admin.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ss", $status, $admin_id);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../admin.php");
                    exit();
                }
            }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else {
        header("Location: ../admin.php?suspended");
        exit();
    }