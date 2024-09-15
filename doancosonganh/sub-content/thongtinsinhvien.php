<?php
include("config.php");
// Get student information
$sql = "SELECT * FROM sinhvien WHERE MSSV = $ma_sv";

$result = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html>
<head>
 <title>Thông tin sinh viên</title>
 <style>
  *{
    
  }
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 800px;
      margin-top:20px;
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      color: black;
      display:flex;
      justify-content: space-between;
      font-family:time new roman;
      box-shadow: 2px 2px 5px #CC0000;

      
    }
    .student-image {
      
      margin-bottom: 20px;
      margin-top:20px;
      padding-right:20px;
      

      
      


    }
    .student-image img {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow:4px 4px 3px #888888		;
      margin:auto;
      margin-bottom:0px;
      margin-top:20px;


    }
    .student-info h2 {
      margin-top: 0px;
    }
    .student-info p {
      margin-bottom: 3px;
      font-size:15px;
    }
  
  .thongtinhocvan{
    margin-left:0;
    text-align: left;
    margin-top:20px;
    margin-bottom:20px;
    
  }
  .thongtinhocvan h3{
    border-bottom:1px solid black;
  }
  .thongtincanhan{
    margin-top:20px;
    margin-bottom:20px;


  }
  .thongtincanhan p{
    font-size:15px;
    margin-bottom: 3px;
  }
  .student-image{
    display:flex;
    flex-direction:column;
    align-items:center;
    
  }
  
 </style>
</head>
<body>
 <div class="container">
    <div class="student-image">
      <img src="Image/<?php echo $row['HinhAnh']; ?>" alt="Hình ảnh sinh viên">
      <h3 style="font-weight:bold;margin-top:10px"><?php echo $row['HoTen']; ?></h3>
    </div>

    <div class="student-info">
      <div class="thongtinhocvan">
        <h3 style="font-weight:bold;color:#666666;font-family:arial;">Thông tin học vấn </h3>
        <p><strong>MSSV:</strong> <?php echo $row['MSSV']; ?></p>
        <p><strong>Ngày sinh:</strong> <?php echo $row['NgaySinh']; ?></p>
        <p><strong>Giới tính:</strong> <?php echo $row['GioiTinh']; ?></p>
        <p><strong>SĐT:</strong> <?php echo $row['DienThoai']; ?></p>
        <p><strong>Ngày vào trường:</strong> <?php echo $row['NgayVaoTruong']; ?></p>
        <p><strong>Loại hình đào tạo:</strong> <?php echo $row['LoaiHinhDaoTao']; ?></p>
        <p><strong>Khoa:</strong> <?php echo $row['Khoa']; ?></p>
        <p><strong>Tên Ngành:</strong> <?php echo $row['TenNganh']; ?></p>
        <p><strong>Chuyên ngành:</strong> <?php echo $row['ChuyenNganh']; ?></p>
        <p><strong>Lớp học:</strong> <?php echo $row['LopHoc']; ?></p>
        <p><strong>Trạng thái:</strong> <?php echo $row['TrangThai']; ?></p>
        <p><strong>Bậc đào tạo:</strong> <?php echo $row['BacDaoTao']; ?></p>
      </div>
    </div>
    <div class="thongtincanhan">
      <h3 style="font-weight:bold;    border-bottom:1px solid black;color:#666666">Thông tin sinh viên</h3> 
      <p><strong>Số CCCD:</strong> <?php echo $row['SoCCCD']; ?></p>
        <p><strong>Địa chỉ liên hệ:</strong> <?php echo $row['DiaChiLienHe']; ?></p>
        <p><strong>Nơi sinh:</strong> <?php echo $row['NoiSinh']; ?></p>
        <p><strong>Dân tộc:</strong> <?php echo $row['DanToc']; ?></p>
        <p><strong>Tôn giáo:</strong> <?php echo $row['TonGiao']; ?></p>
      </div>
 </div>
</body>
</html>