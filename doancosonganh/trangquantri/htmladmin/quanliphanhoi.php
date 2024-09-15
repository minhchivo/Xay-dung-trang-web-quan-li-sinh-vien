<?php
include("../config.php");

if(isset($_POST['update_status'])) {
    $maphanhoi = $_POST['maphanhoi'];
    $new_status = $_POST['new_status'];

    $update_query = "UPDATE phanhoi SET TrangThai = '$new_status' WHERE MaPhanHoi = '$maphanhoi'";
    $mysqli->query($update_query);
}

if(isset($_POST['delete'])) {
    $maphanhoi = $_POST['maphanhoi'];

    $delete_query = "DELETE FROM phanhoi WHERE MaPhanHoi = '$maphanhoi'";
    if ($mysqli->query($delete_query) === TRUE) {
        echo "<script>alert('Xóa phản hồi thành công');</script>";
        echo "<script>window.location = 'trangquantri.php?pid=5';</script>";
    } else {
        echo "Lỗi: " . $mysqli->error;
    }
}

$sql_sinhvien = "SELECT phanhoi.MaPhanHoi, sinhvien.MSSV, sinhvien.HoTen, sinhvien.NgaySinh, phanhoi.NoiDung, phanhoi.TrangThai 
                FROM sinhvien 
                INNER JOIN phanhoi ON sinhvien.MSSV = phanhoi.MSSV";
$result_sinhvien = $mysqli->query($sql_sinhvien);

?>

<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href=""><b>Quản lý phản hồi</b></a></li>
        <li class="breadcrumb-item active"><a href="trangquantri.php?pid=16"><b>Reset Mật khẩu</b></a></li>
    </ul>
    <div id="clock"></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th width="10"><input type="checkbox" id="all"></th>
                        <th>Họ và Tên</th>
                        <th>Ngày sinh</th>
                        <th>Mã Sinh Viên</th>
                        <th>Lý do</th>
                        <th>Tình trạng</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($result_sinhvien->num_rows > 0) {
                        while ($row_sinhvien = $result_sinhvien->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td width='10'><input type='checkbox' name='check1' value='1'></td>";
                            echo "<td>" . $row_sinhvien['HoTen'] . "</td>";
                            echo "<td>" . $row_sinhvien['NgaySinh'] . "</td>";
                            echo "<td>" . $row_sinhvien['MSSV'] . "</td>";
                            echo "<td>" . $row_sinhvien['NoiDung'] . "</td>";
                            echo "<td>" . $row_sinhvien['TrangThai'] . "</td>";
                            echo "<td>";
                            echo "<form method='POST'>";
                            echo "<input type='hidden' name='maphanhoi' value='" . $row_sinhvien['MaPhanHoi'] . "'>";
                            echo "<select name='new_status'>";
                            echo "<option value='Chờ xử lí'>Chờ xử lí</option>";
                            echo "<option value='Đã xử lí'>Đã xử lí</option>";
                            echo "</select>";
                            echo "<button type='submit' name='update_status' class='btn btn-primary btn-sm' title='Cập nhật'><i class='fa fa-save'></i></button>";
                            echo "</form>";
                            echo "<form method='POST'>";
                            echo "<input type='hidden' name='maphanhoi' value='" . $row_sinhvien['MaPhanHoi'] . "'>";
                            echo "<button type='submit' name='delete' class='btn btn-danger btn-sm' title='Xóa'><i class='fa fa-trash'></i></button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 kết quả";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
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

