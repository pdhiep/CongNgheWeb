<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHP Chương 2 - PHP Căn bản</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f9; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 600px; margin: auto; }
        h1 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        .result { margin-top: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 5px; background-color: #e9ecef; }
        .grade-good { color: green; font-weight: bold; }
        .grade-fail { color: red; font-weight: bold; }
        pre { background-color: #f8f9fa; padding: 10px; border-radius: 4px; overflow-x: auto; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kết quả PHP Căn Bản</h1>
        <div class="result">
            <?php
        
            $ho_ten = "Phạm Đức Hiệp";
            $ma_so_sv = "2251161997";
            $diem_tb = 7.8;
            $co_di_hoc_chuyen_can = true;

            echo "<h2>Thông tin Sinh viên:</h2>";
            echo "<p><strong>Họ tên:</strong> $ho_ten</p>";
            echo "<p><strong>Mã số SV:</strong> $ma_so_sv</p>";
            echo "<p><strong>Điểm Trung bình:</strong> $diem_tb</p>";
            echo "<p><strong>Chuyên cần:</strong> " . ($co_di_hoc_chuyen_can ? "Đạt" : "Không đạt") . "</p>";

            echo "<h2>Xếp loại Học tập:</h2>";
         
            if ($diem_tb >= 8.5 && $co_di_hoc_chuyen_can) {
                echo "<p><span class='grade-good'>Xếp loại: Giỏi</span></p>";
            } elseif ($diem_tb >= 6.5 && $co_di_hoc_chuyen_can) {
                echo "<p>Xếp loại: Khá</p>";
            } elseif ($diem_tb >= 5.0 && $co_di_hoc_chuyen_can) {
                echo "<p>Xếp loại: Trung bình</p>";
            } else {
                echo "<p><span class='grade-fail'>Xếp loại: Yếu (Cần cố gắng thêm!)</span></p>";
            }
            function chaoMung() {
                echo "<p><strong>------------------------------</strong></p>";
                echo "Chúc mừng bạn đã hoàn thành PHT Chương 2!";
            }
            echo "<h2>Thông điệp:</h2>";
            for ($i = 1; $i <= 5; $i++) {
                echo "Lần $i: Cố gắng học tập để đạt kết quả tốt hơn nữa! <br>";
            }
            echo "<p><br></p>";
            chaoMung();
            ?>
        </div>
    </div>
</body>
</html>