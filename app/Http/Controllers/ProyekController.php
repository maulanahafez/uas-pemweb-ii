<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProyekController extends Controller
{
    public function index()
    {
        $data = [
            'proyeks' => Proyek::latest()->get(),
        ];
        return view('proyek.index', $data);
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'name' => ['required'],
        ]);

        $newProject = Proyek::create([
            'name' => $req->name,
        ]);

        return redirect()->route('proyek.index')->with('successStore', 'New Project has been created successfully');
    }

    public function show(Proyek $proyek)
    {
        $data = [
            'proyek' => $proyek
        ];

        return view('proyek.detail', $data);
    }

    public function update(Proyek $proyek, Request $req)
    {
        // dd($req->all(), $proyek);

        $validated = $req->validate([
            'name' => ['required'],
        ]);

        $updatedProject = $proyek->update([
            'name' => $req->name,
        ]);

        return redirect()->route('proyek.show', ['proyek' => $proyek->id])->with('successUpdate', 'Project has been updated successfully');
    }

    public function destroy(Proyek $proyek)
    {
        $proyek->delete();

        return redirect()->route('proyek.index')->with('successDestroy', 'Project has been deleted successfully');
    }
}
