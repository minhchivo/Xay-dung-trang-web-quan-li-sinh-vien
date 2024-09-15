<?php
include("../config.php");
$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matintuc = $_POST['matintuc'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];

    $sql = "UPDATE tintuc SET TieuDe='$tieude', NoiDung='$noidung' WHERE MaTinTuc='$matintuc'";

    if (mysqli_query($mysqli, $sql)) {
        $message = "Sửa tin tức thành công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=12';
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($mysqli);
    }
}

if (isset($_GET['MaTinTuc'])) {
    $matintuc = $_GET['MaTinTuc'];

    $sql = "SELECT * FROM tintuc WHERE MaTinTuc='$matintuc'";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $tieude = $row['TieuDe'];
        $noidung = $row['NoiDung'];
    } else {
        echo "Không tìm thấy tin tức.";
    }
} else {
    echo "Thiếu parameter MaTinTuc.";
}

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa tin tức</title>
    <style>
        *{
            padding:0;
            margin:0;
        }
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
        height:300px;

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
      button{
        margin-right:20px;border-radius:10px;margin-bottom:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;float:right;
      }
      .tieude-from{

      }
      .noidung{
        display:flex;
        justify-content:center;
        margin:10px;
      }
      </style>
</head>
<body>
    <div class="main"> 
    <div class="tieude">
    <h2>Sửa tin tức</h2>
    </div>
    <form class="main-from" action="" method="post">
        <div class class="tieude-form">
        <input  type="hidden" name="matintuc" value="<?php echo $matintuc; ?>">
        <label  for="tieude">Tiêu đề:</label> 
        <input type="text" id="tieude" name="tieude" value="<?php echo $tieude; ?>">
        </div>
        <div class="noidung">
        <label style="margin-right:10px;" for="noidung">Nội dung:</label> 
        <textarea id="noidung" name="noidung"><?php echo $noidung; ?></textarea><br>
        </div>
        <input type="submit" value="Lưu">
    </form>
    <div class="button">
    <button onclick="history.back();">Quay Lại</button>
    </div>
    </div>
</body>
</html>
