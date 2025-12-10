@extends('layouts.app')
@section('title', 'Danh sách thuốc')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Danh Sách Thuốc</h2>
    <a href="{{ route('medicines.create') }}" class="btn btn-success">
        Thêm Thuốc Mới
    </a>
</div>

<form class="mb-4">
    <div class="input-group" style="max-width: 400px;">
        <input type="text" name="search" class="form-control" placeholder="Tìm tên hoặc hãng..." value="{{ request('search') }}">
        <button class="btn btn-primary">Tìm</button>
    </div>
</form>

<div class="card shadow">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Tên thuốc</th>
                        <th>Hãng</th>
                        <th>Hàm lượng</th>
                        <th>Dạng</th>
                        <th>Giá</th>
                        <th>Tồn kho</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicines as $m)
                    <tr>
                        <td>{{ $m->medicine_id }}</td>
                        <td><strong>{{ $m->name }}</strong></td>
                        <td>{{ $m->brand }}</td>
                        <td>{{ $m->dosage }}</td>
                        <td>{{ $m->form }}</td>
                        <td>{{ number_format($m->price) }}₫</td>
                        <td>
                            @if($m->stock > 50)
                                <span class="badge bg-success">{{ $m->stock }}</span>
                            @elseif($m->stock > 10)
                                <span class="badge bg-warning">{{ $m->stock }}</span>
                            @else
                                <span class="badge bg-danger">{{ $m->stock }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('medicines.show', $m) }}" class="btn btn-sm btn-info">Xem</a>
                            <a href="{{ route('medicines.edit', $m) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form method="POST" action="{{ route('medicines.destroy', $m) }}" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Xóa thuốc này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center py-4">Không có thuốc nào.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white">
        {{ $medicines->appends(request()->query())->links() }}
    </div>
</div>
@endsection