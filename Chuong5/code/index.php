<?php
// Tệp Controller là "não" của ứng dụng 

// TODO 6: Import tệp Model vào [cite: 108]
require_once 'models/SinhVienModel.php';

// === THIẾT LẬP KẾT NỐI PDO ===
// TODO 7: Copy code PDO từ PHT Chương 4 [cite: 111]
$host = '127.0.0.1';
$dbname = 'cse485_web';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $username, $password); // [cite: 118]
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // [cite: 119]
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage()); // [cite: 121]
}
// === KẾT THÚC KẾT NỐI PDO ===

// === LOGIC CỦA CONTROLLER ===

// TODO 8: Kiểm tra xem có hành động POST (thêm sinh viên) không [cite: 125]
if (isset($_POST['ten_sinh_vien'])) { // [cite: 126]
    
    // TODO 9: Lấy $ten và $email từ $_POST [cite: 129]
    $ten = $_POST['ten_sinh_vien'];
    $email = $_POST['email'];

    // TODO 10: Gọi hàm addSinhVien() từ Model [cite: 132]
    addSinhVien($pdo, $ten, $email); // [cite: 134]

    // TODO 11: Chuyển hướng về index.php để "làm mới" trang [cite: 135]
    header('Location: index.php'); // [cite: 136]
    exit; // [cite: 137]
}

// TODO 12: (Luôn luôn) Gọi hàm getAllSinhVien() từ Model [cite: 138]
$danh_sach_sv = getAllSinhVien($pdo); // [cite: 141]

// TODO 13: Import (include) tệp View ở cuối cùng [cite: 142]
// View sẽ tự động thấy biến $danh_sach_sv [cite: 143]
include 'views/sinhvien_view.php'; // [cite: 144]
?>