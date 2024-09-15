<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa, nếu chưa thì chuyển hướng đến trang đăng nhập
if(!isset($_SESSION['admin_id'])) {
  header("Location: trangquantri_login.php");
  exit(); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="cssadmin/phanhoi.css">
  <title>Trang quản trị viên</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="cssadmin/phanhoi.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <style>


.danhsachchucnangadmin ul {
  list-style-type: none; 
  color: white; 
  margin: 0;
  padding: 0;
  text-align: center; 
}

.danhsachchucnangadmin li {
    color: white; 
  display: inline-block; 
}

.danhsachchucnangadmin li a {
  color: white; 
  text-align: center; 
  padding: 14px 16px; 
  text-decoration: none; 
}

.danhsachchucnangadmin li a.active {
  background-color: gainsboro;
}

.danhsachchucnangadmin li a:hover {
  background-color: #555;
}

  </style>
</head>
<body>
<div class="admin_chung">
  <div class="headeradmin">
    <h1>Trang Quản Trị Viên Quản Lý Sinh viên</h1>
  </div>
  <div class="bodyadmin">
    <nav class="danhsachchucnangadmin">
      <ul>
        <li><a href="trangquantri.php?pid=2" class="active">Quản lí sinh viên</a></li>
        <li><a href="trangquantri.php?pid=3" class="active">Quản lí học phần</a></li>
        <li><a href="trangquantri.php?pid=4" class="active">Quản lí công nợ</a></li>
        <li><a href="trangquantri.php?pid=5" class="active">Quản lí phản hồi</a></li>
        <li><a href="trangquantri.php?pid=6" class="active">Quản lí điểm</a></li>
        <li><a href="trangquantri.php?pid=12" class="active">Quản lí tin tức</a></li>
        <li><a href="trangquantri.php?pid=7" class="active">Danh sách giảng viên</a></li>
        <li><a class="active" onclick="confirmLogout()">Đăng xuất</a></li>

<script>
function confirmLogout() {
    var confirmation = confirm("Bạn có chắc muốn đăng xuất?");
    if (confirmation) {
        window.location.href = "trangquantri_logout.php"; 
    } else {
       
    }
}
</script>
      </ul>
    </nav>

    <div class="main_admin">
    <?php
              if (isset($_GET['pid']))
                {
                    $id=$_GET['pid'];
                    switch ($id)
                    {
                        case 2:
                            include("htmladmin/quanlisinhvien.php");
                            break;
                        case 3:
                            include("htmladmin/quanlihocphan.php");
                            break;
                        case 4:
                            include("htmladmin/quanlicongno.php");
                            break;
                        case 5:
                            include("htmladmin/quanliphanhoi.php");
                            break;
                        case 6:
                            include("htmladmin/quanlidiem.php");
                            break;
                        case 7:
                            include("htmladmin/quanligiangvien.php");
                            break;
                        case 8:
                            include("chucnang/themgiangvien.php");
                            break;
                        case 9:
                            include("chucnang/suagiangvien.php");
                              break;
                        case 10:
                            include("chucnang/xoagiangvien.php");
                            break;
                        case 11:
                            include("chucnang/suacongno.php");
                            break;
                        case 12:
                            include("htmladmin/quanlitintuc.php");
                            break;
                        case 14:
                            include("chucnang/suatintuc.php");
                            break;
                        case 15:
                            include("chucnang/xoatintuc.php");
                            break;
                        case 16:
                            include("chucnang/resetmatkhau.php");
                            break;
                        case 17:
                            include("chucnang/themhocphan.php");
                            break;
                        case 18:
                            include("chucnang/suahocphan.php");
                            break;
                        case 19:
                            include("chucnang/xoahocphan.php");
                            break;
                        case 20:
                            include("chucnang/themsinhvien.php");
                            break;
                        case 21:
                            include("chucnang/suathongtinsinhvien.php");
                            break;
                        case 22:
                            include("chucnang/xoasinhvien.php");
                            break;
                        case 23:
                            include("htmladmin/quanlidkhocphan.php");
                            break;
                        case 24:
                            include("chucnang/capnhattrangthaidkhocphan.php");
                            break;
                        case 25:
                            include("chucnang/chinhsuadiem.php");
                            break;
                        case 26:
                            include("htmladmin/quanlihocphi.php");
                            break;
                    }
                }
              else
                    include("htmladmin/quanlisinhvien.php");
            ?>
      </main>
    </div>
  </div>
  <div class="footeradmin">
    <p>&copy; 2024 Quản lý Sinh viên</p>
  </div>
</div>
</body>
</html>
