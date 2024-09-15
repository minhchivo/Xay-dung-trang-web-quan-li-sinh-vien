<!DOCTYPE html>
<html>
<head>
    <title>Xóa tin tức</title>
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
        height:150px;

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
       p{
        font-family:arial;
        color:#666666;
        font-size:18px;
        text-align:center;
       }
    </style>
</head>
<body>
    <div class="main">
        <div class="tieude">
    <h2>Xóa tin tức</h2>
    </div>
       
    <?php
    if(isset($_GET['MaTinTuc'])) {
        $matintuc = $_GET['MaTinTuc'];

        include("../config.php");

        $sql = "SELECT * FROM tintuc WHERE MaTinTuc='$matintuc'";
        $result = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            echo "<p>Bạn có chắc chắn muốn xóa tin tức có tiêu đề: " . $row['TieuDe'] . "?</p>";
            echo "<form style='display:flex;justify-content:center' action='' method='post'>";
            echo "<input type='hidden' name='matintuc' value='$matintuc'>";
            echo "<input style='        margin:0;border-radius:10px;box-shadow:0px 3px 3px #990000;background-color:#660000;color:white;font-weight:bold;font-size:18px;border:0;
            ' type='submit' value='Xác nhận xóa'>";
            echo "</form>";
        } else {
            echo "Không tìm thấy tin tức.";
        }

        mysqli_close($mysqli);
    } else {
        echo "Không có thông tin tin tức để xóa.";
    }
    ?>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matintuc = $_POST['matintuc'];

   include("../config.php");
   
    $sql = "DELETE FROM tintuc WHERE MaTinTuc='$matintuc'";

    if (mysqli_query($mysqli, $sql)) {
        $message = "Xóa tin tức thành công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=12';
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($mysqli);
    }


    mysqli_close($mysqli);
}
?>