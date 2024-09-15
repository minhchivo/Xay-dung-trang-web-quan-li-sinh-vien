<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý giảng viên</title>
   
</head>
<body>
    <?php
include("../config.php");

if (isset($_GET['pid']) && $_GET['pid'] == 9 && isset($_GET['magiangvien'])) {
    $magiangvien = $_GET['magiangvien'];
    $sql_select = "SELECT * FROM giangvien WHERE MaGiangVien='$magiangvien'";
    $result_select = mysqli_query($mysqli, $sql_select);
    
    if (mysqli_num_rows($result_select) > 0) {
        $row_select = mysqli_fetch_assoc($result_select);
        echo "<form action='sua_giangvien.php' method='POST'>
                <input type='hidden' name='magiangvien' value='".$row_select['MaGiangVien']."'>
                <label for='hoten'>Họ và Tên:</label><br>
                <input type='text' id='hoten' name='hoten' value='".$row_select['HoTen']."'><br><br>
                <label for='email'>Email:</label><br>
                <input type='email' id='email' name='email' value='".$row_select['Email']."'><br><br>
                <label for='sdt'>Số điện thoại:</label><br>
                <input type='text' id='sdt' name='sdt' value='".$row_select['SDT']."'><br><br>
                <label for='ngaysinh'>Ngày sinh:</label><br>
                <input type='date' id='ngaysinh' name='ngaysinh' value='".$row_select['NgaySinh']."'><br><br>
                <label for='ngayvaotruong'>Ngày vào trường:</label><br>
                <input type='date' id='ngayvaotruong' name='ngayvaotruong' value='".$row_select['NgayVaoTruong']."'><br><br>
                <input type='submit' value='Lưu'>
            </form>";
    } else {
        echo "Không tìm thấy thông tin giảng viên cần sửa.";
    }
} else {
    $sql = "SELECT * FROM giangvien";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class=\"app-title\">
                <ul class=\"app-breadcrumb breadcrumb side\">
                    <li class=\"breadcrumb-item active\"><a href=\"\"><b>Danh Sách Giảng Viên</b></a></li>
                    <li class=\"breadcrumb-item active\"><a href=\"trangquantri.php?pid=8\"><b>Thêm Giảng Viên Mới</b></a></li>
                </ul>
            </div>
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"tile\">
                        <div class=\"tile-body\">
                            <table class=\"table table-hover table-bordered\" id=\"sampleTable\">
                                <thead>
                                    <tr>
                                        <th>Mã Giảng Viên</th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>SĐT</th>
                                        <th>Ngày Sinh</th>
                                        <th>Ngày Vào Trường</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['MaGiangVien']."</td>
                    <td>".$row['HoTen']."</td>
                    <td>".$row['Email']."</td>
                    <td>".$row['SDT']."</td>
                    <td>".$row['NgaySinh']."</td>
                    <td>".$row['NgayVaoTruong']."</td>
                    <td>
                        <a href='trangquantri.php?pid=9&magiangvien=".$row['MaGiangVien']."'>Sửa</a> | 
                        <a href='trangquantri.php?pid=10&action=delete&magiangvien=".$row['MaGiangVien']."' onclick='return confirm(\"Bạn có chắc chắn muốn xóa giảng viên này không?\")'>Xóa</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Không có giảng viên nào trong danh sách!";
    }
}
mysqli_close($mysqli);
?>

</body>
</html>

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


