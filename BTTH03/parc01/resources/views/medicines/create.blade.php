@extends('layouts.app')
@section('title', 'Thêm thuốc mới')

@section('content')
<h2>Thêm Thuốc Mới</h2>
<form action="{{ route('medicines.store') }}" method="POST">
    @csrf
    @include('medicines.form')
</form>
@endsection