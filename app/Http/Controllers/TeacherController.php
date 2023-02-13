<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Grade;
use App\Models\TeacherGrade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\attach;

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
        $teacher = Teacher::all();
        return view('elearning.admin.pages.teacher.index', compact('teacher','title'));

    }
    
    public function print($id)
    {
        $teacher = Teacher::find($id);
        return view('elearning.admin.pages.teacher.profile',
        [
            'teacher' => $teacher
        ]);
            
    }
    public function printAll()
    {
        $title = 'Data Tentor';
        $teacher = Teacher::all();
        return view('elearning.admin.pages.teacher.teachers',
        [
            'teacher' => $teacher,
            'title'   => $title
        ]);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $grade = Grade::all();
        return view('elearning.admin.pages.teacher.create',
        [
            'title' => 'Tambah Data Tentor',
            'grade' => $grade
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Teacher $teacher, Grade $grade)
    {
        $valid = $request->validate([
        'name'      => 'required|max:255',
        'nidn'      => 'required|min:5|unique:teachers',
        'gender'    => 'required',
        'birthplace'=> 'required',
        'dob'       => 'required',
        'alamat'    => 'required',
        'email'     => 'required|unique:users',
        'image'     => 'image|file|max:1024'
        ]);
        
      
        if($valid = $request->validate(['image']))
        {
            $image = $request->file('image')->store('teacher-images');
        } else $image = null;
        
        
        
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
                
        
        $teacher = Teacher::create([
        'name'       => $request->name,
        'nidn'       => $request->nidn,
        'gender'     => $request->gender,
        'birthplace' => $request->birthplace,
        'dob'        => $request->dob,
        'user_id'    => $user_id,
        'alamat'     => $request->alamat,
        'image'      => $image
        ]);

        if($request->grade_id != null)
        {
            $grade_id = $request->grade_id;
        }else $grade_id = null;
        
        $teacherId = $teacher['id'];
        
        $t =Teacher::findOrFail($teacherId);
        $t->grade()->attach($grade_id);
        

        
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
        $user = User::all();
        return view('elearning.admin.pages.teacher.details',
        [
            'title' => 'Details',
            'show'  => $teacher,
            'user'  => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $grade = Grade::all();
        return view('elearning.admin.pages.teacher.edit', [
			 	"title" => "Edit Data",
			 	"edit" =>$teacher,
                "grade" => $grade
			 ]);
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
        $rules      = [
        'name'      => 'required|max:255',
        'gender'    => 'required',
        'birthplace'=> 'required',
        'dob'       => 'required',
        'alamat'    => 'required',
        'image'     => 'image|file|max:1024'
        ];
        

        if($request->nidn != $teacher->nidn )
        {
            $rules['nidn'] = 'required|unique:teachers';
        }
        
        $valid = $request->validate($rules);

        if($request->file('image'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $valid['image'] = $request->file('image')->store('teacher-images');
        }
        
        Teacher::where('id', $teacher->id)
                ->update($valid);
                
        return redirect('/admin/teacher')->with('success', 'Data berhasil diperbarui');
        
    }
    
    public function up(Teacher $teacher)
    {
        $t = Teacher::findOrFail($teacher->id);
        $t->grade()->sync(null);
        return redirect('admin/grade')->with('success', 'Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        if($teacher->image)
        {
            Storage::delete($teacher->image);
        }
            
        Teacher::destroy($teacher->id);
        User::destroy($teacher->user_id);
        
        $teacher->grade()->detach('grade_id');
        return redirect('/admin/teacher')->with('success', 'data berhasil dihapus');
    }
}
