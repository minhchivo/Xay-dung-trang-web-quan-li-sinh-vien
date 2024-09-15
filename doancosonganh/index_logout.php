<?php
session_start();
unset($_SESSION['ma_sv']);
$message = "Đăng xuất thành công!";
        echo "<script>
                window.location.href='index_login.php';
                alert('$message');
              </script>";
exit();
?>