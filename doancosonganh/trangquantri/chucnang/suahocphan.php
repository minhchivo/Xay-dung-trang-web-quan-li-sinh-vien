<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Học Phần</title>
    <style>
        .tieude{
        
        color:black;
       }
       .main{
        margin:auto;
        max-width: 1000px;
        margin-top:20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        color: black;
        font-family:time new roman;
        box-shadow: 2px 2px 5px #CC0000;
        padding-top:10px;
        padding-bottom:20px;
        font-size:15px;
        height:350px;
        
        

       }
       .tieude{
        width:450px;
        text-align:center;
        margin-top:10px;
        border-bottom:1px solid #ddd;
        margin-left:25px;
        font-family:arial;
        color:#666666;
        margin-bottom: 10px;
        
       }
       .main-from{
        
        font-size:15px;
        margin-top:20px;
        float:left;
        
       }
       .main-from label{
        
       }
       h3{
        font-family:arial;
        color:#666666;
       }
      button{
        
      }
      
    
    </style>
</head>
<body>
<div class="main">
<?php
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $sql = "SELECT * FROM hocphan WHERE MaHocPhan = $id";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="tieude">
        <h2>Sửa thông tin học phần</h2>
        
    </div>
    <div class="main-form">
        <form style="display:flex;justify-content:space-around;" action="" method="post">
            <div class="main2">
            <input type="hidden" name="id" value="<?php echo $row['MaHocPhan']; ?>">

            Mã Học Phần: <input type="text" name="maHocPhan" value="<?php echo $row['MaHocPhan']; ?>" readonly><br>

            Học Kỳ: <input type="text" name="hocKy" value="<?php echo $row['HocKy']; ?>"><br>

            Số Tín Chỉ: <input type="text" name="soTinChi" value="<?php echo $row['SoTinChi']; ?>"><br>

            Mã Ngành: 
            <select name="maNganh">
                <?php
                $sql = "SELECT * FROM nganh";
                $result = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($nganh = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $nganh['MaNganh'] . "'>" . $nganh['MaNganh'] . " - " . $nganh['TenNganh'] . "</option>";
                    }
                }
                ?>
            </select><br>

            Mã Giảng Viên: 
            <select name="maGiangVien">
                <?php
                $sql = "SELECT * FROM giangvien";
                $result = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($giangvien = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $giangvien['MaGiangVien'] . "'>" . $giangvien['MaGiangVien'] . " - " . $giangvien['HoTen'] . "</option>";
                    }
                }
                ?>
            </select><br>
            Lớp Học Phần: <input type="text" name="lophocphan" value="<?php echo $row['LopHocPhan']; ?>"><br>
            Ngày Bắt Đầu: <input type="date" name="ngaybatdau" value="<?php echo $row['NgayBatDau']; ?>"><br>
            </div>
            <div class="main1">
            Ngày Kết Thúc: <input type="date" name="ngayketthuc" value="<?php echo $row['NgayKetThuc']; ?>"><br>
            Số Tiền Phải Đóng: <input type="number" name="sotienphaidong" value="<?php echo $row['SoTienPhaiDong']; ?>"><br>
            Trạng Thái Học Phần: 
            <select name="trangThaiLopHocPhan">
                <option value="Mở">Mở</option>
                <option value="Đóng">Đóng</option>
            </select><br>
            Phòng Học: <input type="text" name="phonghoc" value="<?php echo $row['PhongHoc']; ?>"><br>
            Tên Giảng Viên: <input type="text" name="tenGiangVien" value="<?php echo $row['TenGiangVien']; ?>"><br>

            Thứ Học: 
            <select name="thuHoc">
                <option value="2">Thứ 2</option>
                <option value="3">Thứ 3</option>
                <option value="4">Thứ 4</option>
                <option value="5">Thứ 5</option>
                <option value="6">Thứ 6</option>
                <option value="7">Thứ 7</option>
                <option value="Chủ nhật">Chủ nhật</option>
            </select><br>

            Ca Học: 
            <select name="tietHoc">
                <option value="1">Ca 1</option>
                <option value="2">Ca 2</option>
                <option value="3">Ca 3</option>
            </select><br>

            <input style="border-radius:10px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;display:inline-block" type="submit" value="Lưu">
            </div>
        </form>
        <button style="border-radius:10px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;float:right;margin-right:30px" onclick="history.back();">Quay Lại</button>

            </div>
            </div>

        <?php
    } else {
        echo "Record not found.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $hocKy = $_POST["hocKy"];
    $soTinChi = $_POST["soTinChi"];
    $maNganh = $_POST["maNganh"];
    $maGiangVien = $_POST["maGiangVien"];
    $lophocphan = $_POST["lophocphan"];
    $ngaybatdau = $_POST["ngaybatdau"];
    $ngayketthuc = $_POST["ngayketthuc"];
    $sotienphaidong = $_POST["sotienphaidong"];
    $trangThaiLopHocPhan = $_POST["trangThaiLopHocPhan"];
    $phonghoc = $_POST["phonghoc"];
    $tenGiangVien = $_POST["tenGiangVien"];
    $thuHoc = $_POST["thuHoc"];
    $tietHoc = $_POST["tietHoc"];

    $updateSql = "UPDATE hocphan SET 
                  HocKy='$hocKy',
                  SoTinChi='$soTinChi',
                  MaNganh='$maNganh',
                  MaGiangVien='$maGiangVien',
                  LopHocPhan = '$lophocphan',
                  NgayBatDau = '$ngaybatdau',
                  NgayKetThuc = '$ngayketthuc',
                  TrangThaiLopHocPhan='$trangThaiLopHocPhan',
                  PhongHoc = '$phonghoc',
                  TenGiangVien='$tenGiangVien',
                  ThuHoc='$thuHoc',
                  Tiethoc='$tietHoc'
                  WHERE MaHocPhan=$id";

    $updateResult = mysqli_query($mysqli, $updateSql);

    if ($updateResult) {
        $message = "Sửa học phần thành công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=3';
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }
}

mysqli_close($mysqli);
?>
</div>
</body>
</html>
