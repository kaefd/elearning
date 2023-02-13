<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Http\Request;

use Kyslik\ColumnSortable\Sortable;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Kelas';
        $grade = Grade::sortable()->get();
        return view('elearning.admin.pages.class.index', compact('grade','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elearning.admin.pages.class.create',
        [
            'title' => 'Tambah Kelas'
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
        Grade::create([
            'grade_name'    => $request->grade_name
        ]);
        
        return redirect('/admin/class')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $student = Student::all();
        $teacher = Grade::find($grade->id)->teacher()->where('grade_id', $grade->id)->get();
        return view('elearning.admin.pages.class.details', [
			 	"title"     => "Detail Kelas",
                "edit"      => $grade,
                "student"   => $student->where('grade_id', $grade->id),
                "teacher"   => $teacher
			 ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $rules = $request->validate([
            'grade_name'    => 'required|unique:grades'
        ]);
        
        Grade::where('id', $grade->id)
            ->update($rules);
            
        return redirect('/admin/grade/'.$grade->id.'/edit')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->teacher()->detach('grade_id');
        return redirect('/admin/teacher')->with('success', 'data berhasil dihapus');
    }
}
