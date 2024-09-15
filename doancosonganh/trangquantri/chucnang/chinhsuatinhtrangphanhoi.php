<?php
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['process'])) {
    $mssv = $_POST['mssv'];

    $sql_update = "UPDATE phanhoi SET TinhTrangXuLy='đã xử lí' WHERE MSSV='$mssv'";
    if ($mysqli->query($sql_update) === TRUE) {

        header("Location: trangquantri.php?pid=16");
        exit();
    } else {
        echo "Lỗi: " . $mysqli->error;
    }
}

$mysqli->close();
?>
