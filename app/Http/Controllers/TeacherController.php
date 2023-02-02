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
    public function index()
    {
        $title = 'Data Tentor';
        $teacher = Teacher::latest()->paginate(10);
        return view('elearning.admin.pages.teacher.index', compact('teacher','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elearning.admin.pages.teacher.create',
        [
            'title' => 'Tambah Data Tentor'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
        'name'      => 'required|max:255',
        'nidn'      => 'required|min:5|unique:students',
        'gender'    => 'required',
        'birthplace'=> 'required',
        'dob'       => 'required',
        'alamat'    => 'required',
        'email'     => 'required|email:dns|unique:users',
        'image'     => 'image|file|max:1024'
        ]);
        
      
        
        
        
        //default password adalah tgllahir YYMMDD
        $pwa = $request->dob;
        $password = preg_replace("/[^0-9]/", "", $pwa);
        
        $user = User::create([
            'username' => $request->nidn,        //default username adalah nidn
            'password' => Hash::make($password),
            'email'    => $request->email,
            'role'     => 'teacher'
        ]);
        
        
        $user_id = $user['id'];
        
        $student = Teacher::create([
        'name'       => $request->name,
        'nidn'        => $request->nidn,
        'gender'     => $request->gender,
        'birthplace' => $request->birthplace,
        'dob'        => $request->dob,
        'user_id'    => $user_id,
        'grade_id'   => $request->grade,
        'study_id'   => $request->sthoudy,
        'alamat'     => $request->alamat,
        'image'      => $request->file('image')->store('student-images')
        ]);
        
        
        
        return redirect('/admin/teacher')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
