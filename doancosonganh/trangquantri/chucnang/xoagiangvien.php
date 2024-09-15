<?php
include("../config.php");
$message = "";

if(isset($_GET['magiangvien'])) {
    $magiangvien = $_GET['magiangvien'];
    $sql_delete = "DELETE FROM giangvien WHERE MaGiangVien='$magiangvien'";
    if(mysqli_query($mysqli, $sql_delete)) {
        $message = "Xóa giảng viên thành công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=7';
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Lỗi xóa giảng viên: " . mysqli_error($mysqli);
    }
} else {
    echo "Không có mã giảng viên được cung cấp để xóa.";
}

mysqli_close($mysqli);
?>
