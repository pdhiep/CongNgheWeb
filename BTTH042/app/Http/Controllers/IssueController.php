<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Hiển thị danh sách (Phân trang 10) [cite: 20, 21, 22]
    public function index()
    {
        // Eager loading 'computer' để lấy tên máy tính và model
        $issues = Issue::with('computer')->paginate(10); 
        return view('issues.index', compact('issues'));
    }

    // Form thêm mới [cite: 23]
    public function create()
    {
        $computers = Computer::all(); // Lấy danh sách máy để chọn
        return view('issues.create', compact('computers'));
    }

    // Lưu dữ liệu (Có validate) [cite: 31]
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Thêm vấn đề thành công!');
    }

    // Form cập nhật [cite: 24]
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Xử lý cập nhật (Có validate) [cite: 31]
    public function update(Request $request, $id)
    {
        $issue = Issue::findOrFail($id);
        
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Cập nhật thành công!');
    }

    // Xóa (Có xác nhận bên View) [cite: 25]
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Đã xóa vấn đề!');
    }
}