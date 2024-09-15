
<?php
include("../config.php");
$sql = "SELECT * FROM sinhvien";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<div class=\"app-title\">
            <ul class=\"app-breadcrumb breadcrumb side\">
                <li class=\"breadcrumb-item active\"><a href=\"\"><b>Quản lý Sinh Viên</b></a></li>
                <li class=\"breadcrumb-item active\"><a href=\"trangquantri.php?pid=20\"><b>Thêm Sinh Viên Mới</b></a></li>
            </ul>
        </div>
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"tile\">
                    <div class=\"tile-body\">
                        <table class=\"table table-hover table-bordered\" id=\"sampleTable\">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>MSSV</th>
                                    <th>Họ và Tên</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Ngày vào trường</th>
                                    <th>Khoa</th>
                                    <th>Tên ngành</th>
                                    <th>Lớp học</th>
                                    <th>Số CCCD</th>
                                    <th>Địa chỉ liên hệ</th>
                                    <th>Nơi sinh</th>
                                    <th>Dân tộc</th>
                                    <th>Email</th>
                                    <th>Tôn giáo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><img src='../Image/". $row["HinhAnh"]. "' style='width: 100px; height: auto;'></td>
                <td>" . $row["MSSV"]. "</td>
                <td>" . $row["HoTen"]. "</td>
                <td>" . $row["GioiTinh"]. "</td>
                <td>" . $row["NgaySinh"]. "</td>
                <td>" . $row["NgayVaoTruong"]. "</td>
                <td>" . $row["Khoa"]. "</td>
                <td>" . $row["TenNganh"]. "</td>
                <td>" . $row["LopHoc"]. "</td>
                <td>" . $row["SoCCCD"]. "</td>
                <td>" . $row["DiaChiLienHe"]. "</td>
                <td>" . $row["NoiSinh"]. "</td>
                <td>" . $row["DanToc"]. "</td>
                <td>" . $row["Email"]. "</td>
                <td>" . $row["TonGiao"]. "</td>
                <td>
                    <a href='trangquantri.php?pid=21&id=" . $row["MSSV"] . "'>Sửa</a> | 
                    <a href='trangquantri.php?pid=22&id=" . $row["MSSV"] . "'>Xóa</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 kết quả";
}

$mysqli->close();
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


