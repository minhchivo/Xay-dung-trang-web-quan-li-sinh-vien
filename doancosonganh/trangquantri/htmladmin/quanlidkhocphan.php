<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí đăng ký học phần</title>
</head>
<body>
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href=""><b>Quản lý học phần</b></a></li>
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
        <th>STT</th>
        <th>MSSV</th>
        <th>Mã học phần</th>
        <th>Lớp Học Phần</th>
        <th>Trạng thái đăng ký</th>
        <th>Ngày đăng ký</th>
        <th>Chỉnh sửa</th>
    </tr>
    <?php
    include("../config.php");
    $sql = "SELECT * FROM dangkihocphan";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["STT"] . "</td>";
            echo "<td>" . $row["MSSV"] . "</td>";
            echo "<td>" . $row["MaHocPhan"] . "</td>";
            echo "<td>" . $row["LopHocPhan"] . "</td>";
            echo "<td>" . $row["TrangThaiDangKi"] . "</td>";
            echo "<td>" . $row["NgayDangKi"] . "</td>";
            echo "<td>";
            echo "<form action='trangquantri.php?pid=24' method='post'>";
            echo "<input type='hidden' name='STT' value='" . $row["STT"] . "'>";
            echo "<select name='TrangThaiDangKi'>";
            echo "<option value='Thành công (Đã xác nhận)'>Thành công (Đã xác nhận)</option>";
            echo "<option value='Thành công (Chờ xác nhận)'>Thành công (Chờ xác nhận)</option>";
            echo "</select>";
            echo "<input type='submit' value='Cập nhật'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td>Không có dữ liệu</td></tr>";
    }
    $mysqli->close();
    ?>
</table>
<button onclick="history.back();">Quay Lại</button>
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

