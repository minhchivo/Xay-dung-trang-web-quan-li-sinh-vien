<!DOCTYPE html>
<html>
<head>
    <title>Quản Lý Điểm</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href=""><b>Quản Lý Điểm</b></a></li>
        <li class="breadcrumb-item active"><a href="trangquantri.php?pid=25"><b> Chỉnh Sửa Điểm </b></a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                  <tr>
            <th>MSSV</th>
            <th>Mã Lớp Học Phần</th>
            <th>Lớp Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th>Điểm Quá Trình</th>
            <th>Điểm Giữa Kỳ</th>
            <th>Điểm Cuối Kỳ</th>
            <th>Điểm Tổng Kết</th>
            <th>Xếp Loại</th>
            <th>Chỉnh Sửa</th>
        </tr>
        <?php
        include("../config.php");
        $sql = "SELECT * FROM ketquahoctap";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["MSSV"] . "</td>";
                echo "<td>" . $row["MaLopHocPhan"] . "</td>";
                echo "<td>" . $row["LopHocPhan"] . "</td>";
                echo "<td>" . $row["SoTinChi"] . "</td>";
                echo "<td>" . $row["DiemQuaTrinh"] . "</td>";
                echo "<td>" . $row["DiemGiuaKi"] . "</td>";
                echo "<td>" . $row["DiemCuoiKy"] . "</td>";
                echo "<td>" . $row["DiemTongKet"] . "</td>";
                echo "<td>" . $row["XepLoai"] . "</td>";
                echo "<td><a href='trangquantri.php?pid=25&mssv=" . $row["MSSV"] . "&malop=" . $row["MaLopHocPhan"] . "'>Chỉnh Sửa</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Không có dữ liệu</td></tr>";
        }

        $mysqli->close();
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

