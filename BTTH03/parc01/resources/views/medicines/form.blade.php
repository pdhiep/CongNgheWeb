<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Tên thuốc *</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $medicine->name ?? '') }}" required>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Hãng sản xuất *</label>
        <input type="text" name="brand" class="form-control" value="{{ old('brand', $medicine->brand ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Hàm lượng *</label>
        <input type="text" name="dosage" class="form-control" value="{{ old('dosage', $medicine->dosage ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Dạng bào chế *</label>
        <input type="text" name="form" class="form-control" value="{{ old('form', $medicine->form ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Giá bán *</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', $medicine->price ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Tồn kho *</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $medicine->stock ?? '') }}" required>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary px-4">Lưu lại</button>
        <a href="{{ route('medicines.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
</div>