<?php
// Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối tùy theo cấu hình của bạn)
include("config.php");

// Biến chứa kết quả tìm kiếm
$search_results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $keyword = $_POST['keyword'];

    // Chuyển hướng đến trang hiển thị thông tin giảng viên với tham số keyword
    header("Location: index.php?pid=15&keyword=" . urlencode($keyword));
    exit();
}

// Kiểm tra nếu có tham số keyword trên URL
if (isset($_GET['keyword'])) {
    // Lấy từ khóa tìm kiếm từ URL
    $keyword = $_GET['keyword'];

    // Chuẩn bị truy vấn SQL để tìm kiếm giảng viên
    $sql = "SELECT * FROM giangvien WHERE MaGiangVien LIKE '%$keyword%' OR HoTen LIKE '%$keyword%'";

    $result = $mysqli->query($sql);

    // Đưa kết quả vào mảng
    while($row = $result->fetch_assoc()) {
        $search_results[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Tra Cứu</title>
    <style>
           .main-contain{
            width: 70%;
            margin: 20px auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 3px;
            box-shadow: 2px 2px 5px #CC0000;
            border:1px solid #ddd;
            color:black;
           
        }
        .title h2{
            color:#555555;
            border-bottom:1px solid #CC0000	;
            padding-bottom:3px;
            text-align:center;
        }
        .main{
            display:flex;
            justify-content:center;
        }
        .main th{
            background-color:#CD2626;
            font-family:arial;
            font-size:14px;
            font-weight:bold;
            color:#1C1C1C;
        }


        .main td{
            background-color:transparent;
            font-size:15px;

        }
        .main tr,td,th{
            width:auto;
            border:1px solid black;
            padding:5px;
            text-align:center;
        }
        .button{
            display:flex;
            justify-content:flex-end;
            margin-top:5px;
            
        }
        .button button{

            width:80px;
            
            border: 1px solid #CD2626;
            background-color:#CD2626;
            color:#1C1C1C;
            box-shadow:2px 2px 3px #CD2626;
            font-weight:bold;
            border-radius:20px;



            
        }
    </style>
</head>
<body>
<div class="main-contain">
<div class="title">
<h2>Kết Quả Tra Cứu</h2>
</div>
<div class="main">
<?php if (count($search_results) > 0) : ?>
    <table>
        <tr>
            <th>MaGiangVien</th>
            <th>HoTen</th>
            <th>Email</th>
            <th>SDT</th>
            <th>NgaySinh</th>
            <th>NgayVaoTruong</th>
        </tr>
        <?php foreach ($search_results as $teacher) : ?>
            <tr>
                <td><?php echo $teacher['MaGiangVien']; ?></td>
                <td><?php echo $teacher['HoTen']; ?></td>
                <td><?php echo $teacher['Email']; ?></td>
                <td><?php echo $teacher['SDT']; ?></td>
                <td><?php echo $teacher['NgaySinh']; ?></td>
                <td><?php echo $teacher['NgayVaoTruong']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <div class="button">
    <?php else : ?>
        <p>Không tìm thấy giảng viên phù hợp</p>
    <?php endif; ?>
        <button onclick="history.back();">Quay lại</button>
    </div>
    </div>
</body>
</html>

<?php
// Đóng kết nối
$mysqli->close();
?>
