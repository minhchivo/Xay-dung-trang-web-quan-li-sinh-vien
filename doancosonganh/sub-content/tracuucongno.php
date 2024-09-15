<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin công nợ</title>
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
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: black; /* Thay đổi màu chữ thành đen */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr td:first-child { /* Thay đổi màu chữ cho cột đầu tiên */
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include("config.php");

        $_SESSION['ma_sv'] = $ma_sv;

        $sql = "SELECT * FROM hocphi WHERE MSSV = $ma_sv";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Thông tin công nợ cho sinh viên có MSSV: $ma_sv</h2>";
            echo "<table>";
            echo "<tr><th style='color: black;'>MSSV</th><th style='color: black;'>Năm học</th><th style='color: black;'>Học kỳ</th><th style='color: black;'>Ngày đăng kí</th><th style='color: black;'>Số tiền phải đóng</th><th style='color: black;'>Số tiền đã đóng</th><th style='color: black;'>Công nợ</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='color: black;'>" . $row["MSSV"] . "</td>";
                echo "<td style='color: black;'>" . $row["NamHoc"] . "</td>";
                echo "<td style='color: black;'>" . $row["HocKy"] . "</td>";
                echo "<td style='color: black;'>" . $row["NgayDangKi"] . "</td>";
                echo "<td style='color: black;'>" . $row["SoTienPhaiDong"] . "</td>";
                echo "<td style='color: black;'>" . $row["SoTienDaDong"] . "</td>";
                echo "<td style='color: black;'>" . $row["CongNo"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Không tìm thấy thông tin công nợ cho sinh viên có MSSV: $ma_sv";
        }
        $mysqli->close();
        ?>
    </div>
</body>
</html>
