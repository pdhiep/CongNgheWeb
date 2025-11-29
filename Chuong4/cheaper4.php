<?php
$host = '127.0.0.1';
$dbname = 'cse485_web';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

if (isset($_POST['ten_sinh_vien']) && isset($_POST['email'])) {
    $ten   = trim($_POST['ten_sinh_vien']);
    $email = trim($_POST['email']);

    if ($ten !== '' && $email !== '') {
        $sql = "INSERT INTO sinhvien (ten_sinh_vien, email) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$ten, $email]);

        header('Location: cheaper4.php?success=1');
        exit;
    }
}
    $sql_select = "SELECT * FROM sinhvien ORDER BY id ASC";
    $stmt_select = $pdo->query($sql_select);
    $rows = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chương 4 - CSE485</title>
    <style>
        body {font-family: Arial; margin: 40px; background: #f7f7f7;}
        table, th, td {border: 1px solid #ccc; padding: 10px; border-collapse: collapse;}
        th {background: #333; color: white;}
        input, button {padding: 8px 12px; margin: 5px;}
        button {background: #0066cc; color: white; border: none; cursor: pointer;}
        .success {color: green; font-weight: bold;}
    </style>
</head>
<body>

    <?php if (isset($_GET['success'])) echo '<p class="success">✓ Thêm sinh viên thành công!</p>'; ?>

    <h2>Thêm sinh viên mới</h2>
    <form action="" method="POST">
        Tên: <input type="text" name="ten_sinh_vien" required>
        Email: <input type="email" name="email" required>
        <button type="submit">Thêm ngay</button>
    </form>

    <h2>Danh sách sinh viên</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên sinh viên</th>
            <th>Email</th>
            <th>Ngày tạo</th>
        </tr>
        <?php if (count($rows) > 0): ?>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['ten_sinh_vien']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['ngay_tao']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <?php if (count($rows) == 0): ?>
        <p><i>Chưa có dữ liệu. Thêm sinh viên đầu tiên đi nào!</i></p>
    <?php endif; ?>

</body>
</html>