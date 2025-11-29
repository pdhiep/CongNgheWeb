<?php
$file = 'data.csv';
$accounts = [];
if (($handle = fopen($file, "r")) !== FALSE) {
    $header = fgetcsv($handle);
    
    while (($row = fgetcsv($handle)) !== FALSE) {
        $fullName = trim($row[2] . ' ' . $row[3]);
        $accounts[] = [
            'username' => $row[0],
            'password' => $row[1],
            'fullname' => $fullName,
            'city'     => $row[4],
            'email'    => $row[5],
            'course'   => $row[6]
        ];
    }
    fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Tài Khoản</title>
    <style>
        table{border-collapse:collapse;width:100%;}
        th,td{border:1px solid #333;padding:10px;text-align:left;}
        th{background:#3498db;color:white;}
    </style>
</head>
<body>
    <h1>Danh Sách Tài Khoản Người Dùng</h1>
    <table>
        <tr>
            <th>STT</th>
            <th>Username</th>
            <th>Password</th>
            <th>Họ tên</th>
            <th>Lớp chuyên ngành</th>
            <th>Email</th>
            <th>Course</th>
        </tr>
        <?php foreach($accounts as $i => $acc): ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><?= htmlspecialchars($acc['username']) ?></td>
            <td><?= htmlspecialchars($acc['password']) ?></td>
            <td><?= htmlspecialchars($acc['fullname']) ?></td>
            <td><?= htmlspecialchars($acc['city']) ?></td>
            <td><?= htmlspecialchars($acc['email']) ?></td>
            <td><?= htmlspecialchars($acc['course']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>