<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên mới</title>
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
        box-shadow: 2px 2px 5px #8DEEEE;
        padding-top:10px;
        padding-bottom:20px;
        height:950px;
        position: relative;

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
        flex-direction:row;
        justify-content:space-around;
        align-items:flex-start;
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
    <h2>Thêm sinh viên mới</h2>
    </div>
    <div class="main-from"> 
        <div class="main1">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="MSSV">MSSV:</label><br>
        <input type="text" id="MSSV" name="MSSV"><br>
        
        <label for="HoTen">Họ và Tên:</label><br>
        <input type="text" id="HoTen" name="HoTen"><br>
        
        <label for="GioiTinh">Giới tính:</label><br>
        <select type="text" id="GioiTinh" name="GioiTinh"><br>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br>

        <label for="NgaySinh">Ngày sinh:</label><br>
        <input type="date" id="NgaySinh" name="NgaySinh"><br>
        
        <label for="NgayVaoTruong">Ngày vào trường:</label><br>
        <input type="date" id="NgayVaoTruong" name="NgayVaoTruong"><br>
        
        <label for="LoaiHinhDaoTao">Loại hình đào tạo:</label><br>
        <select type="text" id="LoaiHinhDaoTao" name="LoaiHinhDaoTao"><br>
            <option value="Chính Quy">Chính Quy</option>
            <option value="Không Chính Quy">Không Chính Quy</option>
            <option value="Đại Học Từ Xa">Đại Học Từ Xa</option>
        </select><br>
        
        <label for="Khoa">Khoa:</label><br>
        <input type="text" id="Khoa" name="Khoa"><br>
        
        <label for="TenNganh">Tên ngành:</label><br>
        <select type="text" id="TenNganh" name="TenNganh"><br>
        <?php
           include("../config.php");
            $sql = "SELECT * FROM nganh";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['TenNganh'] . "'>"  . $row['TenNganh'] . "</option>";
                }
            }

            mysqli_close($mysqli);
            ?>
        </select><br>
       
        <label for="ChuyenNganh">Chuyên ngành:</label><br>
        <input type="text" id="ChuyenNganh" name="ChuyenNganh"><br>
        <label for="LopHoc">Lớp học:</label><br>
        <input type="text" id="LopHoc" name="LopHoc"><br>
        
        <label for="TrangThai">Trạng thái:</label><br>
        <input type="text" id="TrangThai" name="TrangThai"><br>
        
        <label for="BacDaoTao">Bậc đào tạo:</label><br>
        <select type="text" id="BacDaoTao" name="BacDaoTao"><br>
            <option value="Đại Học">Đại Học</option>
            <option value="Cao Đẳng">Cao Đẳng</option>
            <option value="Vừa Làm Vừa Học">Vừa Làm Vừa Học</option>
        </select><br>
        </div>
        <div class="main2">
        
        
        <label for="SoCCCD">Số CCCD:</label><br>
        <input type="text" id="SoCCCD" name="SoCCCD"><br>
        
        <label for="DienThoai">Điện thoại:</label><br>
        <input type="text" id="DienThoai" name="DienThoai"><br>
        
        <label for="DiaChiLienHe">Địa chỉ liên hệ:</label><br>
        <input type="text" id="DiaChiLienHe" name="DiaChiLienHe"><br>
        
        <label for="NoiSinh">Nơi sinh:</label><br>
        <input type="text" id="NoiSinh" name="NoiSinh"><br>
        
        <label for="DanToc">Dân tộc:</label><br>
        <input type="text" id="DanToc" name="DanToc"><br>
        
        <label for="Email">Email:</label><br>
        <input type="email" id="Email" name="Email"><br>
        
        <label for="TonGiao">Tôn giáo:</label><br>
        <input type="text" id="TonGiao" name="TonGiao"><br>
        
        <label for="HinhAnh">Hình ảnh:</label><br>
        <input style="border: 1px solid #ccc; padding: 5px; border-radius: 4px; background-color: #f8f8f8;" type="file" id="HinhAnh" name="HinhAnh"><br>
        
        <input style="margin-top:10px;border-radius: 10px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;" type="submit" value="Thêm sinh viên">
        <br><br><br><br>
        <button  style="border-radius:10px;float:right;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;" onclick="history.back();">Quay Lại</button>

    </form>
        </div>
        </div>
        </div>
</body>
</html>
<?php
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    
    $target_dir = "../Image/";
    $target_file = $target_dir . basename($_FILES["HinhAnh"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["HinhAnh"]["tmp_name"]);
        if($check !== false) {
            echo "Tệp là một hình ảnh - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Tệp không phải là một hình ảnh.";
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        echo "Xin lỗi, tệp hình ảnh đã tồn tại.";
        $uploadOk = 0;
    }
    if ($_FILES["HinhAnh"]["size"] > 500000) {
        echo "Xin lỗi, tệp hình ảnh của bạn quá lớn.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Xin lỗi, chỉ cho phép tải lên các tệp JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Xin lỗi, tệp của bạn không được tải lên.";
    } else {
        if (move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file)) {
            echo "Tệp ". htmlspecialchars( basename( $_FILES["HinhAnh"]["name"])). " đã được tải lên.";
        } else {
            echo "Xảy ra lỗi khi tải lên tệp của bạn.";
        }
    }

    $sql = "INSERT INTO sinhvien (MSSV, HoTen, GioiTinh, NgaySinh, NgayVaoTruong, LoaiHinhDaoTao, Khoa, TenNganh, ChuyenNganh, LopHoc, TrangThai, BacDaoTao, SoCCCD, DienThoai, DiaChiLienHe, NoiSinh, DanToc, Email, TonGiao, HinhAnh)
        VALUES ('$MSSV', '$HoTen', '$GioiTinh', '$NgaySinh', '$NgayVaoTruong', '$LoaiHinhDaoTao', '$Khoa', '$TenNganh', '$ChuyenNganh', '$LopHoc', '$TrangThai', '$BacDaoTao', '$SoCCCD', '$DienThoai', '$DiaChiLienHe', '$NoiSinh', '$DanToc', '$Email', '$TonGiao', '". basename( $_FILES["HinhAnh"]["name"]). "')";

if ($mysqli->query($sql) === TRUE) {
    $matKhau = "111111";
    $sql_thongtindangnhap = "INSERT INTO thongtindangnhap (MSSV, HoTen, MatKhau) VALUES ('$MSSV', '$HoTen', '$matKhau')";
    if ($mysqli->query($sql_thongtindangnhap) === TRUE) {
        $message = "Thêm sinh viên mới thành công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=2';
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Lỗi khi thêm thông tin đăng nhập: " . $sql_thongtindangnhap . "<br>" . $mysqli->error;
    }
} else {
    echo "Lỗi khi thêm sinh viên: " . $sql . "<br>" . $mysqli->error;
}
}
    // Đóng kết nối
    $mysqli->close();
?>
