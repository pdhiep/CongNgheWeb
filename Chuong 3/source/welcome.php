<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit;
}
$loggedInUser = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width,initial-scale=1">
 <title>Chào mừng</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="center-wrap">
  <h1>Chào mừng, <?php echo $loggedInUser; ?>!</h1>
  <p>Bạn đã đăng nhập thành công.</p>
  <p><a href="logout.php" class="btn">Đăng xuất</a></p>
 </div>
</body>
</html>