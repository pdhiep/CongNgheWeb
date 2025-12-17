<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Người Dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Danh Sách Người Dùng</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Thêm người dùng mới</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Mã người dùng</th>
                <th>Tên tài khoản</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="badge {{ $user->role == 'admin' ? 'bg-danger' : 'bg-info' }}">
                        {{ $user->role }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;" 
                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản {{ $user->username }} không?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>
</body>
</html>