<?php

$mssv = $_SESSION['ma_sv'];
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    if (isset($_POST['loai_don']) && isset($_POST['ngay_nop_don'])) {
        include("config.php");


        $loai_don = $_POST['loai_don'];
        $ngay_nop_don = $_POST['ngay_nop_don'];
        $trang_thai = "Chưa xử lý";

        $capnhatdx = "INSERT INTO de_xuat_bieu_mau (MSSV, LoaiDon, NgayNopDon, TrangThai) VALUES ('$mssv', '$loai_don', '$ngay_nop_don', '$trang_thai')";

        if (mysqli_query($mysqli, $capnhatdx)) {
            $message = "Đề xuất biểu mẫu thành công!";
            echo "<script>
                    window.location.href='index.php?pid=6';
                    alert('$message');
                  </script>";
            exit();
        } else {
            echo "Lỗi: " . $capnhatdx . "<br>" . mysqli_error($mysqli);
        }

        mysqli_close($mysqli);
    } else {
        echo "Vui lòng điền đầy đủ thông tin.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đề Xuất Biểu Mẫu</title>
    <style>
       .tieude{
        
        color:black;
       }
       .main{
        margin:auto;
        max-width: 500px;
        margin-top:20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        color: black;
        font-family:time new roman;
        box-shadow: 2px 2px 5px #CC0000;
        padding-top:10px;
        padding-bottom:20px;

       }
       .tieude{
        width:450px;
        text-align:center;
        margin-top:10px;
        border-bottom:1px solid #ddd;
        margin-left:25px;
        font-family:arial;
        color:#666666;
        
       }
       .main-from{
        display:flex;
        flex-direction:column;
        align-items:center;
        font-size:18px;
        margin-top:20px;
       }
       .main-from label{
        
       }
       h3{
        font-family:arial;
        color:#666666;
       }
      
    </style>
</head>
<body>
    

    <div class="main">

        <div class="tieude">
            <h3>Đề Xuất Biểu Mẫu</h3>
        </div>

        <div class="main-from">
            <form action="" method="POST">
                <label>Loại Đơn:</label>
                <select id="loai_don" name="loai_don" required>
                <option value="">Chọn loại đơn</option>
                <?php
               include("config.php");
                // Truy vấn để lấy danh sách các loại đơn từ bảng bangbieumau
                $sql = "SELECT * FROM bangbieumau";
                $result = mysqli_query($mysqli, $sql);

                // Hiển thị các loại đơn trong dropdown
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['ten_bieu_mau'] . "</option>";
                }

                // Đóng kết nối
                mysqli_close($mysqli);
                ?>
                </select><br>

                <label for="ngay_nop_don">Ngày Nộp Đơn:</label>
                <input type="date" id="ngay_nop_don" name="ngay_nop_don" required><br>
        
                <input style="width:360px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px" type="submit" value="XÁC NHẬN">

            </form>
        </div>
    </div>
            
</body>
</html>
