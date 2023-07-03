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
}
