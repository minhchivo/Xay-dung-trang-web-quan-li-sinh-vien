<?php

include("config.php");
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mssv = $_SESSION['ma_sv'];

    $hoten = $_POST['name'];
    $noidung = $_POST['content'];
    $trangthai = "Chưa xử lý"; 

    $sql = "INSERT INTO phanhoi (MSSV, HoTen, NoiDung, TrangThai) VALUES ('$mssv', '$hoten', '$noidung', '$trangthai')";

    if ($mysqli->query($sql) === TRUE) {
        $message = "Gửi phản hồi thành công!";
        echo "<script>
              window.location.href='index.php';
              alert('$message');
            </script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Liên Hệ</title>
</head>
<body>

<form id="contact" method="post" action="">
    <h3 class="footer-content-header">Liên Hệ</h3>
    <div>
        <div>
            <input type="text" name="name" id="contact-name" placeholder="Họ Tên">
        </div>
        <textarea name="content" id="contact-content" cols="25" rows="7" placeholder="Nội Dung"></textarea>
    </div>
    <button type="submit">Liên Hệ Ngay</button>
    <button><a href="index.php?pid=13">Lịch Sử Phản Hồi</a></button>
</form>

</body>
</html>
