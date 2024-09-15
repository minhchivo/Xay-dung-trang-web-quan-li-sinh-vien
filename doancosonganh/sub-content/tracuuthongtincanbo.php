<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra Cứu Thông Tin Giảng Viên</title>
    <style>
        .main-contain{
            width: 45%;
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
            display:inline-block;
            text-align:center;
        }
        input{
            width:77%;
            height:30px;
            font-size:15px;
        }
        button{
            width:15%;
            height:30px;
            border:0;
            box-shadow:0px 3px 3px #990000;
            background-color:#880000		;
            font-weight:bold;
            color:white;
        }
        
    </style>
</head>
<body>
<div class="main-contain">
<div class="title">
<h2>Tra Cứu Thông Tin Giảng Viên</h2>
</div>
<div class="from">
<form method="post" action="index.php?pid=15">
    <input type="text" name="keyword" placeholder="Nhập mã giảng viên hoặc tên giảng viên">
    <button type="submit">Tìm kiếm</button>
</form>
</div>
</div>
</body>
</html>
