<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    // 1. Hiển thị danh sách
    public function index()
    {
        $computers = Computer::paginate(10);
        return view('computers.index', compact('computers'));
    }

    // 2. Form Thêm mới
    public function create()
    {
        return view('computers.create');
    }

    // 3. Xử lý Lưu dữ liệu mới
    public function store(Request $request)
    {
        $request->validate([
            'computer_name' => 'required|max:50',
            'model' => 'required|max:100',
            'operating_system' => 'required|max:50',
            'processor' => 'required|max:50',
            'memory' => 'required|integer',
            'available' => 'required|boolean',
        ]);

        Computer::create($request->all());

        return redirect()->route('computers.index')->with('success', 'Thêm máy tính thành công!');
    }

    // 4. Form Sửa
    public function edit($id)
    {
        $computer = Computer::findOrFail($id);
        return view('computers.edit', compact('computer'));
    }

    // 5. Xử lý Cập nhật
    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_name' => 'required|max:50',
            'model' => 'required|max:100',
            'operating_system' => 'required|max:50',
            'processor' => 'required|max:50',
            'memory' => 'required|integer',
            'available' => 'required|boolean',
        ]);

        $computer = Computer::findOrFail($id);
        $computer->update($request->all());

        return redirect()->route('computers.index')->with('success', 'Cập nhật thông tin thành công!');
    }

    // 6. Xóa
    public function destroy($id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();
        return redirect()->route('computers.index')->with('success', 'Đã xóa máy tính!');
    }
}