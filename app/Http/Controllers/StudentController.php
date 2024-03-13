<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        return view('dashboard.student.index', [
            'student' => Student::all()
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
        return view('dashboard.student.create', [
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate ([
            'kelas_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Student::create($validatedData);

        return redirect('/dashboard/student')->with('success', 'New student has been added!');
    }

    /**
     * Display the specified resource.
     */
    
    public function show(Student $student)
    {
       return view('dashboard.student.show', [
            'student' => $student
       ]);
    }

    public function edit(Student $student)
    {
        return view('dashboard.student.edit', [
            'student' => $student,
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $rules = [
            'kelas_id' => 'max:255',
            'name' => 'max:255',
            'gender' => 'max:255',
            'date_of_birth' => 'max:255',
            'address' => 'max:255',
        ];

        $validatedData = $request->validate($rules);

        Student::where('id', $student->id)->update($validatedData);

        return redirect('/dashboard/student')->with('success', 'Student has been updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/dashboard/student')->with('success', 'Student has been deleted!');
    }
}

