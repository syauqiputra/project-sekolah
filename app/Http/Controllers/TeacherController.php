<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        return view('dashboard.teacher.index', [
            'teacher' => Teacher::all()
        ]);
    }
      
      
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.teacher.create', [
            'teacher' => Teacher::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate ([
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'subject_taught' => 'required',
            'address' => 'required',
        ]);


        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Teacher::create($validatedData);

        return redirect('/dashboard/teacher')->with('success', 'New teacher has been added!');
    }

    /**
     * Display the specified resource.
     */
    
    public function show(Teacher $teacher)
    {
       return view('dashboard.teacher.show', [
            'teacher' => $teacher
       ]);
    }

    public function edit(Teacher $teacher)
    {
        return view('dashboard.teacher.edit', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255',
            'date_of_birth' => 'max:255',
            'subject_taught' => 'max:255',
            'address' => 'max:255',
        ];

        $validatedData = $request->validate($rules);

        Teacher::where('id', $teacher->id)->update($validatedData);

        return redirect('/dashboard/teacher')->with('success', 'Teacher has been updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {

        Teacher::destroy($teacher->id);
        return redirect('/dashboard/teacher')->with('success', 'Teacher has been deleted!');
    }
}
