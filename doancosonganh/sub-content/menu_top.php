<nav class="header-nav">
      <div id="nav-content-collasp">  
        <div>
          <a href="index.php"><img src="Image/hvhk-logo.png" alt="logo" class="logo hide"></a>
          <a href="#"><img src="Image/eng_flag.gif" alt="eng" id="lang-eng"></a>
        </div>
        <button type="button" id="collaspe-btn">☰</button>
      </div>

      <ul class="header-nav-list" id="nav-full">
        <li class="nav-content"><a href="index.php"> <i class="fa-solid fa-house"></i> TRANG CHỦ</a></li>
        <li class="nav-content"><a href="index.php?pid=1">TIN TỨC</a></li>
        <?php
              include("config.php");
              $ma_sv = $_SESSION['ma_sv'];
              $sql = "SELECT * FROM sinhvien WHERE MSSV='$ma_sv'";
              $result = mysqli_query($mysqli, $sql);

              if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
              }
?>
        <li class="nav-content dropdown">
            <a href="" class="dropdown-toggle"><?php echo $row["HoTen"]; ?></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?pid=2">Thông Tin Sinh Viên</a></li>
              <li><a href="index.php?pid=3">Đổi Mật Khẩu</a></li>
              <li><a href="index_logout.php">Đăng Xuất</a></li>
              
            </ul>
          </li>
          
      </ul>
    </nav>