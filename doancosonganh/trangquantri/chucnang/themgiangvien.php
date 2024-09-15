<!DOCTYPE html>
<html>
<head>
    <title>Thêm giảng viên mới</title>
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
        height:600px;

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

      
</style>


</head>
<body>
    <div class="main">
        <div class="tieude">
    <h1>Thêm giảng viên mới</h1>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("../config.php");
        $message = "";

        $magiangvien = $_POST['magiangvien'];
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $ngaysinh = $_POST['ngaysinh'];
        $ngayvaotruong = $_POST['ngayvaotruong'];

        $sql = "INSERT INTO giangvien (MaGiangVien, HoTen, Email, SDT, NgaySinh, NgayVaoTruong) 
                VALUES ('$magiangvien', '$hoten', '$email', '$sdt', '$ngaysinh', '$ngayvaotruong')";

        if (mysqli_query($mysqli, $sql)) {
            $message = "Thêm giảng viên mới thành công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=7';
                alert('$message');
              </script>";
        exit();
            
        } else {
            echo "Lỗi: " . mysqli_error($mysqli);
        }

        mysqli_close($mysqli);
    }
    ?>

    <form action="" method="POST">
        <label for="magiangvien">Mã Giảng Viên:</label>
        <input type="text" id="magiangvien" name="magiangvien">

        <label for="hoten">Họ và Tên:</label>   
        <input type="text" id="hoten" name="hoten">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="sdt">Số điện thoại:</label>
        <input type="text" id="sdt" name="sdt">

        <label for="ngaysinh">Ngày sinh:</label>
        <input type="date" id="ngaysinh" name="ngaysinh">

        <label for="ngayvaotruong">Ngày vào trường:</label>
        <input type="date" id="ngayvaotruong" name="ngayvaotruong">
        
        <input type="submit" id="themgiangvien" name="them" value="Thêm">
        
     
    </form>
</div>
</body>
</html>
