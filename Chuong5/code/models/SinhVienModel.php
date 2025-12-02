<?php
// Tệp Model sẽ chứa tất cả logic truy vấn CSDL 

// TODO 1: Viết 1 hàm tên là getAllSinhVien() [cite: 45]
function getAllSinhVien($pdo) {
    // Thực thi câu lệnh SELECT * FROM sinhvien [cite: 47]
    $sql = "SELECT * FROM sinhvien";
    $stmt = $pdo->query($sql);
    // Hàm trả về kết quả (dùng fetchAll) [cite: 48]
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// TODO 2: Viết 1 hàm tên là addSinhVien() [cite: 55]
function addSinhVien($pdo, $ten, $email) {
    // Thực thi câu lệnh INSERT (dùng Prepared Statement) [cite: 57]
    $sql = "INSERT INTO sinhvien (ten_sinh_vien, email) VALUES (?, ?)"; // [cite: 59]
    $stmt = $pdo->prepare($sql); // [cite: 60]
    $stmt->execute([$ten, $email]); // [cite: 61]
}
?>