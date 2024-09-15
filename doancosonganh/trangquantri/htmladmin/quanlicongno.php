<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý công nợ</title>
</head>
<body>
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href=""><b>Quản lý học phần</b></a></li>
        <li class="breadcrumb-item active"><a href="trangquantri.php?pid=26"><b>Quản lý học phí</b></a></li>
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
            <th>Năm học</th>
            <th>Học kỳ</th>
            <th>Số tiền phải đóng</th>
            <th>Số tiền đã đóng</th>
            <th>Công nợ</th>
            <th>Trạng thái học phí</th>
            <th>Chỉnh sửa</th>
        </tr>
        <?php
            include("../config.php");
            $sql = "SELECT * FROM hocphi";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["MSSV"]."</td>
                            <td>".$row["NamHoc"]."</td>
                            <td>".$row["HocKy"]."</td>
                            <td>".$row["SoTienPhaiDong"]."</td>
                            <td>".$row["SoTienDaDong"]."</td>
                            <td>".$row["CongNo"]."</td>
                            <td>".$row["TrangThaiHocPhi"]."</td>
                            <td><a href='trangquantri.php?pid=11&MSSV=".$row["MSSV"]."&NamHoc=".$row["NamHoc"]."&HocKy=".$row["HocKy"]."'>Chỉnh sửa</a></td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Không có dữ liệu</td></tr>";
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

