<!DOCTYPE html>
<html>
<head>
<div class='app-title'>
    <ul class='app-breadcrumb breadcrumb side'>
        <li class='breadcrumb-item active'><a href=''><b>Quản Lý Tin Tức</b></a></li>
    </ul>
</div>
</head>
<body>
<style>
     #addNewsButton {
        background-color: yellow; /* Thay đổi màu nền thành màu vàng */
        border: none;
        color: black;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
    }
    
    #addNewsForm {
        margin-top: 20px;
    }
    
    #addNewsForm label {
        font-weight: bold;
    }
    
    #addNewsForm input[type="text"],
    #addNewsForm textarea {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    
    #addNewsForm input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    #addNewsForm input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<div id="addNewsForm" style="display: none;">
    <form action="" method="post">
        <label for="tieude">Tiêu đề:</label><br>
        <input type="text" id="tieude" name="tieude"><br>
        <label for="noidung">Nội dung:</label><br>
        <textarea id="noidung" name="noidung"></textarea><br>
        <input type="submit" value="Thêm">
    </form>
</div>
<button id="addNewsButton" onclick="toggleForm()">Thêm Tin Tức Mới</button>

<script>
    function toggleForm() {
        var form = document.getElementById("addNewsForm");
        var button = document.getElementById("addNewsButton");
        if (form.style.display === "none") {
            form.style.display = "block";
            button.innerText = "Thu Lại";
        } else {
            form.style.display = "none";
            button.innerText = "Thêm Tin Tức Mới";
        }
    }
</script>

    <?php
    include("../config.php");
    $sql = "SELECT * FROM tintuc";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='row'>
    <div class='col-md-12'>
        <div class='tile'>
            <div class='tile-body'>
                <table class='table table-hover table-bordered' id='sampleTable'>
                    <thead>
                  <tr>
                    <th>MaTinTuc</th>
                    <th>Tiêu đề</th>
                    <th>Ngày đăng</th>
                    <th>Nội dung</th>
                    <th>Hành động</th>
                </tr>";

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['MaTinTuc'] . "</td>";
            echo "<td>" . $row['TieuDe'] . "</td>";
            echo "<td>" . $row['NgayDang'] . "</td>";
            echo "<td>" . $row['NoiDung'] . "</td>";
            echo "<td>
                    <a href='trangquantri.php?pid=14&MaTinTuc=" . $row['MaTinTuc'] . "'>Sửa</a>
                    <a href='trangquantri.php?pid=15&MaTinTuc=" . $row['MaTinTuc'] . "'>Xóa</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có tin tức.";
    }


    mysqli_close($mysqli);
    ?>
<br><br><br>
    
</body>
</html>
<?php
include("../config.php");
$message = "";
if (!$mysqli) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];

    $sql = "INSERT INTO tintuc (TieuDe, NoiDung, NgayDang) VALUES ('$tieude', '$noidung', NOW())";

    if (mysqli_query($mysqli, $sql)) {
        $message = "Thêm tin tức thành công!";
        echo "<script>
                window.location.href='trangquantri.php?pid=12';
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($mysqli);
    }
}

mysqli_close($mysqli);
?>


<script src="jsadmin/phanhoi/jquery-3.2.1.min.js"></script>
<script src="jsadmin/phanhoi/popper.min.js"></script>
<script src="jsadmin/phanhoi/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="src/jquery.table2excel.js"></script>
<script src="jsadmin/phanhoi/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="jsadmin/phanhoi/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="jsadmin/phanhoi/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>


