<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8" />
  <meta http-equiv= "X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/css/reset.css" />
  <link rel="stylesheet" href="./assets/css/login.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <title>Trang Đăng nhập</title>
</head>
<body>
<?php
session_start();
include('config.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE name=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            $selectedClass = $result['class'];

            if ($selectedClass == 'Kindy') {
                // Chuyển hướng đến index2.php nếu lớp là Kindy
                header("Location: index2.php");
                exit();
            } elseif ($selectedClass == 'Super Junior') {
                // Chuyển hướng đến index3.php nếu lớp là Super Junior
                header("Location: index3.php");
                exit();
            } else {
                echo '<p class="error">Invalid class selection!</p>';
            }
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}
?>
<div class="container"> 
  <form method="post" action="" name="form-login">
    <h2>Đăng nhập</h2>
      <div class="form-element">
        <i class="far fa-user"></i>
        <input type="text" name="username" class="input" placeholder="Nhập Tên đăng nhập" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
      </div>
      <div class="form-element">
        <i class="fas fa-key"></i>
       <input type="password" name="password" class="input" placeholder="Mật khẩu" required />

        <div id="eye">
        </div>
      </div>
      <div class="form-element">
        <button type="submit" class="green-button" name="login" value="login">Log In</button>
      </div>
      <div class="form-element">
        <p>Don't have an account? </p> <button type="button" class="white-button" onclick="window.location.href='register.php'">Register here</a>
      </div>
  </form> 
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="login.js"></script>
</html>
