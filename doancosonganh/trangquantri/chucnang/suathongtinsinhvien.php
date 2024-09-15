<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
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
        height:1500px;

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
      button{
        border-radius:10px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;
      }
    </style>
</head>
<body>
    <div class="main">
    <div class="tieude">
    <h2>Sửa thông tin sinh viên</h2>
    </div>
    <div class="main-from">
    <?php
    include("../config.php");

        $id = $_GET['id'];

        $sql = "SELECT * FROM sinhvien WHERE MSSV='$id'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<form action='' method='post' enctype='multipart/form-data'>
                        <input type='hidden' name='MSSV' value='" . $row['MSSV'] . "'><br>
                        <label for='HoTen'>Họ và Tên:</label><br>
                        <input type='text' id='HoTen' name='HoTen' value='" . $row['HoTen'] . "'><br>
                        
                        <label for='GioiTinh'>Giới tính:</label><br>
                        <select id='GioiTinh' name='GioiTinh'>
                            <option value='Nam' " . ($row['GioiTinh'] == 'Nam' ? 'selected' : '') . ">Nam</option>
                            <option value='Nữ' " . ($row['GioiTinh'] == 'Nữ' ? 'selected' : '') . ">Nữ</option>
                        </select><br>

                        <label for='NgaySinh'>Ngày sinh:</label><br>
                        <input type='date' id='NgaySinh' name='NgaySinh' value='" . $row['NgaySinh'] . "'><br>
                        
                        <label for='NgayVaoTruong'>Ngày vào trường:</label><br>
                        <input type='date' id='NgayVaoTruong' name='NgayVaoTruong' value='" . $row['NgayVaoTruong'] . "'><br>
                        
                        <label for='LoaiHinhDaoTao'>Loại hình đào tạo:</label><br>
                        <select id='LoaiHinhDaoTao' name='LoaiHinhDaoTao'>
                            <option value='Chính Quy' " . ($row['LoaiHinhDaoTao'] == 'Chính Quy' ? 'selected' : '') . ">Chính Quy</option>
                            <option value='Không Chính Quy' " . ($row['LoaiHinhDaoTao'] == 'Không Chính Quy' ? 'selected' : '') . ">Không Chính Quy</option>
                            <option value='Đại Học Từ Xa' " . ($row['LoaiHinhDaoTao'] == 'Đại Học Từ Xa' ? 'selected' : '') . ">Đại Học Từ Xa</option>
                        </select><br>
                        
                        <label for='Khoa'>Khoa:</label><br>
                        <input type='text' id='Khoa' name='Khoa' value='" . $row['Khoa'] . "'><br>
                        
                        <label for='TenNganh'>Tên ngành:</label><br>
                        <select id='TenNganh' name='TenNganh'>";
                            $sql_nganh = "SELECT * FROM nganh";
                            $result_nganh = $mysqli->query($sql_nganh);
                            if ($result_nganh->num_rows > 0) {
                                while($nganh = $result_nganh->fetch_assoc()) {
                                    echo "<option value='" . $nganh['TenNganh'] . "' " . ($row['TenNganh'] == $nganh['TenNganh'] ? 'selected' : '') . ">" . $nganh['TenNganh'] . "</option>";
                                }
                            }
                        echo "</select><br>
                       
                        <label for='ChuyenNganh'>Chuyên ngành:</label><br>
                        <input type='text' id='ChuyenNganh' name='ChuyenNganh' value='" . $row['ChuyenNganh'] . "'><br>
                        
                        <label for='LopHoc'>Lớp học:</label><br>
                        <input type='text' id='LopHoc' name='LopHoc' value='" . $row['LopHoc'] . "'><br>
                        
                        <label for='TrangThai'>Trạng thái:</label><br>
                        <input type='text' id='TrangThai' name='Tr                        angThai' value='" . $row['TrangThai'] . "'><br>
                        
                        <label for='BacDaoTao'>Bậc đào tạo:</label><br>
                        <select id='BacDaoTao' name='BacDaoTao'>
                            <option value='Đại Học' " . ($row['BacDaoTao'] == 'Đại Học' ? 'selected' : '') . ">Đại Học</option>
                            <option value='Cao Đẳng' " . ($row['BacDaoTao'] == 'Cao Đẳng' ? 'selected' : '') . ">Cao Đẳng</option>
                            <option value='Vừa Làm Vừa Học' " . ($row['BacDaoTao'] == 'Vừa Làm Vừa Học' ? 'selected' : '') . ">Vừa Làm Vừa Học</option>
                        </select><br>
                        
                        <label for='SoCCCD'>Số CCCD:</label><br>
                        <input type='text' id='SoCCCD' name='SoCCCD' value='" . $row['SoCCCD'] . "'><br>
                        
                        <label for='DienThoai'>Điện thoại:</label><br>
                        <input type='text' id='DienThoai' name='DienThoai' value='" . $row['DienThoai'] . "'><br>
                        
                        <label for='DiaChiLienHe'>Địa chỉ liên hệ:</label><br>
                        <input type='text' id='DiaChiLienHe' name='DiaChiLienHe' value='" . $row['DiaChiLienHe'] . "'><br>
                        
                        <label for='NoiSinh'>Nơi sinh:</label><br>
                        <input type='text' id='NoiSinh' name='NoiSinh' value='" . $row['NoiSinh'] . "'><br>
                        
                        <label for='DanToc'>Dân tộc:</label><br>
                        <input type='text' id='DanToc' name='DanToc' value='" . $row['DanToc'] . "'><br>
                        
                        <label for='Email'>Email:</label><br>
                        <input type='email' id='Email' name='Email' value='" . $row['Email'] . "'><br>
                        
                        <label for='TonGiao'>Tôn giáo:</label><br>
                        <input type='text' id='TonGiao' name='TonGiao' value='" . $row['TonGiao'] . "'><br>
                        
                        <label for='HinhAnh'>Hình ảnh:</label><br>
                        <input style='border: 1px solid #ccc; padding: 5px; border-radius: 4px; background-color: #f8f8f8;' type='file' id='HinhAnh' name='HinhAnh'><br>
                        
                        <input style='margin-top:10px;border-radius: 10px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0' type='submit' value='Cập nhật thông tin'>
                        <br><br><br>
                        <button style='float:right' onclick='history.back();'>Quay Lại</button>

                    </form>";
            }
        } else {
            echo "Không tìm thấy sinh viên.";
        }


        $mysqli->close();
    ?>
    </div>
    </div>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../config.php");

    $MSSV = $_POST["MSSV"];
    $HoTen = $_POST["HoTen"];
    $GioiTinh = $_POST["GioiTinh"];
    $NgaySinh = $_POST["NgaySinh"];
    $NgayVaoTruong = $_POST["NgayVaoTruong"];
    $LoaiHinhDaoTao = $_POST["LoaiHinhDaoTao"];
    $Khoa = $_POST["Khoa"];
    $TenNganh = $_POST["TenNganh"];
    $ChuyenNganh = $_POST["ChuyenNganh"];
    $LopHoc = $_POST["LopHoc"];
    $TrangThai = $_POST["TrangThai"];
    $BacDaoTao = $_POST["BacDaoTao"];
    $SoCCCD = $_POST["SoCCCD"];
    $DienThoai = $_POST["DienThoai"];
    $DiaChiLienHe = $_POST["DiaChiLienHe"];
    $NoiSinh = $_POST["NoiSinh"];
    $DanToc = $_POST["DanToc"];
    $Email = $_POST["Email"];
    $TonGiao = $_POST["TonGiao"];

    if ($_FILES["HinhAnh"]["name"]) {

        $target_dir = "../Image/";
        $target_file = $target_dir . basename($_FILES["HinhAnh"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            echo "Xin lỗi, tệp hình ảnh đã tồn tại.";
            $uploadOk = 0;
        }

        if ($_FILES["HinhAnh"]["size"] > 500000) {
            echo "Xin lỗi, tệp hình ảnh của bạn quá lớn.";
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Xin lỗi, chỉ cho phép tải lên các tệp JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Xin lỗi, tệp của bạn không được tải lên.";
        } else {
            if (move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file)) {
                echo "Tệp " . htmlspecialchars(basename($_FILES["HinhAnh"]["name"])) . " đã được tải lên.";
            } else {
                echo "Xảy ra lỗi khi tải lên tệp của bạn.";
            }
        }
    }

    $sql = "UPDATE sinhvien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh', NgayVaoTruong='$NgayVaoTruong', LoaiHinhDaoTao='$LoaiHinhDaoTao', Khoa='$Khoa', TenNganh='$TenNganh', ChuyenNganh='$ChuyenNganh', LopHoc='$LopHoc', TrangThai='$TrangThai', BacDaoTao='$BacDaoTao', SoCCCD='$SoCCCD', DienThoai='$DienThoai', DiaChiLienHe='$DiaChiLienHe', NoiSinh='$NoiSinh', DanToc='$DanToc', Email='$Email', TonGiao='$TonGiao'";
    if ($_FILES["HinhAnh"]["name"]) {
        $sql .= ", HinhAnh='" . basename($_FILES["HinhAnh"]["name"]) . "'";
    }
    $sql .= " WHERE MSSV='$MSSV'";

    if ($mysqli->query($sql) === TRUE) {
        $message = "Cập nhật thông tin sinh viên thành công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=2';
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Lỗi khi cập nhật thông tin sinh viên: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>

