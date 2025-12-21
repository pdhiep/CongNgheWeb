<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Thêm Máy Tính</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Thêm Máy Tính Mới</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('computers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên máy tính</label>
            <input type="text" name="computer_name" class="form-control" placeholder="VD: Lab1-PC05" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tên phiên bản (Model)</label>
            <input type="text" name="model" class="form-control" placeholder="VD: Dell Optiplex 7090" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Hệ điều hành</label>
            <input type="text" name="operating_system" class="form-control" value="Windows 10 Pro" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Bộ vi xử lý (CPU)</label>
            <input type="text" name="processor" class="form-control" placeholder="VD: Intel Core i5-11400" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Bộ nhớ RAM (GB)</label>
            <input type="number" name="memory" class="form-control" placeholder="8" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="available" class="form-select">
                <option value="1">Đang hoạt động</option>
                <option value="0">Ngừng hoạt động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Lưu lại</button>
        <a href="{{ route('computers.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>
</html>