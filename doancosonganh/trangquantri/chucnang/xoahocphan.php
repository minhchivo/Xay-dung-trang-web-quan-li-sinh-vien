<?php
include("../config.php");
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $sql = "DELETE FROM hocphan WHERE MaHocPhan = $id";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        $message = "Xóa học phần thành công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=3';
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($mysqli);
    }
}

mysqli_close($mysqli);
?>
