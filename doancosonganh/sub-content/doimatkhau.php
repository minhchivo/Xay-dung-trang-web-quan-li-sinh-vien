<?php
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_sv = $_SESSION['ma_sv'];

    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($new_password == $confirm_password) {
        $update_sql = "UPDATE thongtindangnhap SET MatKhau='$new_password' WHERE MSSV='$ma_sv'";
        if (mysqli_query($mysqli, $update_sql)) {
            echo "<script>
                    alert('Đổi mật khẩu thành công!');
                    window.location.href='index.php?pid=3';
                </script>";
            exit();
        } else {
            echo "<script>
                    alert('Lỗi đổi mật khẩu: " . mysqli_error($mysqli) . "');
                    window.location.href='index.php?pid=3';
                </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('Mật khẩu mới và xác nhận mật khẩu mới không trùng khớp!');
                window.location.href='index.php?pid=3';
            </script>";
        exit();
    }
}

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doi Mat Khau</title>
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
        margin-left:25px;
        font-family:arial;
        color:#666666;
        
       }
       .main-from{
        margin-left:25px;
        width:100%;
        display:flex;
        flex-direction:space-between;
        justify-content:center;
       }        
       h3{
        font-family:arial;
        color:#666666;
        border-bottom:1px solid #ddd;
       }
       input{
        width:33%;
        height:30px;
        font-size:15px;
       }
       button{
            margin-top:5px;
            width:20%;
            height:30px;
            border: 1px solid #CD2626;
            background-color:#CD2626;
            color:#1C1C1C;
            box-shadow:2px 2px 3px #CD2626;
            font-weight:bold;
            
        }
        
    </style>
</head>
</body>
<div class="main">

    <?php if(!empty($message)) { ?>
        <p><?=$message?></p>
    <?php } ?>
        <div class="tieude">
            <h3>Đổi mật khẩu</h3>
        </div>
        <div class="main-from">
            <form method="post">
            <input type="text" name="new_password" placeholder="Nhập mật khẩu mới">
            <input type="text" name="confirm_password" placeholder="Xác nhận mật khẩu mới">
            <button type="submit">Lưu thay đổi</button>
            </form>
        </div>

</div>

<body>
</html>
