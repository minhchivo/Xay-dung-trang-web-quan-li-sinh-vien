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
<?php
include("../config.php");

if (isset($_POST['id']) && isset($_POST['status']) && $_POST['status'] == 'approved') {
    $id = $_POST['id'];
    $status = 'Đã duyệt';
    
    $sql_update = "UPDATE thanhtoanhocphi SET TrangThai='$status' WHERE ID=$id";
    if ($mysqli->query($sql_update) === TRUE) {
        $message = "Thay đổi trạng thái học phí thành công!";

        $sql_select = "SELECT * FROM thanhtoanhocphi WHERE ID=$id";
        $result_select = $mysqli->query($sql_select);
        if ($result_select->num_rows > 0) {
            $row = $result_select->fetch_assoc();
            $MSSV = $row["MSSV"];
            $SoTienDaNop = $row["SoTienDaNop"];
            
            $sql_check_exist = "SELECT * FROM hocphi WHERE MSSV='$MSSV'";
            $result_check_exist = $mysqli->query($sql_check_exist);
            if ($result_check_exist->num_rows > 0) {

                $sql_update_hocphi = "UPDATE hocphi SET SoTienDaDong = SoTienDaDong + $SoTienDaNop WHERE MSSV='$MSSV'";
                if ($mysqli->query($sql_update_hocphi) === TRUE) {
                    $message .= " Số tiền đã nộp đã được cập nhật.";
                } else {
                    $message .= " Lỗi khi cập nhật số tiền đã nộp: " . $mysqli->error;
                }
            } else {

                $sql_insert = "INSERT INTO hocphi (MSSV, SoTienDaDong) VALUES ('$MSSV', $SoTienDaNop)";
                if ($mysqli->query($sql_insert) === TRUE) {
                    $message .= " Số tiền đã nộp đã được thêm vào bảng hocphi.";
                } else {
                    $message .= " Lỗi khi thêm dữ liệu vào bảng hocphi: " . $mysqli->error;
                }
            }
            
            $sql_update_hocphi = "UPDATE hocphi SET CongNo = SoTienPhaiDong - SoTienDaDong, TrangThaiHocPhi = IF(SoTienPhaiDong - SoTienDaDong = 0, 'Đã đóng', 'Chưa đóng') WHERE MSSV='$MSSV'";
            if ($mysqli->query($sql_update_hocphi) === TRUE) {
                $message .= " Công nợ và trạng thái học phí đã được cập nhật.";
            } else {
                $message .= " Lỗi khi cập nhật công nợ và trạng thái học phí: " . $mysqli->error;
            }
        } else {
            $message .= " Không tìm thấy thông tin học phí.";
        }
        
        echo "<script>
                window.history.back();
                alert('$message');
              </script>";
        exit();
    } else {
        echo "Lỗi: " . $mysqli->error;
    }
}

$sql = "SELECT * FROM thanhtoanhocphi";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>MSSV</th><th>Số Tiền Đã Nộp</th><th>Ngày Nộp</th><th>Trạng Thái</th><th>Thao Tác</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["ID"]."</td>";
        echo "<td>".$row["MSSV"]."</td>";
        echo "<td>".$row["SoTienDaNop"]."</td>";
        echo "<td>".$row["NgayNop"]."</td>";
        echo "<td>".$row["TrangThai"]."</td>";
        echo "<td>";
        if ($row["TrangThai"] == "Chưa duyệt") {
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='id' value='".$row["ID"]."'>";
            echo "<input type='hidden' name='status' value='approved'>";
            echo "<input type='submit' value='Duyệt'>";
            echo "</form>";
        } else {
            echo "Đã duyệt";
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có dữ liệu";
}
$mysqli->close();
?>


<button onclick="history.back();">Quay lại</button>

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

