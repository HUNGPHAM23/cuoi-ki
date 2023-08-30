<!DOCTYPE html>
<html lang="en">
  <head>
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
    <title>Apple English Center</title>
  </head>
  <body>
    <header>
      <!-- ====================  THẺ CHA   ====================== -->
      <nav class="navbar">
        <!-- //////////////////////////////////////////logo ///////////////////////////////////-->
        <div class="logo">
          <a href="./index2.php"
            ><img
              src="https://hungphamsdss.my.canva.site/videos/043704edd8d6fdfdeeb072eb51c20de6.gif"
              width="220px"
              height="77px"
              alt="logo"
          /></a>
          <a href="./index2.php"
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
            <li><a href="./index4.php">Điểm số</a></li>
            <li>
              <a href="#!">Thông tin lớp học</a>
              <ul class="sub-menu">
                <li>
                  <a href="./index5.html" target="_blank" rel="noopener"
                    >Thông tin Giáo viên</a
                  >
                </li>
                <li><a href="./index6.html">Lịch học</a></li>
              </ul>
            </li>
            <a href="./index7.html">Tài liệu cơ bản</a>
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
            <a style="text-decoration: none" href="#">Hồ sơ của tôi</a><i class='bx bx-user-circle'></i>
        </div>
      </nav>
      <div class="action">
            <a href="./myInfo.php">Hồ sơ của tôi</a><i class='bx bx-user-circle'></i>
        </div>
      </nav>

      <!-- =============================  slide =================== -->



  <title>Student Score</title>
  <h2>'</h2><h3>'</h3><h4>'</h4><h5>'</h5>
<body>
  
  <div class="slide" style= "display: flex;justify-content:center; align-item:center;margin-top:30px">
    <label for="id">Enter Student ID:</label>
    <input type="text" id="id" name="id">
    <button onclick="displayScore()">View</button>
  </div>
  </div>
  <div id="score-display"></div>

<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dangki";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


  <script>
    function displayScore() {
      // Get the student ID from the input field
      var studentId = document.getElementById("id").value;
      
      // Send a request to the server to get the score for the student with the given ID
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Display the response from the server in the "score-display" element
          var scoreDisplay = document.getElementById("score-display");
          scoreDisplay.innerHTML = this.responseText;
        }
      };
      xhr.open("GET", "get_score.php?id=" + studentId, true);
      xhr.send();
    }
  </script>
</body>
</html>

      
      
      <!-- =============================  slide =================== -->

      <!--Contact  -->
      <div class="chung" style ="display:flex ">
      <div class="contact" style= "margin:450px 200px 0 100PX">
        <h3>Thông Tin Liên Hệ</h3>
        <ul>
          <li>
            <a href="tel:0938.554.269">Điện thoại: 0938.554.269 - Mr. Nick</a>
          </li>
          <li>
            <a href="mailto:appleenglish@gmail.com"
              >Email: appleenglish@gmail.com</a
            >
          </li>
          <li>
            <a href="#!"
              >Địa chỉ: 001 CT2 Sky, 61-63 đường số 1, P.Hữu Phú, TP. Thủ Đức</a
            >
          </li>
        </ul>
      </div>
      <!-- ======================= -->
      <div class="footer-img" style=" margin-top : 400px;margin-left: auto;margin-right:100px ">
        <img
          src="./assets/img/deb5965995a680e10a5337f71b1ee29d.png"
          width="272px"
          height="188px"
          alt="anh footer"
        />
      </div>
      </div>
    </footer>
  </body>
</html>
