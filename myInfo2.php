<?php
    session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./assets/img/favicon.ico" />
    <link rel="stylesheet" href="./assets/css/reset.css" />
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;900&display=swap"
      rel="stylesheet"
    />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Profile</title>
</head>
<body>
<header>
      <!-- ====================  THẺ CHA   ====================== -->
      <nav class="navbar">
        <!-- //////////////////////////////////////////logo ///////////////////////////////////-->
        <div class="logo">
          <a href="./index3.php"
            ><img
              src="https://hungphamsdss.my.canva.site/videos/043704edd8d6fdfdeeb072eb51c20de6.gif"
              width="220px"
              height="77px"
              alt="logo"
          /></a>
          <a href="./index3.php"
            ><img
              src="https://hungphamsdss.my.canva.site/images/7bb1b4bce95ae757913178be78838fbf.png"
              width="101"
              height="78"
              alt="Apple"
          /></a>
        </div>

        <!--///////////////////////////////////////////// navigation////////////////////////////////////// -->
        <div class="navigation">
          <ul class="menu">
            <li><a href="./index9.php">Điểm số</a></li>
            <li>
              <a href="#!">Thông tin lớp học</a>
              <ul class="sub-menu">
                <li>
                  <a href="./index10.html" target="_blank" rel="noopener"
                    >Thông tin Giáo viên</a
                  >
                </li>
                <li><a href="./index7.html">Lịch học</a></li>
              </ul>
            </li>
            <a href="./index11.html">Tài liệu cơ bản</a>
            <!-- <li>
              <a href="#!">Khóa Học</a>
              <ul class="sub-menu">
                <li><a href="#!">Lớp Kindy</a></li>
                <li><a href="#!">Lớp Super Junior</a></li>
              </ul>
            </li> -->
          </ul>
        </div>

        <!--/////////////////////////////////////// action //////////////////////////////////////////////////-->
        <div class="action">
          <a style="text-decoration: none" href="./myInfo.php">Hồ sơ của tôi</a><i class='bx bx-user-circle'></i>
        </div>
        
      </nav>
    
   
        <div class="user-info-container">
           <?php
          include('config.php');
          $username = ''; // Define the username variable

          if (isset($_SESSION['user_id'])) {
              try {
                  $query = "SELECT * FROM users WHERE id = :user_id";
                  $stmt = $connection->prepare($query);
                  $stmt->bindParam(':user_id', $_SESSION['user_id']);
                  $stmt->execute();

                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo "Tên người dùng: " . $row['name'] . "<br>";
                      echo "Email: " . $row['email'] . "<br>";
                      // ... (display other information)
                  }
              } catch (PDOException $e) {
                  exit("Error: " . $e->getMessage());
              }
          } else {
              echo "Người dùng chưa đăng nhập.";
          }
          ?>
        </div>
      
</body>
</html>