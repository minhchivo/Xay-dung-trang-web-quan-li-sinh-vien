<?php
include("config.php");

$ma_sv = $_SESSION['ma_sv'];

$sql = "SELECT * FROM thanhtoanhocphi WHERE MSSV = '$ma_sv'";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử thanh toán học phí</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        h2 {
            color: black;
            margin-bottom: 10px;
            text-align: center;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Lịch sử thanh toán học phí</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>MSSV</th><th>Số tiền đã nộp</th><th>Ngày nộp</th><th>Trạng thái</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["MSSV"] . "</td>";
            echo "<td>" . $row["SoTienDaNop"] . "</td>";
            echo "<td>" . $row["NgayNop"] . "</td>";
            echo "<td>" . $row["TrangThai"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu lịch sử thanh toán.";
    }
    ?>
<button onclick="history.back();">Quay Lại</button>
    
</div>

</body>
</html>
