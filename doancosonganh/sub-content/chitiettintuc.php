<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 10px;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
       include("config.php");

        $id = $_GET['id'];

        $sql = "SELECT TieuDe, NoiDung FROM tintuc WHERE MaTinTuc = $id";
        $result = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<h2>" . $row["TieuDe"] . "</h2>";
            echo "<p>" . $row["NoiDung"] . "</p>";
        } else {
            echo "Không tìm thấy tin tức.";
        }

        // Đóng kết nối
        mysqli_close($mysqli);
    ?>
    <br>
    <button type="button" onclick="history.back()">Quay lại</button>
    </div>
</body>
</html>
