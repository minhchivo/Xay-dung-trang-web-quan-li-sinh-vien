<?php
include("config.php");

if(isset($_POST['MSSV']) && isset($_POST['amount'])) {
    $MSSV = $_POST['MSSV'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO thanhtoanhocphi (MSSV, SoTienDaNop, NgayNop, TrangThai) VALUES ('$MSSV', $amount, NOW(), 'Chưa duyệt')";

    if ($mysqli->query($sql) === TRUE) {
        $message = "Thanh toán học phí thành công!";
        echo "<script>
                window.location.href='index.php?pid=10';
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán học phí</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: auto;
            margin-top: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px #CC0000;
            padding-top: 10px;
            padding-bottom: 20px;
            color: black;
        }

        .container h3 {
            font-family: Arial;
            color: #666666;
            text-align: center;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 18px;
            margin-top: 20px;
        }

        .form-container label {
            margin-bottom: 10px;
        }

        .form-container input[type="number"],
        .form-container input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            box-shadow: 0px 3px 3px #990000;
            background-color: #660000;
            color: white;
            font-weight: bold;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            text-align: center;
        }

        .form-container input[type="submit"]:hover {
            background-color: #990000;
            cursor: pointer;
        }

        .button-container {
            text-align: center;
            margin-top: 10px;
        }

        .button-container button {
            background-color: #660000;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-container button:hover {
            background-color: #990000;
        }
    </style>
</head>
<body> 
    <div class="container">
        <h3>Thanh toán học phí</h3>
        <div class="form-container">
            <form action="" method="post">
                <label for="MSSV">Nhập MSSV của sinh viên:</label>
                <input type="number" id="MSSV" name="MSSV" min="0" required>
                <label for="amount">Số tiền cần thanh toán:</label>
                <input type="number" id="amount" name="amount" min="0" step="0.01" required>
                <input type="submit" value="Xác nhận thanh toán">
            </form>
        </div>
        <div class="button-container">
            <button><a href="index.php?pid=17">Lịch sử thanh toán</a></button>
        </div>
    </div>
</body>
</html>
