<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức</title>
    <style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            margin-top: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px #CC0000;
            padding-top: 10px;
            padding-bottom: 20px;
            color: black;
        }

        .container h2 a {
            font-family: Arial;
            color: black;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="container">
    <div class="tieude">
    <h3 style="font-weight:bold;color:#777777;border-bottom:1px solid #880000;text-align:center">Danh sách Tin Tức</h3>
    </div>
    <div class="news">
    <?php
        include("config.php");

        $sql = "SELECT MaTinTuc, TieuDe FROM tintuc";
        $result = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($result) > 0) { 
            while($row = mysqli_fetch_assoc($result)) {
                echo "<p><a href='index.php?pid=14&id=" .$row["MaTinTuc"] . "'>" . $row["TieuDe"] . "</a></p><br>";
            }
        } else {
            echo "Không có tin tức nào.";
        }

        mysqli_close($mysqli);
    ?>
    </div>
    </div>
</body>
</html>
