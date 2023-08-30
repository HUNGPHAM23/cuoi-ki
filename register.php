<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv= "X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/css/reset.css" />
  <link rel="stylesheet" href="./assets/css/register.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <title>Trang Đăng kí</title>
</head>
<body>
  <div class="container">
    <form method="post" action="" name="signup-form">
      <h2>Đăng kí </h2>
      <div class="form-element">
      <i class="far fa-user"></i>
        <input type="text" name="username" placeholder="Tên đăng nhập"pattern="[a-zA-Z0-9]+" required />
      </div>
      <div class="form-element">
      <i class="far fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required />
      </div>
      <div class="form-element">
      <i class="fas fa-key"></i>
        <input type="password" name="password" placeholder=" Mật khẩu " required />
        <div id="eye">
        </div>
      </div>
      <div class="form-element">
        <label for="class">Chọn lớp:</label>
        <select name="class" id="class">
          <option value="">--Chọn lớp--</option>
          <option value="Kindy">Lớp Kindy</option>
          <option value="Super Junior">Lớp Super Junior</option>
        </select>
      </div>
      <div class="form-element">
        <button type="submit" class="green-button" name="register" value="register">Register</button>
      </div>
      <div class="form-element">
        <p>Đã có tài khoản?</p><button type="button" class="white-button" onclick="window.location.href='login.php'">Log In</button></p>
      </div>
    </form>
  </div>
<?php
session_start();
include('config.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $selectedClass = $_POST['class']; // Lớp người dùng chọn

    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
    } elseif ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users (name, password, email, class) VALUES (:username, :password_hash, :email, :selectedClass)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("selectedClass", $selectedClass, PDO::PARAM_STR);
        $result = $query->execute();

        if ($result) {
            echo '<p class="success">Your registration was successful!</p>';
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
}
?>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
 <script src="login.js"></script>
</html>