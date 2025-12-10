@extends('layouts.app')
@section('title', $medicine->name)

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>{{ $medicine->name }}</h4>
    </div>
    <div class="card-body">
        <p><strong>Hãng:</strong> {{ $medicine->brand }}</p>
        <p><strong>Hàm lượng:</strong> {{ $medicine->dosage }}</p>
        <p><strong>Dạng:</strong> {{ $medicine->form }}</p>
        <p><strong>Giá:</strong> {{ number_format($medicine->price) }}₫</p>
        <p><strong>Tồn kho:</strong> 
            <span class="badge {{ $medicine->stock > 50 ? 'bg-success' : 'bg-warning' }}">
                {{ $medicine->stock }}
            </span>
        </p>
        <hr>
        <a href="{{ route('medicines.index') }}" class="btn btn-secondary">Quay lại</a>
        <a href="{{ route('medicines.edit', $medicine) }}" class="btn btn-warning">Sửa</a>
    </div>
</div>
@endsection