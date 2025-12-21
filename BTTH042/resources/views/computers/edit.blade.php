<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Sửa Máy Tính</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Cập Nhật Máy Tính: {{ $computer->computer_name }}</h2>

    <form action="{{ route('computers.update', $computer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên máy tính</label>
            <input type="text" name="computer_name" class="form-control" value="{{ $computer->computer_name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Model</label>
            <input type="text" name="model" class="form-control" value="{{ $computer->model }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Hệ điều hành</label>
            <input type="text" name="operating_system" class="form-control" value="{{ $computer->operating_system }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">CPU</label>
            <input type="text" name="processor" class="form-control" value="{{ $computer->processor }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">RAM (GB)</label>
            <input type="number" name="memory" class="form-control" value="{{ $computer->memory }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="available" class="form-select">
                <option value="1" {{ $computer->available == 1 ? 'selected' : '' }}>Đang hoạt động</option>
                <option value="0" {{ $computer->available == 0 ? 'selected' : '' }}>Ngừng hoạt động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('computers.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>
</html>