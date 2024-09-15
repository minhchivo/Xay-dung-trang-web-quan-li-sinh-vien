<!DOCTYPE html>
<html>
<head>
    <title>Sửa thông tin giảng viên</title>
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
        height:500px;

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
        font-size:18px;
        margin-top:20px;
        margin-left :90px;
       }
       .main-from label{
        
       }
       h3{
        font-family:arial;
        color:#666666;
       }
       p{
        font-family:arial;
        color:#666666;
        font-size:18px;
        text-align:center;
       }
       .main-from input{
        height:30px;
      }
      .main-from input[type="submit"]{
        margin:0;border-radius:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;
      }
      .button{
        display:block;
        margin-left:300px;

      }
      button{
        border-radius:10px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;float:right;
        margin-right:30px;
      }
    </style>
</head>
<body>
    <div class="main">
        <div class="tieude">
    <h1>Sửa thông tin giảng viên</h1>
    </div>
    <?php
    include("../config.php");
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['magiangvien'])) {
            $magiangvien = $_POST['magiangvien'];
            $hoten = $_POST['hoten'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $ngaysinh = $_POST['ngaysinh'];
            $ngayvaotruong = $_POST['ngayvaotruong'];

            $sql = "UPDATE giangvien SET HoTen='$hoten', Email='$email', SDT='$sdt', NgaySinh='$ngaysinh', NgayVaoTruong='$ngayvaotruong' WHERE MaGiangVien='$magiangvien'";


            if (mysqli_query($mysqli, $sql)) {
                $message = "Sửa thông tin giảng viên thành công!";
                echo "<script>
                        window.location.href='trangquantri.php?pid=7';
                        alert('$message');
                      </script>";
                exit();
            } else {
                echo "Lỗi: " . mysqli_error($mysqli);
            }
        } else {
            echo "Lỗi: Không tìm thấy thông tin giảng viên cần sửa.";
        }
    }

    mysqli_close($mysqli);
    ?>

    <form class="main-from" action="" method="POST">
        <?php
        if(isset($_GET['magiangvien'])) {
            $magiangvien = $_GET['magiangvien'];
            $mysqli = mysqli_connect("localhost", "root", "", "trangqlsv");

            if (!$mysqli) {
                die("Kết nối đến database thất bại: " . mysqli_connect_error());
            }

            $sql_select = "SELECT * FROM giangvien WHERE MaGiangVien='$magiangvien'";
            $result_select = mysqli_query($mysqli, $sql_select);
            if(mysqli_num_rows($result_select) > 0) {
                $row_select = mysqli_fetch_assoc($result_select);
                echo "
                    <input type='hidden' name='magiangvien' value='".$row_select['MaGiangVien']."'>
                      <label for='hoten'>Họ và Tên:</label>
                      <input type='text' id='hoten' name='hoten' value='".$row_select['HoTen']."'><br><br>
                      <label for='email'>Email:</label>
                      <input type='email' id='email' name='email' value='".$row_select['Email']."'><br><br>
                      <label for='sdt'>Số điện thoại:</label>
                      <input type='text' id='sdt' name='sdt' value='".$row_select['SDT']."'><br><br>
                      <label for='ngaysinh'>Ngày sinh:</label>
                      <input type='date' id='ngaysinh' name='ngaysinh' value='".$row_select['NgaySinh']."'><br><br>
                      <label for='ngayvaotruong'>Ngày vào trường:</label>
                      <input type='date' id='ngayvaotruong' name='ngayvaotruong' value='".$row_select['NgayVaoTruong']."'><br>
                      <input type='submit' value='Lưu'";
            } else {
                echo "Không tìm thấy thông tin giảng viên cần sửa.";
            }
            mysqli_close($mysqli);
        } else {
            echo "Lỗi: Không tìm thấy thông tin giảng viên cần sửa.";
        }
        ?>
    </form>
    <div class="button">
    <button type="button" onclick="history.back()">Quay lại</button>
    </div>
    </div>
</body>
</html>
