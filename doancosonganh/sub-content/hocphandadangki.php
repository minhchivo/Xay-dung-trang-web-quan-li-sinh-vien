<?php


// Lấy MSSV từ biến phiên
$mssv = $_SESSION['ma_sv'];

include("config.php");

$sql = "SELECT * FROM dangkihocphan WHERE MSSV = '$mssv'";
$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đăng ký học phần</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
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
            text-align: left;
            border-bottom: 1px solid black;
        }

        th {
            background-color: #f2f2f2;
            color: black; 
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            color:black;
        }

        tr td:first-child { 
            color: black;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 18px;
            margin-top: 20px;
            color:black;
        }

        form label {
            margin-bottom: 10px;
        }

        form select,
        form input[type="submit"] {
            width: 360px;
            margin-bottom: 10px;
            padding: 10px;
            box-shadow: 0px 3px 3px #990000;
            background-color: #660000;
            color: white;
            font-weight: bold;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            text-align: center;
        }

        form input[type="submit"]:hover {
            background-color: #990000;
            cursor: pointer;
        }

        .button-container {
            text-align: center;
            margin-top: 10px;
        }

        .button-container button {
            background-color: #660000;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-container button:hover {
            background-color: #990000;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Lịch sử đăng ký học phần</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>STT</th><th>MSSV</th><th>Mã Học Phần</th><th>Học Kỳ</th><th>Số Tín Chỉ</th><th>Mã Ngành</th><th>Mã Giảng Viên</th><th>Lớp Học Phần</th><th>Ngày Bắt Đầu</th><th>Ngày Kết Thúc</th><th>Số Tiền Phải Đóng</th><th>Trạng Thái Lớp Học Phần</th><th>Phòng Học</th><th>Tên Giảng Viên</th><th>Ngày Đăng Kí</th><th>Thứ Học</th><th>Tiết Học</th><th>Trạng Thái Đăng Kí</th></tr>";

        $stt = 1;
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $stt . "</td>";
            echo "<td>" . $row["MSSV"] . "</td>";
            echo "<td>" . $row["MaHocPhan"] . "</td>";
            echo "<td>" . $row["HocKy"] . "</td>";
            echo "<td>" . $row["SoTinChi"] . "</td>";
            echo "<td>" . $row["MaNganh"] . "</td>";
            echo "<td>" . $row["MaGiangVien"] . "</td>";
            echo "<td>" . $row["LopHocPhan"] . "</td>";
            echo "<td>" . $row["NgayBatDau"] . "</td>";
            echo "<td>" . $row["NgayKetThuc"] . "</td>";
            echo "<td>" . $row["SoTienPhaiDong"] . "</td>";
            echo "<td>" . $row["TrangThaiLopHocPhan"] . "</td>";
            echo "<td>" . $row["PhongHoc"] . "</td>";
            echo "<td>" . $row["TenGiangVien"] . "</td>";
            echo "<td>" . $row["NgayDangKi"] . "</td>";
            echo "<td>" . $row["ThuHoc"] . "</td>";
            echo "<td>" . $row["Tiethoc"] . "</td>";
            echo "<td>" . $row["TrangThaiDangKi"] . "</td>";
            echo "</tr>";
            $stt++;
        }
        echo "</table>";
    } else {
        echo "Không có học phần nào được đăng ký.";
    }
    $mysqli->close();
    ?>
    <button onclick="history.back();">Quay Lại</button>
    </div>
</body>
</html>
