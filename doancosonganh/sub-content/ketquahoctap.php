<?php
$mssv = $_SESSION['ma_sv']; 

// Kết nối database
include ("config.php");

// Truy vấn lấy dữ liệu kết quả học tập của sinh viên    
$sql = "SELECT * FROM ketquahoctap WHERE MSSV='$mssv'";
$result = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Kết quả học tập</title>
<style>
    body {
    font-family: Arial, sans-serif;
}

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
            font-size:14px;
            font-weight:bold;
            color:#1C1C1C;
        }


        .main td{
            background-color:transparent;
            font-size:15px;

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
        <h2>Kết quả học tập</h2>
    </div>
    <div class="main">
        <table>
            <tr>
                <th>MSSV</th> 
                <th>Mã Học Phần</th>
                <th>Lớp Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Điểm Quá Trình</th>
                <th>Điểm Giữa Kỳ</th>
                <th>Điểm Cuối Kỳ</th> 
                <th>Xếp Loại</th>
                <th>Điểm Tổng Kết</th>
            </tr>
    
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['MSSV']; ?></td>
            <td><?php echo $row['MaLopHocPhan']; ?></td> 
            <td><?php echo $row['LopHocPhan']; ?></td>
            <td><?php echo $row['SoTinChi']; ?></td>
            <td><?php echo $row['DiemQuaTrinh']; ?></td>
            <td><?php echo $row['DiemGiuaKi']; ?></td>
            <td><?php echo $row['DiemCuoiKy']; ?></td> 
            <td><?php echo $row['XepLoai']; ?></td> 
            <td><?php echo $row['DiemTongKet']; ?></td>
        </tr>
        <?php } ?>
    </table>
    </div>
</div>
</body>
</html>