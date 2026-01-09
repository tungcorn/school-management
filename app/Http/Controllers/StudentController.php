<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('school')->orderBy('created_at', 'desc')->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $schools = School::all();
        return view('students.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string'],
            'student_id' => ['required', 'unique:students'],
             'email' => ['required', 'email', 'unique:students,email'],
            'phone' => ['nullable', 'numeric'],
            'school_id' => ['required', 'exists:schools,id'],
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Tạo thành công!');
    }

    public function show(Student $student)
    {

    }

    public function edit(Student $student)
    {
        $schools = School::all();
        return view('students.edit', compact('student', 'schools'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string'],
            'student_id' => ['required', 'unique:students,student_id,' . $student->id],
            'email' => ['required', 'email', 'unique:students,email,' . $student->id],
            'phone' => ['nullable', 'numeric'],
            'school_id' => ['required', 'exists:schools,id'],
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Sửa thành công!');
    }

    public function destroy(Student $student)
    {

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Xóa thành công!');
    }

}
