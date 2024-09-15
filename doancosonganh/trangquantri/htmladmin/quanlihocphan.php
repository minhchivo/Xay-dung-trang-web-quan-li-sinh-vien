<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý học phần</title>
</head>
<body>
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href=""><b>Quản lý học phần</b></a></li>
        <li class="breadcrumb-item active"><a href="trangquantri.php?pid=17"><b>Thêm Học Phần Mới</b></a></li>
        <li class="breadcrumb-item active"><a href="trangquantri.php?pid=23"><b>Quản Lí đăng kí học phần</b></a></li>
    </ul>
</div>
<div id="clock"></div>

    <div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                   <tr>
            <th>Mã Học Phần</th>
            <th>Học Kỳ</th>
            <th>Số Tín Chỉ</th>
            <th>Mã Ngành</th>
            <th>Mã Giảng Viên</th>
            <th>Lớp Học Phần</th>
            <th>Ngsày Bắt Đầu</th>
            <th>Ngày Kết Thúc</th>
            <th>Số Tiền Phải Đóng</th>
            <th>Trạng Thái Lớp Học Phần</th>
            <th>Phòng Học</th>
            <th>Tên Giảng Viên</th>
            <th>Thứ </th>
            <th>Ca</th>
            <th>Thao tác</th>
        </tr>

        <?php
        include("../config.php");
        $sql = "SELECT * FROM hocphan";
        $result = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["MaHocPhan"] . "</td>";
                echo "<td>" . $row["HocKy"] . "</td>";
                echo "<td>" . $row["SoTinChi"] . "</td>";
                echo "<td>" . $row["MaNganh"] . "</td>";
                echo "<td>" . $row["MaGiangVien"] . "</td>";
                echo "<td>" . $row["LopHocPhan"] . "</td>";
                echo "<td>" . $row["NgayBatDau"] . "</td>";
                echo "<td>" . $row["NgayKetThuc"] . "</td>";
                echo "<td>" . $row["SoTienPhaiDong"] . "</td>";
                echo "<td>" . $row["TrangThaiLopHocPhan"] . "</td>";
                echo "<td>" . $row["PhongHoc"] . "</td>";
                echo "<td>" . $row["TenGiangVien"] . "</td>";
                echo "<td>" . $row["ThuHoc"] . "</td>";
                echo "<td>" . $row["Tiethoc"] . "</td>";
                echo "<td><a href='trangquantri.php?pid=18&id=" . $row["MaHocPhan"] . "'>Sửa</a> | <a href='trangquantri.php?pid=19&id=" . $row["MaHocPhan"] . "'>Xóa</a></td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }

        mysqli_close($mysqli);
        ?>
    </table>
    
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

