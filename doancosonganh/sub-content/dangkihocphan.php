<?php

$message = "";

$mssv = $_SESSION['ma_sv'];


include("config.php");

$sql = "SELECT * FROM hocphan";
$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí học phần</title>
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
        <h2>Đăng kí học phần</h2>

        <?php
        if ($result->num_rows > 0) {
            
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Mã Học Phần</th>"; 
            echo "<th>Học Kỳ</th>"; 
            echo "<th>Số Tín Chỉ</th>"; 
            echo "<th>Mã Ngành</th>";
            echo "<th>Mã Giảng Viên</th>";
            echo "<th>Lớp Học Phần</th>";
            echo "<th>Ngày Bắt Đầu</th>";
            echo "<th>Ngày Kết Thúc</th>";
            echo "<th>Số Tiền Phải Đóng</th>";
            echo "<th>Trạng Thái Lớp Học Phần</th>";
            echo "<th>Phòng Học</th>";
            echo "<th>Tên Giảng Viên</th>";
            echo "<th>Thứ Học</th>";
            echo "<th>Tiết Học</th>";
            echo "</tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
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
                echo "<td>" . $row["ThuHoc"] . "</td>";
                echo "<td>" . $row["Tiethoc"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            echo "<form method='post'>";
            echo "<label for='hocphan'>Chọn học phần:</label>";
            echo "<select name='hocphan'>";
            mysqli_data_seek($result, 0); 
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["MaHocPhan"] . "'>" . $row["MaHocPhan"] . " - " . $row["LopHocPhan"] . "</option>";
            }
            echo "</select>";
            echo "<input type='submit' name='submit' value='Đăng kí'>";
            echo "</form>";
        }
        if(isset($_POST['submit'])) {
            $hocphan = $_POST['hocphan'];
            $ngayDangKi = date('Y-m-d');
            $trangThaiDangKi = "Thành công(Chờ xác nhận)";
            
            $sql_hocphan = "SELECT * FROM hocphan WHERE MaHocPhan = '$hocphan'";
            $result_hocphan = $mysqli->query($sql_hocphan);
            if ($result_hocphan->num_rows > 0) {
                $row_hocphan = $result_hocphan->fetch_assoc();
                $hocky = $row_hocphan["HocKy"];
                $sotinchi = $row_hocphan["SoTinChi"];
                $manganh = $row_hocphan["MaNganh"];
                $magiangvien = $row_hocphan["MaGiangVien"];
                $lophocphan = $row_hocphan["LopHocPhan"];
                $ngaybatdau = $row_hocphan["NgayBatDau"];
                $ngayketthuc = $row_hocphan["NgayKetThuc"];
                $sotienphaidong = $row_hocphan["SoTienPhaiDong"];
                $trangthailop = $row_hocphan["TrangThaiLopHocPhan"];
                $phonghoc = $row_hocphan["PhongHoc"];
                $tengiangvien = $row_hocphan["TenGiangVien"];
                $thuhoc = $row_hocphan["ThuHoc"];
                $tiethoc = $row_hocphan["Tiethoc"];
            } else {
                $message = "Không tìm thấy thông tin về học phần được chọn.";
                echo "<script>
                        window.location.href='index.php?pid=11';
                        alert('$message');
                    </script>";
                exit();
            }
            
            $sql_insert = "INSERT INTO dangkihocphan (MSSV,
                                                      MaHocPhan,
                                                      HocKy,
                                                      SoTinChi,
                                                      MaNganh, 
                                                      MaGiangVien, 
                                                      LopHocPhan, 
                                                      NgayBatDau, 
                                                      NgayKetThuc, 
                                                      SoTienPhaiDong,
                                                      TrangThaiLopHocPhan, 
                                                      PhongHoc, 
                                                      TenGiangVien, 
                                                      ThuHoc, 
                                                      Tiethoc, 
                                                      TrangThaiDangKi, 
                                                      NgayDangKi)
             VALUES ('$mssv',
                     '$hocphan',
                     '$hocky', 
                     '$sotinchi', 
                     '$manganh', 
                     '$magiangvien', 
                     '$lophocphan', 
                     '$ngaybatdau', 
                     '$ngayketthuc', 
                     '$sotienphaidong', 
                     '$trangthailop', 
                     '$phonghoc', 
                     '$tengiangvien', 
                     '$thuhoc', 
                     '$tiethoc', 
                     '$trangThaiDangKi', 
                     '$ngayDangKi')";
            if ($mysqli->query($sql_insert) === TRUE) {
                $message = "Đăng kí học phần thành công!";
                echo "<script>
                        window.location.href='index.php?pid=11';
                        alert('$message');
        </script>";
                exit();
            } else {
                echo "Error: " . $sql_insert . "<br>" . $mysqli->error;
                exit();
            }
        }
        
            $mysqli->close();
            ?>
        <div class="button-container">
            <button onclick="window.location.href='index.php?pid=16'">Lịch sử đăng kí</button>
        </div>
    </div>
</body>
</html>
