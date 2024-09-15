<?php
session_start();
include("../config.php");


if(isset($_SESSION['admin_id'])) {
  header("Location: trangquantri.php");
  exit(); 
}

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];



  $sql = "SELECT * FROM admin WHERE (name = '$username' OR email = '$username') AND password = '$password'";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['admin_id'] = $row['admin_id'];
    $message = "Đăng nhập thành công!";
    echo "<script>
            window.location.href='trangquantri.php';
            alert('$message');
          </script>";
    exit();
  } else {
    $message = "Đăng nhập không thành công, hãy thử lại!";
        echo "<script>
                alert('$message');
              </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        #login {
            margin: auto;
            max-width: 500px;
            margin-top: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px #CC0000;
            padding-top: 10px;
            padding-bottom: 20px;
            color: black;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        label {
            margin-left:5%;
            display: block;
            margin-bottom: 5px;
            margin-top:5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            margin-left:5%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 90%;
            margin-left:5%;
            padding: 10px;
            background-color: #660000;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            display: block;
        }

        input[type="submit"]:hover {
            background-color: #990000;
        }

        p.error-message {
            text-align: center;
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div id="login">
        <h2>Admin Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username or Email:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
<input type="submit" value="Login">
        </form>
        <?php
        if(isset($error)) {
            echo "<p class='error-message'>$error</p>";
        }
        ?>
    </div>
</body>
</html>