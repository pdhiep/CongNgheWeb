<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 1. HIỂN THỊ DANH SÁCH (10 bản ghi/trang)
    public function index()
    {
        // Phân trang 10 dòng
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    // 2. GIAO DIỆN THÊM MỚI
    public function create()
    {
        return view('users.create');
    }

    // 3. XỬ LÝ LƯU DỮ LIỆU
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        // Tạo user mới
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Thêm người dùng thành công!');
    }

    // 4. GIAO DIỆN SỬA
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // 5. XỬ LÝ CẬP NHẬT
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id, // Bỏ qua check trùng chính nó
            'role' => 'required'
        ]);

        // Chuẩn bị dữ liệu cập nhật
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
        ];

        // Chỉ cập nhật mật khẩu nếu người dùng nhập mới
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Cập nhật thông tin thành công!');
    }

    // 6. XÓA (Có xác nhận ở View)
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Đã xóa người dùng!');
    }
}