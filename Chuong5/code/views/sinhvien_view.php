<?php
// Tệp View CHỈ chứa HTML và logic hiển thị (echo, foreach) [cite: 66]
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 5 - MVC</title> <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Thêm Sinh Viên Mới (Kiến trúc MVC)</h2> <form method="post" action="index.php">
        <label>Tên Sinh Viên:</label>
        <input type="text" name="ten_sinh_vien" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Thêm</button>
    </form>
    <hr>

    <h2>Danh Sách Sinh Viên (Kiến trúc MVC)</h2> <table>
        <tr>
            <th>ID</th>
            <th>Tên Sinh Viên</th>
            <th>Email</th>
            <th>Ngày Tạo</th> 
        </tr>

        <?php
        // TODO 4: Dùng vòng lặp foreach để duyệt qua biến $danh_sach_sv [cite: 91]
        // Biến này được Controller truyền sang [cite: 92]
        if (isset($danh_sach_sv) && is_array($danh_sach_sv)) {
            foreach ($danh_sach_sv as $sv) {
                // TODO 5: In (echo) các dòng <tr> và <td> chứa dữ liệu $sv [cite: 94]
                echo "<tr>";
                echo "<td>" . htmlspecialchars($sv['id']) . "</td>"; // [cite: 100]
                echo "<td>" . htmlspecialchars($sv['ten_sinh_vien']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['email']) . "</td>";
                echo "<td>" . htmlspecialchars($sv['ngay_tao']) . "</td>";
                // Kiểm tra key ngày tạo trong DB của bạn (ví dụ: created_at hoặc ngay_tao)
                echo "<td>" . (isset($sv['created_at']) ? htmlspecialchars($sv['created_at']) : '') . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>