<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        #contact {
            margin: auto;
            max-width: 500px;
            margin-top: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px #CC0000;
            padding-top: 10px;
            padding-bottom: 20px;
            color: black;
            font-family: Arial, sans-serif;
        }

        .footer-content-header {
            text-align: center;
            color: #666666;
            margin-top: 10px;
            font-size: 24px;
        }

        #contact-name,
        #contact-phone,
        #contact-content {
            width: 100%;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        #contact-content {
            height: 100px;
        }

        button[type="submit"] {
            width: 30%;
            margin: 10px auto;
            padding: 10px;
            background-color: #660000;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #990000;
        }

        button {
            display: block;
            width: 30%;
            margin: auto;
            margin-top: 10px;
            padding: 10px;
            background-color: #660000;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        button:hover {
            background-color: #990000;
        }
    </style>
</head>
<body>

<form id="contact" method="post" >
    <h3 class="footer-content-header">Quên mật khẩu</h3>
    <?php
    // Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối tùy theo cấu hình của bạn)
    include("config.php");
    $message = "";
    // Xử lý dữ liệu gửi từ form khi form được submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $mssv = $_POST['phone'];
        $hoten = $_POST['name'];
        $noidung = $_POST['content'];
        $trangthai = "Chưa xử lý"; // Trạng thái mặc định khi thêm mới phản hồi

        // Chuẩn bị truy vấn SQL để thêm dữ liệu vào bảng phản hồi
        $sql = "INSERT INTO phanhoi (MSSV, HoTen, NoiDung, TrangThai) VALUES ('$mssv', '$hoten', '$noidung', '$trangthai')";
if ($mysqli->query($sql) === TRUE) {
            $message = "Yêu cầu reset mật khẩu thành công!";
            echo "<script>
                  window.location.href='index_login.php';
                  alert('$message');
                </script>";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
        }
    }

    // Đóng kết nối
    $mysqli->close();
    ?>
    <div>
        <div>
            <input type="text" name="name" id="contact-name" placeholder="Họ Tên">
            <input type="number" name="phone" id="contact-phone" placeholder="MSSV">
        </div>
        <textarea name="content" id="contact-content" cols="25" rows="7" placeholder="Lí do"></textarea>
    </div>
    <button type="submit">Gửi yêu cầu</button>
    <button onclick="history.back();">Quay lại</button>

</form>
</body>
</html>