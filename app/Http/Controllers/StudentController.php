<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function index(Student $model)
    {
        return Inertia::render('StudentsDashboard', [
            'studentsData' => $model->all(),
            'count' => $model->count(),
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255|min:2',
            'last_name' => 'required|max:255|min:2',
            'department' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:students,email',
        ]);

        Student::create($request->all());

        return redirect()->route('studentsdashboard.index')->with('message', 'Student added successfully');
    }

    public function show(Student $student)
    {
    }

    public function edit(Student $student)
    {
    }

    public function update(Request $request, $student_id)
    {
        Log::info('Update request received for student ID: ' . $student_id);
        Log::info('Update request data: ', $request->all());

        $validatedData = $request->validate([
            'first_name' => 'required|max:255|min:2',
            'last_name' => 'required|max:255|min:2',
            'department' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:students,email,' . $student_id . ',student_id',
        ]);

        $student = Student::where('student_id', $student_id)->firstOrFail();
        $student->update($validatedData);

        return redirect()->route('studentsdashboard.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($student_id)
    {
        $student = Student::findOrFail($student_id);
        $student->delete();

        return back()->with('message', 'Student deleted successfully');
    }
}
