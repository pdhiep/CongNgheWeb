<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Máy Tính</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Danh Sách Máy Tính</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('computers.create') }}" class="btn btn-primary mb-3">Thêm máy tính mới</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Mã máy (ID)</th>
                    <th>Tên máy tính</th>
                    <th>Tên phiên bản (Model)</th>
                    <th>Hệ điều hành</th>
                    <th>Bộ xử lý (CPU)</th>
                    <th>Bộ nhớ (RAM)</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($computers as $computer)
                <tr>
                    <td>{{ $computer->id }}</td>
                    <td>{{ $computer->computer_name }}</td>
                    <td>{{ $computer->model }}</td>
                    <td>{{ $computer->operating_system }}</td>
                    <td>{{ $computer->processor }}</td>
                    <td>{{ $computer->memory }} GB</td>
                    <td>
                        @if($computer->available)
                            <span class="badge bg-success">Đang hoạt động</span>
                        @else
                            <span class="badge bg-danger">Ngừng hoạt động</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('computers.edit', $computer->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        
                        <form action="{{ route('computers.destroy', $computer->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa máy tính này không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $computers->links('pagination::bootstrap-5') }}
    </div>
</div>
</body>
</html>