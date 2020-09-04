 <?php
    if (isset($_POST['suspend-submit'])) {
        require 'connection.inc.php';
        
        $id = mysqli_real_escape_string($conn, $_POST['suspend-submit']);
        $status = mysqli_real_escape_string($conn, "suspended");

            $sql = "SELECT name FROM user WHERE id=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../user.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $sql = "UPDATE user SET status=? WHERE id=?;";
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