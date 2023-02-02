<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\User;
use App\Models\Grade;
use Kyslik\ColumnSortable\Sortable;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Siswa';
        $student = Student::sortable()->get();
        return view('elearning.admin.pages.student.index', compact('student','title'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elearning.admin.pages.student.create',
        [
            'title' => 'Tambah Data Siswa'
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
        'nis'       => 'required|min:5|unique:students',
        'grade'     => 'required',
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
            'username' => $request->nis,        //default username adalah nis
            'password' => Hash::make($password),
            'email'    => $request->email,
            'role'     => 'student'
        ]);
        
        
        $user_id = $user['id'];
        
        $student = Student::create([
        'name'       => $request->name,
        'nis'        => $request->nis,
        'gender'     => $request->gender,
        'birthplace' => $request->birthplace,
        'dob'        => $request->dob,
        'user_id'    => $user_id,
        'grade_id'   => $request->grade,
        'alamat'     => $request->alamat,
        'image'      => $request->file('image')->store('student-images')
        ]);
        
        
        
        return redirect('/admin/student')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $user = User::all();
        return view('elearning.admin.pages.student.details',
        [
            'title' => 'Details',
            'show'  => $student,
            'user'  => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $grade = Grade::all();
        return view('elearning.admin.pages.student.edit', [
			 	"title" => "Edit Data",
			 	"edit" =>$student,
                "grade" => $grade
			 ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $rules      = [
        'name'      => 'required|max:255',
        'grade_id'  => 'required',
        'gender'    => 'required',
        'birthplace'=> 'required',
        'dob'       => 'required',
        'alamat'    => 'required',
        'image'     => 'image|file|max:1024'
        ];
        

        if($request->nis != $student->nis )
        {
            $rules['nis'] = 'required|unique:students';
        }
        
        $valid = $request->validate($rules);

        if($request->file('image'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $valid['image'] = $request->file('image')->store('student-images');
        }
        
        Student::where('id', $student->id)
                ->update($valid);
        
        return redirect('/admin/student')->with('success', 'Data berhasil diperbarui');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if($student->image)
            {
                Storage::delete($student->image);
            }
        Student::destroy($student->id);
        User::destroy($student->user_id);
        return redirect('/admin/student')->with('success', 'data berhasil dihapus');
    }
}
