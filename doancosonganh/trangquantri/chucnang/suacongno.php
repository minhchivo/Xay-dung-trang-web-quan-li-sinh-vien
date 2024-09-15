<?php
include("../config.php");

if(isset($_GET['MSSV']) && isset($_GET['NamHoc']) && isset($_GET['HocKy'])) {
    $MSSV = $_GET['MSSV'];
    $NamHoc = $_GET['NamHoc'];
    $HocKy = $_GET['HocKy'];

    $sql = "SELECT * FROM hocphi WHERE MSSV='$MSSV' AND NamHoc='$NamHoc' AND HocKy='$HocKy'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy thông tin";
        exit;
    }
} else {
    echo "Thiếu thông tin cần thiết";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $SoTienPhaiDong = $_POST['SoTienPhaiDong'];
    $SoTienDaDong = $_POST['SoTienDaDong'];
    $CongNo = $_POST['CongNo'];
    $TrangThaiHocPhi = $_POST['TrangThaiHocPhi'];

    $sql_update = "UPDATE hocphi SET SoTienPhaiDong='$SoTienPhaiDong', SoTienDaDong='$SoTienDaDong', CongNo='$CongNo', TrangThaiHocPhi='$TrangThaiHocPhi' WHERE MSSV='$MSSV' AND NamHoc='$NamHoc' AND HocKy='$HocKy'";

    if ($mysqli->query($sql_update) === TRUE) {
        $message = "Cập nhật công nợ thành công!";
    echo "<script>
            window.location.href='trangquantri.php?pid=4';
            alert('$message');
          </script>";
    exit();
    } else {
        echo "Lỗi: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa công nợ</title>
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
        box-shadow: 2px 2px 5px #8DEEEE;
        padding-top:10px;
        padding-bottom:20px;
        height:400px;

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

form {
    margin:  auto;
    width: 80%;
}

form label {
    display: block;
    font-weight: bold;
    margin-top: 5px;
}

form input[type="text"],
form input[type="email"],
form input[type="date"] {
    width: 100%;
    height: 25px;
    padding: 5px;
    border: 1px solid #ddd;
    margin-bottom: 10px;
}

form input[type="submit"] {
    height: 35px;
    background: #50b3a2;
    color: #fff;
    border: 0;
    margin-top: 10px;
    border-radius:10px;
}

form input[type="submit"]:hover {
    background: #e8491d;
    cursor: pointer;
}
button{
    height: 35px;
    background: #50b3a2;
    color: #fff;
    border: 0;
    margin-top: 10px;
    border-radius:10px;
    float:right;
    margin-right:50px;
}
button:hover{
    background: #e8491d;
    cursor: pointer;
}

    </style>
</head>
<body>
    <div class="main">
        <div class="tieude">
    <h1>Chỉnh sửa công nợ</h1>
</div>
    <form action="" method="post">
        <input type="hidden" name="MSSV" value="<?php echo $MSSV; ?>">
        <input type="hidden" name="NamHoc" value="<?php echo $NamHoc; ?>">
        <input type="hidden" name="HocKy" value="<?php echo $HocKy; ?>">
        Số tiền phải đóng: <input type="text" name="SoTienPhaiDong" value="<?php echo $row['SoTienPhaiDong']; ?>"><br>
        Số tiền đã đóng: <input type="text" name="SoTienDaDong" value="<?php echo $row['SoTienDaDong']; ?>"><br>
        Công nợ: <input type="text" name="CongNo" value="<?php echo $row['CongNo']; ?>"><br>
        Trạng thái học phí: 
        <select name="TrangThaiHocPhi">
            <option value="Chưa đóng" <?php if($row['TrangThaiHocPhi'] == 'Chưa đóng') echo 'selected'; ?>>Chưa đóng</option>
            <option value="Đã đóng" <?php if($row['TrangThaiHocPhi'] == 'Đã đóng') echo 'selected'; ?>>Đã đóng</option>
        </select><br>
        <input type="submit" value="Cập nhật">
    </form>
    <button onclick="history.back();">Quay Lại</button>
</body>
</html>

<?php
$mysqli->close();
?>
