<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = [
            'karyawans' => Karyawan::latest()->get(),
        ];
        return view('karyawan.index', $data);
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'name' => ['required'],
        ]);

        $newProject = Karyawan::create([
            'name' => $req->name,
        ]);

        return redirect()->route('karyawan.index')->with('successStore', 'New Karyawan has been created successfully');
    }

    public function show(Karyawan $karyawan)
    {
        $data = [
            'karyawan' => $karyawan
        ];

        return view('karyawan.detail', $data);
    }

    public function update(Karyawan $karyawan, Request $req)
    {
        $validated = $req->validate([
            'name' => ['required'],
        ]);

        $updatedProject = $karyawan->update([
            'name' => $req->name,
        ]);

        return redirect()->route('karyawan.show', ['karyawan' => $karyawan->id])->with('successUpdate', 'Project has been updated successfully');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('successDestroy', 'Project has been deleted successfully');
    }
}
