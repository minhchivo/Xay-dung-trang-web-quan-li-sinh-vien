<?php
session_start();

include("config.php");

$message = "";

if (isset($_POST['submit'])) {
    $ma_sv = mysqli_real_escape_string($mysqli, $_POST['ma_sv']);
    $matkhau = mysqli_real_escape_string($mysqli, $_POST['matkhau']);

    $sql = "SELECT * FROM thongtindangnhap WHERE MSSV='$ma_sv' AND MatKhau='$matkhau'";
    $result = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $_SESSION['ma_sv'] = $ma_sv;
        $message = "Đăng nhập thành công!";
        echo "<script>
                window.location.href='index.php';
                alert('$message');
              </script>";
        exit();
    } else {
        $message = "Tài khoản và mật khẩu không chính xác!";
        echo "<script>
                alert('$message');
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Học Viện Hàng Không Việt Nam</title>

  <style>
    .header_login {
      width: 100%;
      height: 200px;
      background-color: white;
    }

    .tieudelogin {
      color: black;
      text-align: center;
    }

    #main {
      background-color: #ffffff;
      padding: 0 15px;
      padding-bottom: 2em;
      display: grid;
      grid-template-columns: 1fr 3fr;
    }

    #left-side {
      background-color: #ffffff;
      padding: 20px;
    }

    #right-side {
      background-color: #ffffff;
      padding: 20px;
    }

    .slides {
      display: none;
      position: relative;
    }

    .slides img {
      display: block;
      width: 80%;
      height: 350px;
      margin: auto;
      -webkit-animation: show 1s;
      animation: show 1s;
    }

    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 37rem;
      font-size: 20px;
      border-radius: 5px 0 0 5px;
      z-index: 99;
    }

    .next {
      right: 1vw;
      border-radius: 0 5px 5px 0;
    }

    .prev:hover,
    .next:hover {
      -webkit-transition: .2s;
      -o-transition: .2s;
      transition: .2s;
    }

    .caption-container {
      text-align: center;
      position: absolute;
      width: 100%;
      bottom: 0;
    }

    .prev,
    .next,
    .caption-container {
      background-color: #3f3f3fe5;
      padding: 10px;
    }

    .slide-active {
      opacity: 1;
      -webkit-transition: .2s;
      -o-transition: .2s;
      transition: .2s;
    }

    #content-section {
      margin-top: 20px;
      margin-right: 10px;
    }

    #latest-news-header {
      background: #bd3829;
      background: -moz-linear-gradient(-45deg, #bd3829 0%, #bd3829 50%, #3f3f3f 50%, #3f3f3f 100%);
      background: -webkit-linear-gradient(-45deg, #bd3829 0%, #bd3829 50%, #3f3f3f 50%, #3f3f3f 100%);
      background: linear-gradient(135deg, #bd3829 0%, #bd3829 50%, #3f3f3f 50%, #3f3f3f 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bd3829', endColorstr='#3f3f3f', GradientType=1 );
      border-radius: 4px 4px 0 0;
    }

    #time,
    #latest-news-title {
      display: block;
      padding: 5px 10px;
      width: 50%;
    }

    #time {
      text-align: right;
    }

    #latest-news {
      border: 1px dashed #3f3f3f;
      border-top: none;
      margin-bottom: 1.5em;
    }

    #column1,
    #column2 {
      flex-grow: 1;
      width: 50%;
    }

    #latest-news li {
      margin: 5px 5px 5px 20px;
      list-style-image: url(Image/bullet.gif);
      text-align: justify;
    }

    #latest-news a {
      color: #000000;
    }

    #latest-news a:hover {
      color: #bd3829f3;
    }

    .nav-tab {
      align-items: stretch;
    }

    .nav-link,
    .nav-tabs .nav-link.active {
      flex-grow: 1;
      text-align: center;
      margin: auto 1px;
    }

    .nav-tabs .nav-link.active {
      background-color: #bd3829f3;
    }

    .tab-pane {
      overflow: hidden auto;
      height: 480px;
      width: 100%;
      text-align: center;
      background-color: #d8d8d8;
    }

    .tab-content>.active {
      margin-top: -2px;
    }
    .news-item,
    #footer-content,
    #contact>div,
    #address>div,
    .footer-menu {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
    }

    .news-item {
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      margin: 1rem;
      text-align: justify;
    }

    .news-item {
      align-items: center;
      margin: 1rem;
      text-align: justify;
    }

    .news-item>img {
      width: 180px;
      height: 100px;
    }

    .news-item>a {
      padding: 1em 1.3em;
      font-size: 1.2em;
      color: #3f3f3f;
    }

    .continue {
      font-size: 1.2em;
      font-weight: 700;
    }

    .news-item>a:hover,
    .continue:hover {
      text-decoration: underline;
      color: #bd3829f3;
    }
    
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="lib/resetcss.css">
  <link rel="stylesheet" href="lib/font awesome/all.min.css">
  <link rel="stylesheet" href="lib/boostrap/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header id="header_login">
    <h1 class="tieudelogin">Cổng Thông Tin Trang Sinh Viên</h1>
  </header>
  <div id="main">
    <div id="left-side">
      <div class="container">
        <form method="POST">
          <h1 style="text-align: center;">Đăng nhập hệ thống</h1>
          <?php if (isset($message)) : ?>
            <p class="error-message"><?php echo $message; ?></p>
          <?php endif; ?>
          <div class="form-group">
            <label for="ma_sv">Nhập Mã Sinh Viên</label>
            <input type="text" name="ma_sv" class="form-control" placeholder="Nhập Mã Số Sinh Viên" required>
          </div>
          <div class="form-group">
            <label for="matkhau">Mật khẩu:</label>
            <input type="password" name="matkhau" class="form-control" placeholder="Mật khẩu" required>
          </div>
          <a href="quenmatkhau.php">Quên mật khẩu</a>
          <div style="padding-top: 5px; color: blue" class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Đăng nhập">
          </div>
        </form>
      </div>
    </div>
    <div id="right-side">
    <div id="content-section">
          <nav id="news-section">
            <!-- news tab -->
            <div>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" href="index_login.php?pid=1" data-toggle="tab" role="tab">Tin Tức</a>
                <a class="nav-item nav-link active" href="index_login.php?pid=2" data-toggle="tab" role="tab">Sự kiện</a>
                <a class="nav-item nav-link active" href="index_login.php?pid=3" data-toggle="tab" role="tab">Thông báo</a>
                <a class="nav-item nav-link active" href="index_login.php?pid=4" data-toggle="tab" role="tab">Tuyển Sinh</a>
                <a class="nav-item nav-link active" href="index_login.php?pid=5" data-toggle="tab" role="tab">Đào tạo</a>
                <a class="nav-item nav-link active" href="index_login.php?pid=6" data-toggle="tab" role="tab">Sinh viên</a>
              </div>
              <div class="tab-content" id="nav-tabContent">
              <?php
              if (isset($_GET['pid']))
                {
                    $id=$_GET['pid'];
                    switch ($id)
                    {
                      case 1:
                        include("sub-content/tintuc_login.php");
                        break;
                      case 2:
                        include("sub-content/sukien_login.php");
                        break;
                      case 3:
                        include("sub-content/thongbao_login.php");
                        break;
                      case 4:
                        include("sub-content/tuyensinh_login.php");
                        break;  
                      case 5:
                        include("sub-content/daotao_login.php");
                        break;
                      case 6:
                        include("sub-content/sinhvien_login.php");
                        break;


                    }
                }
              else
                    include("sub-content/tintuc_login.php");
            ?>
              </div>
              
      </div>
    </div>
  </div>
</body>

</html>