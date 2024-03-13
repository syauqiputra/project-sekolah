<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('dashboard.kelas.index', [
            'kelas' => Kelas::all()
        ]);
    }
    public function create()
    {
        return view('dashboard.kelas.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate ([
            'name' => 'required',
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Kelas::create($validatedData);

        return redirect('/dashboard/kelas')->with('success', 'New kelas has been added!');
    }
    public function edit(Kelas $kelas)
    {
        
        return view('dashboard.kelas.edit', [
            'kelas' => $kelas
        ]);
    }
    public function update(Request $request, Kelas $kelas)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);

        $kelas->update($validatedData);

        return redirect('/dashboard/kelas')->with('success', 'Kelas has been Edited!');
    }
     public function destroy(Kelas $kelas)
    {
        Kelas::destroy($kelas->id);
        return redirect('/dashboard/kelas')->with('success', 'Kelas has been deleted!');
    }
}
