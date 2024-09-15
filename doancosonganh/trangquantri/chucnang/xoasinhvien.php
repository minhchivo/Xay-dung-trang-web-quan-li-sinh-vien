<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa sinh viên</title>
</head>
<body>
    <h2>Xóa sinh viên</h2>

    <?php
    include("../config.php");

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $sql = "DELETE FROM sinhvien WHERE MSSV = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("i", $param_id);
            
            $param_id = trim($_GET["id"]);

            if($stmt->execute()){
                $message = "Xóa sinh viên thành công!";
                echo "<script>
                        window.history.back();
                        alert('$message');
                      </script>";
                exit();
            } else{
                echo "Đã xảy ra lỗi. Vui lòng thử lại sau.";
            }

            $stmt->close();
        }
    }

    $mysqli->close();
    ?>
    <br>
</body>
</html>
