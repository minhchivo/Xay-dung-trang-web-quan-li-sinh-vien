<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh Sửa Điểm</title>
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
      .main-from input{
        width:auto;
        height:30px;
        margin:5px;
      }
      .main-from input[type="submit"]{
        margin:0;border-radius:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;
      }
    </style>
</head>
<body>
    <div class="main">
        <div class="tieude">
    <h2>Chỉnh Sửa Điểm</h2>
    </div>
    <div class="main-from">
    <?php
    $mssv = $_GET["mssv"];
    $malop = $_GET["malop"];

    include("../config.php");

    $sql = "SELECT * FROM ketquahoctap WHERE MSSV = '$mssv' AND MaLopHocPhan = '$malop'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Hiển thị biểu mẫu chỉnh sửa
        echo "<form method='post'>";
        echo "MSSV: <input type='text' name='mssv' value='" . $row["MSSV"] . "' readonly><br>";
        echo "Mã Học Phần: <input type='text' name='malop' value='" . $row["MaLopHocPhan"] . "' readonly><br>";
        echo "Lớp Học Phần: <input type='text' name='tenmonhoc' value='" . $row["LopHocPhan"] . "'><br>";
        echo "Số Tín Chỉ: <input type='number' name='sotinchi' value='" . $row["SoTinChi"] . "'><br>";
        echo "Điểm Quá Trình: <input type='number' step='0.01' name='diemquatrinh' value='" . $row["DiemQuaTrinh"] . "'><br>";
        echo "Điểm Giữa Kỳ: <input type='number' step='1' name='diemgiuaki' value='" . $row["DiemGiuaKi"] . "'><br>";
        echo "Điểm Cuối Kỳ: <input type='number' step='0.01' name='diemcuoiky' value='" . $row["DiemCuoiKy"] . "'><br>";
        echo "<input type='submit' name='submit' value='Lưu'>";
        echo "</form>";
    } else {
        echo "Không tìm thấy dữ liệu";
    }

    $mysqli->close();
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mssv = $_POST["mssv"];
        $malop = $_POST["malop"];
        $tenmonhoc = $_POST["tenmonhoc"];
        $sotinchi = $_POST["sotinchi"];
        $diemquatrinh = $_POST["diemquatrinh"];
        $diemgiuaki = $_POST["diemgiuaki"];
        $diemcuoiky = $_POST["diemcuoiky"];

        $diemtongket = 0.2 * $diemquatrinh + 0.3 * $diemgiuaki + 0.5 * $diemcuoiky;

        if ($diemtongket >= 8) {
            $xeploai = "Giỏi";
        } elseif ($diemtongket >= 6) {
            $xeploai = "Khá";
        } elseif ($diemtongket >= 5) {
            $xeploai = "Trung bình";
        } else {
            $xeploai = "Yếu";
        }

        include("../config.php");

        $sql = "UPDATE ketquahoctap
                SET LopHocPhan = '$tenmonhoc', SoTinChi = '$sotinchi', DiemQuaTrinh = '$diemquatrinh', DiemGiuaKi = '$diemgiuaki', DiemCuoiKy = '$diemcuoiky', DiemTongKet = '$diemtongket', XepLoai = '$xeploai'
                WHERE MSSV = '$mssv' AND MaLopHocPhan = '$malop'";

        if ($mysqli->query($sql) === TRUE) {
            $message = "Chỉnh sửa điểm thành công!";
            echo "<script>
            window.location.href='trangquantri.php?pid=6';
            alert('$message');
          </script>";
          exit();
        } else {
            echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
        }

        $mysqli->close();
    }
    ?>
    <button style="        border-radius:10px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;margin-left:300px;" onclick="history.back();">Quay Lại</button>
</div>
</div>
</body>
</html>
