<?php
include("../config.php");

$STT = $_POST['STT'];
$TrangThaiDangKi = $_POST['TrangThaiDangKi'];

$sql = "UPDATE dangkihocphan SET TrangThaiDangKi='$TrangThaiDangKi' WHERE STT=$STT";

if ($mysqli->query($sql) === TRUE) {
    $select_query = "SELECT * FROM dangkihocphan WHERE STT = $STT";
    $result = $mysqli->query($select_query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaHocPhan = $row["MaHocPhan"];
            $LopHocPhan = $row["LopHocPhan"];
            $ThuHoc = $row["ThuHoc"];
            $TietHoc = $row["Tiethoc"];
            $PhongHoc = $row["PhongHoc"];
            $MaGiangVien = $row["MaGiangVien"];
            $MSSV = $row["MSSV"];
            $SoTinChi = $row["SoTinChi"];
            $MSSV = $row["MSSV"];
            $HocKy = $row["HocKy"];
            $NgayDangKi = date("Y-m-d");
            $SoTienPhaiDong = $row["SoTienPhaiDong"];
            $SoTienDaDong = 0;
            $CongNo = $SoTienPhaiDong; 
            $TrangThaiHocPhi = "Chưa Đóng";

            // Insert into lichhoc table
            $insert_query = "INSERT INTO lichhoc (MaHocPhan, LopHocPhan, ThuHoc, TietHoc, PhongHoc, MaGiangVien, MSSV)
                             VALUES ('$MaHocPhan', '$LopHocPhan', '$ThuHoc', '$TietHoc', '$PhongHoc', '$MaGiangVien', '$MSSV')";

            if ($mysqli->query($insert_query) === TRUE) {
                // Insert into ketquahoctap table
                $insert_ketqua_query = "INSERT INTO ketquahoctap (MSSV, MaLopHocPhan, LopHocPhan, SoTinChi)
                                        VALUES ('$MSSV', '$STT', '$LopHocPhan', '$SoTinChi')";

                if ($mysqli->query($insert_ketqua_query) === TRUE) {
                    // Insert into hocphi table
                    $insert_hocphi_query = "INSERT INTO hocphi (MSSV, HocKy, NgayDangKi, TrangThaiDangKi, SoTienPhaiDong, SoTienDaDong, CongNo, TrangThaiHocPhi)
                                            VALUES ('$MSSV', '$HocKy', '$NgayDangKi', '$TrangThaiDangKi', '$SoTienPhaiDong', '$SoTienDaDong', '$CongNo', '$TrangThaiHocPhi')";

                    if ($mysqli->query($insert_hocphi_query) === TRUE) {
                        $message = "Cập nhật trạng thái đăng kí học phần thành công!";
                        echo "<script>
                                window.location.href='trangquantri.php?pid=23';
                                alert('$message');
                              </script>";
                        exit();
                    } else {
                        echo "Lỗi khi chèn dữ liệu vào bảng hocphi: " . $mysqli->error;
                    }
                } else {
                    echo "Lỗi khi chèn dữ liệu vào bảng ketquahoctap: " . $mysqli->error;
                }
            } else {
                echo "Lỗi khi chèn dữ liệu vào bảng lichhoc: " . $mysqli->error;
            }
        }
    } else {
        echo "Không tìm thấy dữ liệu trong bảng dangkihocphan.";
    }
} else {
    echo "Lỗi khi cập nhật trạng thái đăng ký: " . $mysqli->error;
}

$mysqli->close();
?>
