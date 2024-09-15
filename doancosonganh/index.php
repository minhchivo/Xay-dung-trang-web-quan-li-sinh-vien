<?php
session_start();

if(!isset($_SESSION['ma_sv'])) {
  header("Location: index_login.php");
  exit(); 
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <title>TKQCT EDUCATIon</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="lib/resetcss.css">
  <link rel="stylesheet" href="lib/font awesome/all.min.css">
  <link rel="stylesheet" href="lib/boostrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="javascript/menu_left.js"></script>
</head>

<body>
       <!-- Header -->
  <header id="header">
        <?php include("sub-content/menu_top.php");?>
  </header>

  <main id="main">
      <!-- Menu trái  -->
      <div id="left-side">
         <?php include("sub-content/menu_left.php");?>
       </div>

      <!-- Menu phải -->
      <div id="right-side"> 
            <?php
              if (isset($_GET['pid']))
                {
                    $id=$_GET['pid'];
                    switch ($id)
                    {
                      case 1:
                        include("sub-content/tin_tuc.php");
                        break;
                      case 2:
                        include("sub-content/thongtinsinhvien.php");
                        break;
                      case 3:
                        include("sub-content/doimatkhau.php");
                        break;
                      case 4:
                        include("sub-content/lichtuan.php");
                        break;
                      case 5:
                        include("sub-content/lichthi.php");
                        break;
                      case 6:
                        include("sub-content/dexuatbieumau.php");
                        break;
                      case 7:
                        include("sub-content/ketquahoctap.php");
                        break;
                      case 8:
                        include("sub-content/tracuuthongtincanbo.php");
                        break;
                      case 9:
                        include("sub-content/tracuucongno.php");
                        break;
                      case 10:
                        include("sub-content/thanhtoancongno.php");
                        break;
                      case 11:
                        include("sub-content/dangkihocphan.php");
                        break;
                      case 13:
                        include("sub-content/lichsuphanhoi.php");
                        break;
                      case 14:
                        include("sub-content/chitiettintuc.php");
                        break;
                      case 15:
                        include("sub-content/kqtracuucanbo.php");
                        break;
                      case 16:
                        include("sub-content/hocphandadangki.php");
                        break;
                      case 17:
                        include("sub-content/lichsuthanhtoan.php");
                        break;
                    }
                }
              else
                    include("sub-content/trangchu.php");
            ?>
      </div>
  </main>
      <!-- Footer -->
  <footer id="footer">
          <?php include("sub-content/footer.php"); ?>
  </footer>


  <!-- Optional JavaScript -->
  <script defer src="lib/jquery-3.4.1.min.js"></script>
  <script async src="javascript/javascript.js"></script>
  <script defer src="lib/boostrap/bootstrap.min.js"></script>
  <script defer src="lib/font awesome/all.min.js"></script>

</body>

</html>
