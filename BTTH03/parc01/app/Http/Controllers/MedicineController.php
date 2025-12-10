<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $medicines = Medicine::when($search, function($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('brand', 'like', "%$search%");
            })
            ->paginate(10);

        return view('medicines.index', compact('medicines', 'search'));
    }

    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'brand'   => 'required|string|max:100',
            'dosage'  => 'required|string|max:50',
            'form'    => 'required|string|max:50',
            'price'   => 'required|numeric|min:0',
            'stock'   => 'required|integer|min:0',
        ]);

        Medicine::create($request->all());

        return redirect()->route('medicines.index')
                         ->with('success', 'Thuốc đã được thêm thành công!');
    }

    public function show(Medicine $medicine)
    {
        return view('medicines.show', compact('medicine'));
    }

    public function edit(Medicine $medicine)
    {
        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'brand'   => 'required|string|max:100',
            'dosage'  => 'required|string|max:50',
            'form'    => 'required|string|max:50',
            'price'   => 'required|numeric|min:0',
            'stock'   => 'required|integer|min:0',
        ]);

        $medicine->update($request->all());

        return redirect()->route('medicines.index')
                         ->with('success', 'Cập nhật thuốc thành công!');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicines.index')
                         ->with('success', 'Xóa thuốc thành công!');
    }
}