@extends('layouts.app')
@section('title', 'Sửa thuốc')

@section('content')
<h2>Sửa Thuốc #{{ $medicine->medicine_id }}</h2>
<form action="{{ route('medicines.update', $medicine) }}" method="POST">
    @csrf @method('PUT')
    @include('medicines.form')
</form>
@endsection