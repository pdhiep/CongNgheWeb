<?php
// Mảng flowers - đúng tên file ảnh bạn đang có
$flowers = [
    ["name" => "Cẩm Tú Cầu",        "image" => "camTuCau.webp",       "desc" => "Loài hoa mang vẻ đẹp kiêu sa với những chùm hoa tròn đầy, màu sắc chuyển dần từ xanh sang hồng tím rất độc đáo."],
    ["name" => "Cúc Lá Nho",        "image" => "cucLaNho.webp",       "desc" => "Hoa nhỏ li ti nhưng nở thành từng chùm lớn, cánh hoa mỏng manh như lụa, rất được yêu thích vào mùa xuân hè."],
    ["name" => "Cẩm Chướng",        "image" => "hoaCamChuong.webp",   "desc" => "Hoa cẩm chướng tượng trưng cho tình yêu nồng nàn, cánh hoa xếp lớp đẹp mắt, hương thơm quyến rũ."],
    ["name" => "Cúc Đại Đó Bằng",   "image" => "hoaCucDai.webp",      "desc" => "Bông to, cánh dày, màu sắc rực rỡ, rất bền, thường được dùng làm hoa chậu trang trí sân vườn."],
    ["name" => "Dạ Yên Thảo",       "image" => "hoaDaYenThao.webp",   "desc" => "Hoa nở liên tục từ xuân đến thu, màu sắc đa dạng, dễ trồng và chăm sóc."],
    ["name" => "Denlong",           "image" => "hoaDenLong.webp",     "desc" => "Hoa hình chuông lồng đèn rất độc lạ, màu cam đỏ nổi bật, thu hút ong bướm."],
    ["name" => "Dừa Cảnh",          "image" => "hoaDuaCan.webp",      "desc" => "Không chỉ là cây cảnh mà còn cho hoa đẹp, dễ trồng trong chậu, chịu nắng tốt."],
    ["name" => "Giấy",              "image" => "hoaGiay.webp",        "desc" => "Hoa giấy – biểu tượng của mùa hè miền Nam, nở rực rỡ, ít sâu bệnh, dễ chăm."],
    ["name" => "Huỳnh Anh",         "image" => "hoaHuynhAnh.webp",    "desc" => "Hoa chùm rủ mềm mại, màu vàng tươi, leo giàn rất đẹp, nở quanh năm."],
    ["name" => "Păng Xê",           "image" => "hoaPangXe.webp",      "desc" => "Hoa mặt mèo dễ thương, màu sắc đa dạng, chịu lạnh tốt, nở rộ vào xuân hè."],
    ["name" => "Sen",               "image" => "hoaSen.webp",         "desc" => "Quốc hoa Việt Nam, thanh khiết, thơm ngát, trồng được cả trong chậu lớn."],
    ["name" => "Sứ Quản Tú",        "image" => "hoaSuQuanTu.webp",    "desc" => "Hoa sứ thái màu sắc rực rỡ, cánh dày, thơm nhẹ, cây cảnh phổ biến."],
    ["name" => "Thanh Tú",          "image" => "hoaThanhTu.webp",     "desc" => "Hoa nhỏ màu xanh tím, nở thành từng cụm lớn, rất lâu tàn, dễ trồng."],
    ["name" => "Đồng Tiền",          "image" => "hoaDongTien.webp",     "desc" => "Là một trong những loài hoa rất được yêu thích vào mỗi dịp Tết đến xuân về.."],
];

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>14 Loài Hoa Tuyệt Đẹp Mùa Xuân Hè</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f9f4; margin: 0; padding: 20px; }
        h1 { text-align: center; color: #2c3e50; margin: 30px 0; }
        .flower { background: white; margin: 40px auto; max-width: 800px; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .flower h2 { color: #27ae60; border-bottom: 3px solid #27ae60; padding-bottom: 10px; }
        .flower img { width: 100%; height: auto; border-radius: 10px; margin: 15px 0; }
        .flower p { line-height: 1.8; color: #444; }
        .admin-link { text-align: center; margin: 50px; }
        .admin-link a { color: #e74c3c; font-size: 20px; font-weight: bold; text-decoration: none; }
        .admin-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>14 Loài Hoa Tuyệt Đẹp Thích Hợp Trồng Mùa Xuân Hè</h1>

    <?php foreach ($flowers as $f): ?>
    <div class="flower">
        <h2><?= htmlspecialchars($f['name']) ?></h2>
        <img src="images/<?= $f['image'] ?>" alt="<?= htmlspecialchars($f['name']) ?>">
        <p><?= nl2br(htmlspecialchars($f['desc'])) ?></p>
    </div>
    <?php endforeach; ?>

    <div class="admin-link">
        <a href="admin.php">Quản trị viên</a>
    </div>
</body>
</html>