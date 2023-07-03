<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $data = [
            'departments' => Department::latest()->get(),
        ];
        return view('department.index', $data);
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'name' => ['required'],
        ]);

        $newProject = Department::create([
            'name' => $req->name,
        ]);

        return redirect()->route('department.index')->with('successStore', 'New Department has been created successfully');
    }

    public function show(Department $department)
    {
        $data = [
            'department' => $department
        ];

        return view('department.detail', $data);
    }

    public function update(Department $department, Request $req)
    {
        $validated = $req->validate([
            'name' => ['required'],
        ]);

        $updatedProject = $department->update([
            'name' => $req->name,
        ]);

        return redirect()->route('department.show', ['department' => $department->id])->with('successUpdate', 'Project has been updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('department.index')->with('successDestroy', 'Project has been deleted successfully');
    }
}
