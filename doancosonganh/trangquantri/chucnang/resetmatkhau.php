<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Mật Khẩu</title>
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
        height:250px;
        font-size:18px;

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
    margin-left:400px;
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
    <h2>Reset Mật Khẩu</h2>
</div>

    <form action="" method="post">
        <label for="mssv">Nhập MSSV:</label>
        <input type="text" id="mssv" name="mssv">
        <input type="submit" onclick="abc()"></input>
    <script>
        function abc(){
            if
            confirm("Bạn có chắc muốn reset mật khẩu?");
        }
    </script>
    </form>
    <button onclick="history.back();">Quay lại</button>
    </div>
</body>
</html>
<?php
include("../config.php");
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mssv = $_POST['mssv'];


    $sql = "UPDATE thongtindangnhap SET MatKhau='111111' WHERE MSSV='$mssv'";

    if ($mysqli->query($sql) === TRUE) {
        $message = "Reset mật khẩu thành công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=16';
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>
