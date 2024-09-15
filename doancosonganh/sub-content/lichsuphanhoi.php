<?php
include("config.php");


$mssv = $_SESSION['ma_sv'];

$sql = "SELECT * FROM phanhoi WHERE MSSV = '$mssv'";

$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Phản Hồi</title>
    <style>
        .main-contain{
            width: 70%;
            margin: 20px auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 3px;
            box-shadow: 2px 2px 5px #CC0000;
            border:1px solid #ddd;
            color:black;
           
        }
        .title h2{
            color:#555555;
            border-bottom:1px solid #CC0000	;
            padding-bottom:3px;
            text-align:center;
        }
        .main{
            display:flex;
            justify-content:center;
        }
        .main th{
            
            background-color:#CD2626;
            font-family:arial;
            font-size:22px;
            font-weight:bold;
            color:#1C1C1C;
        }


        .main td{
            background-color:transparent;
            font-size:22px;

        }
        .main tr,td,th{
            width:auto;
            border:1px solid black;
            padding:5px;
            text-align:center;
        }
    </style>
</head>
<body>
<div class="main-contain"> 
    <div class="title">
<h2>Lịch Sử Phản Hồi</h2>
    </div>
    <div class="main">
<table>
    <tr>
        <th>MaPhanHoi</th>
        <th>MSSV</th>
        <th>Họ Tên</th>
        <th>Nội Dung</th>
        <th>Trạng Thái</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["MaPhanHoi"]."</td>";
            echo "<td>".$row["MSSV"]."</td>";
            echo "<td>".$row["HoTen"]."</td>";
            echo "<td>".$row["NoiDung"]."</td>";
            echo "<td>".$row["TrangThai"]."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Không có phản hồi nào</td></tr>";
    }
    ?>
</table>
</div>
</div>
</body>
</html>

<?php
$mysqli->close();
?>
