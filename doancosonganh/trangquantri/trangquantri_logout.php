<?php
session_start();
unset($_SESSION['admin_id']);
$message = "Đăng xuất thành công!";
        echo "<script>
                window.location.href='trangquantri_login.php';
                alert('$message');
              </script>";
exit();
?>