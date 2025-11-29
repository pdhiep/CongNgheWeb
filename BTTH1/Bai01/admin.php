<?php
session_start();
if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = [
        ["id"=>1,  "name"=>"Cẩm Tú Cầu",      "desc"=>"Loài hoa mang vẻ đẹp kiêu sa...", "image"=>"camTuCau.webp"],
        ["id"=>2,  "name"=>"Cúc Lá Nho",      "desc"=>"Hoa nhỏ li ti nhưng nở thành từng chùm lớn...", "image"=>"cucLaNho.webp"],
        ["id"=>3,  "name"=>"Cẩm Chướng",      "desc"=>"Hoa cẩm chướng tượng trưng cho tình yêu...", "image"=>"hoaCamChuong.webp"],
        ["id"=>4,  "name"=>"Cúc Đại Đó Bằng", "desc"=>"Bông to, cánh dày, màu sắc rực rỡ...", "image"=>"hoaCucDai.webp"],
        ["id"=>5,  "name"=>"Dạ Yên Thảo",     "desc"=>"Hoa nở liên tục từ xuân đến thu...", "image"=>"hoaDaYenThao.webp"],
        ["id"=>6,  "name"=>"Denlong",         "desc"=>"Hoa hình chuông lồng đèn rất độc lạ...", "image"=>"hoaDenLong.webp"],
        ["id"=>7,  "name"=>"Dừa Cảnh",        "desc"=>"Không chỉ là cây cảnh mà còn cho hoa đẹp...", "image"=>"hoaDuaCan.webp"],
        ["id"=>8,  "name"=>"Giấy",            "desc"=>"Hoa giấy – biểu tượng của mùa hè miền Nam...", "image"=>"hoaGiay.webp"],
        ["id"=>9,  "name"=>"Đồng Tiền",       "desc" => "Là một trong những loài hoa rất được yêu thích vào mỗi dịp Tết đến xuân về.."],
        ["id"=>10, "name"=>"Huỳnh Anh",       "desc"=>"Hoa chùm rủ mềm mại, màu vàng tươi...", "image"=>"hoaHuynhAnh.webp"],
        ["id"=>11, "name"=>"Păng Xê",         "desc"=>"Hoa mặt mèo dễ thương...", "image"=>"hoaPangXe.webp"],
        ["id"=>12, "name"=>"Sen",             "desc"=>"Quốc hoa Việt Nam, thanh khiết...", "image"=>"hoaSen.webp"],
        ["id"=>13, "name"=>"Sứ Quản Tú",      "desc"=>"Hoa sứ thái màu sắc rực rỡ...", "image"=>"hoaSuQuanTu.webp"],
        ["id"=>14, "name"=>"Thanh Tú",        "desc"=>"Hoa nhỏ màu xanh tím, nở thành từng cụm lớn...", "image"=>"hoaThanhTu.webp"],
    ];
}

$flowers = &$_SESSION['flowers'];
if (isset($_POST['add'])) {
    $newId = count($flowers) + 1;
    $imageName = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/images/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $tmpName = $_FILES['image']['tmp_name'];
        $origName = basename($_FILES['image']['name']);
        $ext = pathinfo($origName, PATHINFO_EXTENSION);
        $imageName = 'img_' . time() . '_' . mt_rand(1000,9999) . ($ext ? '.' . $ext : '');
        move_uploaded_file($tmpName, $uploadDir . $imageName);
    } else {
        // Fallback: allow entering a filename manually (must exist in images/)
        $imageName = isset($_POST['image_fallback']) ? trim($_POST['image_fallback']) : '';
    }

    $flowers[] = [
        "id" => $newId,
        "name" => $_POST['name'],
        "desc" => $_POST['desc'],
        "image" => $imageName
    ];
}

if (isset($_GET['del'])) {
    $id = (int)$_GET['del'];
    foreach ($flowers as $k => $v) {
        if ($v['id'] == $id) {
            unset($flowers[$k]);
            break;
        }
    }
    $flowers = array_values($flowers);
    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin - Quản lý 14 loài hoa</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f8f9fa; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #2c3e50; color: white; }
        img { width: 80px; height: auto; border-radius: 5px; }
        .add-form { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin: 20px 0; }
        input, textarea { width: 100%; padding: 8px; margin: 5px 0; }
        button { background: #27ae60; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        button:hover { background: #219653; }
        a { color: #e74c3c; }
    </style>
</head>
<body>
    <h1>Quản Trị Danh Sách Hoa (CRUD)</h1>

    <div class="add-form">
        <h3>Thêm hoa mới</h3>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Tên hoa" required>
            <textarea name="desc" placeholder="Mô tả ngắn về loài hoa" required></textarea>
            <label>Chọn ảnh (upload):</label>
            <input type="file" name="image" accept="image/*">
            <small>Nếu không upload, bạn có thể nhập tên file đã có trong thư mục <code>images/</code> bên dưới.</small>
            <input type="text" name="image_fallback" placeholder="Tên file ảnh (ví dụ: hoaMoi.webp)">
            <button type="submit" name="add">Thêm hoa</button>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên hoa</th>
            <th>Ảnh</th>
            <th>Mô tả (tóm tắt)</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($flowers as $f): ?>
        <tr>
            <td><?= $f['id'] ?></td>
            <td><?= htmlspecialchars($f['name']) ?></td>
            <td><img src="images/<?= htmlspecialchars($f['image']) ?>" alt=""></td>
            <td><?= htmlspecialchars(substr($f['desc'], 0, 80)) ?>...</td>
            <td>
                <a href="admin.php?del=<?= $f['id'] ?>" 
                   onclick="return confirm('Xóa hoa <?= htmlspecialchars($f['name']) ?>?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="index.php">← Về trang khách</a></p>
</body>
</html>