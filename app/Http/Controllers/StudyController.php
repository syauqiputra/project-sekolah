<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Study;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudyController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        return view('dashboard.study.index', [
            'study' => Study::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.study.create', [
            'kelas' => Kelas::all(),
            'teacher' => Teacher::all()
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate ([
            'id_kelas' => 'required',
            'id_teacher' => 'required',
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Study::create($validatedData);

        return redirect('/dashboard/study')->with('success', 'New study has been added!');
    }

    public function edit(Study $study)
    {
        return view('dashboard.study.edit', [
            'study' => $study,
            'kelas' => Kelas::all(),
            'teacher' => Teacher::all()
        ]);
    }

    public function update(Request $request, Study $study)
    {
        $rules = [
            'id_kelas' => 'max:255',
            'id_teacher' => 'max:255',
        ];

        $validatedData = $request->validate($rules);

        Study::where('id', $study->id)->update($validatedData);

        return redirect('/dashboard/study')->with('success', 'Study has been updated!');
        
    }

    public function destroy(Study $study)
    {
        Study::destroy($study->id);
        return redirect('/dashboard/study')->with('success', 'Study has been deleted!');
    }
}
