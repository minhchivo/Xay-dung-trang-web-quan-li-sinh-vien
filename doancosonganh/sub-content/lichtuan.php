<?php
include("config.php");


$ma_sv = $_SESSION['ma_sv'];

$sql = "SELECT * FROM lichhoc WHERE MSSV = '$ma_sv'";
$result = $mysqli->query($sql);

$lichHocTheoThu = array(
    "2" => array(), 
    "3" => array(),
    "4" => array(), 
    "5" => array(), 
    "6" => array(), 
    "7" => array(), 
    "CN" => array()  
);

while ($row = $result->fetch_assoc()) {
    $thuHoc = $row["ThuHoc"];
    array_push($lichHocTheoThu[$thuHoc], $row);
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch học</title>
    <style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffcccc; /* Màu nền đỏ */
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px #ccc;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid black;
        }

        th {
            background-color: #f2f2f2;
            color: black; /* Thay đổi màu chữ thành đen */
        }

        tr:nth-child(even) {
            color:black;
        }

        tr td:first-child { /* Thay đổi màu chữ cho cột đầu tiên */
            color: black;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 style="color:black;">Lịch học </h2>


<table>
    <tr>
        <th></th>
        <th>Thứ 2</th>
        <th>Thứ 3</th>
        <th>Thứ 4</th>
        <th>Thứ 5</th>
        <th>Thứ 6</th>
        <th>Thứ 7</th>
        <th>Chủ nhật</th>
    </tr>
    <?php
    for ($tiet = 1; $tiet <= 3; $tiet++) {
        echo "<tr>";
        echo "<td >Ca  $tiet</td>";
        for ($thu = 2; $thu <= 8; $thu++) {
            $lichHoc = isset($lichHocTheoThu[$thu][$tiet - 1]) ? $lichHocTheoThu[$thu][$tiet - 1] : null;
            echo "<td>";
            if ($lichHoc) {
                echo "Mã học phần: " . $lichHoc['MaHocPhan'] . "<br>";
                echo "Lớp Học Phần: " . $lichHoc['LopHocPhan'] . "<br>";
                echo "Phòng học: " . $lichHoc['PhongHoc'] . "<br>";
                echo "Mã giảng viên: " . $lichHoc['MaGiangVien'];
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</div>
</body>
</html>
