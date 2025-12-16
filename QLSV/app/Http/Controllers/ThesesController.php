<?php

namespace App\Http\Controllers;

use App\Models\Theses;
use App\Models\Student;
use Illuminate\Http\Request;

class ThesesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theses = Theses::with('student')->latest()->paginate(5);
  
        return view('theses.index',compact('theses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('theses.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'student_id' => 'required|exists:students,id',
            'program' => 'required',
            'supervisor' => 'required',
            'abstract' => 'required',
        ]);
  
        Theses::create($request->all());
   
        return redirect()->route('theses.index')
                        ->with('success','Thesis created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Theses $thesis)
    {
        $thesis->load('student');
        return view('theses.show',compact('thesis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theses $thesis)
    {
        $students = Student::all();
        return view('theses.edit',compact('thesis', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theses $thesis)
    {
        $request->validate([
            'title' => 'required',
            'student_id' => 'required|exists:students,id',
            'program' => 'required',
            'supervisor' => 'required',
            'abstract' => 'required',
        ]);
  
        $thesis->update($request->all());
  
        return redirect()->route('theses.index')
                        ->with('success','Thesis updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theses $thesis)
    {
        $thesis->delete();
  
        return redirect()->route('theses.index')
                        ->with('success','Thesis deleted successfully');
    }
}