<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $data = [
            'tugass' => Tugas::latest()->get(),
        ];
        return view('tugas.index', $data);
    }

    public function create()
    {
        return view('tugas.create');
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'name' => ['required'],
        ]);

        $newProject = Tugas::create([
            'name' => $req->name,
        ]);

        return redirect()->route('tugas.index')->with('successStore', 'New tugas has been created successfully');
    }

    public function show(Tugas $tugas)
    {
        $data = [
            'tugas' => $tugas
        ];

        return view('tugas.detail', $data);
    }

    public function update(Tugas $tugas, Request $req)
    {
        $validated = $req->validate([
            'name' => ['required'],
        ]);

        $updatedProject = $tugas->update([
            'name' => $req->name,
        ]);

        return redirect()->route('tugas.show', ['tugas' => $tugas->id])->with('successUpdate', 'Project has been updated successfully');
    }

    public function destroy(Tugas $tugas)
    {
        $tugas->delete();

        return redirect()->route('tugas.index')->with('successDestroy', 'Project has been deleted successfully');
    }
}
