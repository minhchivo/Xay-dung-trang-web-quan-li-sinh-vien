<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm học phần mới</title>
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
        height:750px;
        font-size:15px;
        

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
        font-size:15px;
        margin-top:20px;
        display:flex;
        justify-content:space-around;
        align-items:;
       }
       .main-from label{
        
       }
       h3{
        font-family:arial;
        color:#666666;
       }
      button{
        border-radius:10px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;
      }
    </style>
</head>
<body>
    <div class="main">
    <div class="tieude">
    <h1>Thêm học phần mới</h1>
    </div>
    <div class="main-form">
    <form style="display:flex;
        justify-content:space-around;
        align-items:;" action="" method="post">
        <div>
        <label for="MaHocPhan">Mã học phần:</label><br>
        <input type="text" id="MaHocPhan" name="MaHocPhan" required><br>

        <label for="HocKy">Học kỳ:</label><br>
        <input type="text" id="HocKy" name="HocKy" required><br>

        <label for="SoTinChi">Số tín chỉ:</label><br>
        <input type="number" id="SoTinChi" name="SoTinChi" required><br>

        <label for="MaNganh">Mã ngành:</label><br>
        <select id="MaNganh" name="MaNganh" required>
            <?php
            include("../config.php");

            $sql = "SELECT * FROM nganh";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['MaNganh'] . "'>" . $row['MaNganh']."-" . $row['TenNganh'] . "</option>";
                }
            }

            mysqli_close($mysqli);
            ?>
        </select><br>

        <label for="MaGiangVien">Mã giảng viên:</label><br>
        <select id="MaGiangVien" name="MaGiangVien" required>
        <?php
           include("../config.php");

            $sql = "SELECT * FROM giangvien";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['MaGiangVien'] . "'>" . $row['MaGiangVien']."-" . $row['HoTen'] . "</option>";
                }
            }

            mysqli_close($mysqli);
            ?>
        </select><br>

        <label for="LopHocPhan">Lớp học phần:</label><br>
        <input type="text" id="LopHocPhan" name="LopHocPhan" required><br>

        <label for="NgayBatDau">Ngày bắt đầu:</label><br>
        <input type="date" id="NgayBatDau" name="NgayBatDau" required><br>
        </div>
            <div>
        <label for="NgayKetThuc">Ngày kết thúc:</label><br>
        <input type="date" id="NgayKetThuc" name="NgayKetThuc" required><br>

        <label for="SoTienPhaiDong">Số tiền phải đóng:</label><br>
        <input type="number" id="SoTienPhaiDong" name="SoTienPhaiDong" required><br>

        <label for="TrangThaiLopHocPhan">Trạng thái lớp học phần:</label><br>
        <select id="TrangThaiLopHocPhan" name="TrangThaiLopHocPhan" required><br>
            <option value="Đã Mở">Đã Mở</option>
            <option value="Chưa Mở">Chưa ở</option>
        </select><br>

        <label for="PhongHoc">Phòng học:</label><br>
        <input type="text" id="PhongHoc" name="PhongHoc" required><br>

        <label for="TenGiangVien">Tên giảng viên:</label><br>
        <select id="TenGiangVien" name="TenGiangVien" required>
        <?php
            include("../config.php");
            $message = "";


            $sql = "SELECT * FROM giangvien";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['HoTen'] . "'>" . $row['MaGiangVien']."-" . $row['HoTen'] . "</option>";
                }
            }

            mysqli_close($mysqli);
            ?>
        </select><br>

        <label for="ThuHoc">Thứ học:</label><br>
        <select id="ThuHoc" name="ThuHoc" required><br>
            <option value="2">Thứ 2</option>
            <option value="3">Thứ 3</option>
            <option value="4">Thứ 4</option>
            <option value="5">Thứ 5</option>
            <option value="6">Thứ 6</option>
            <option value="7">Thứ 7</option>
            <option value="Chủ Nhật">Chủ Nhật</option>
        </select><br>

        <label for="TietHoc">Ca học:</label><br>
        <select id="TietHoc" name="TietHoc" required><br>
            <option value="1">Ca 1</option>
            <option value="2">Ca 2</option>
            <option value="3">Ca 3</option>
        </select>
        <br>
        <input style="margin-top:10px;border-radius: 10px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;border:0;"  type="submit" value="Submit">
        <br>
        <button style="font-size:20px;float:right" onclick="history.back();">Quay Lại</button>
        <br><br><br>
        <div>
    </form>
        </div>
        </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("../config.php");

        $MaHocPhan = $_POST['MaHocPhan'];
        $HocKy = $_POST['HocKy'];
        $SoTinChi = $_POST['SoTinChi'];
        $MaNganh = $_POST['MaNganh'];
        $MaGiangVien = $_POST['MaGiangVien'];
        $LopHocPhan = $_POST['LopHocPhan'];
        $NgayBatDau = $_POST['NgayBatDau'];
        $NgayKetThuc = $_POST['NgayKetThuc'];
        $SoTienPhaiDong = $_POST['SoTienPhaiDong'];
        $TrangThaiLopHocPhan = $_POST['TrangThaiLopHocPhan'];
        $PhongHoc = $_POST['PhongHoc'];
        $TenGiangVien = $_POST['TenGiangVien'];
        $ThuHoc = $_POST['ThuHoc'];
        $TietHoc = $_POST['TietHoc'];

        $sql = "INSERT INTO hocphan (MaHocPhan, HocKy, SoTinChi, MaNganh, MaGiangVien, LopHocPhan, NgayBatDau, NgayKetThuc, SoTienPhaiDong, TrangThaiLopHocPhan, PhongHoc, TenGiangVien, ThuHoc, TietHoc) 
        VALUES ('$MaHocPhan', '$HocKy', '$SoTinChi', '$MaNganh', '$MaGiangVien', '$LopHocPhan', '$NgayBatDau', '$NgayKetThuc', '$SoTienPhaiDong', '$TrangThaiLopHocPhan', '$PhongHoc', '$TenGiangVien', '$ThuHoc', '$TietHoc')";

        if (mysqli_query($mysqli, $sql)) {
            $message = "Thêm Học Phần Mới Thành Công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=3';
                alert('$message');
              </script>";
        exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }

        mysqli_close($mysqli);
    }
    ?>
</body>
</html>
