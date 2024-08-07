<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan data student
    public function index()
    {
        // tarik data dari db
        $students = Student::all();

        // panggil view dan kirim data students 
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }


    // method untuk menampilkan form tambah student
    public function create()
    {
        // menambahkan data courses
        $courses = Courses::all();

        // panggil view 
        return view('admin.contents.student.create', [
            'courses' => $courses,
        ]);
    }


    // method untuk menyimpan data student
    public function store(Request $request)
    {

        // validasi request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'class' => 'required',
            'major' => 'required',
            'courses_id' => 'nullable'
        ]);

        // simpan ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'class' => $request->class,
            'major' => $request->major,
            'courses_id' => $request->courses_id,
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('message', 'Berhasil menambahkan student');
    }


    // method untuk menampilkan halaman edit
    public function edit($id)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); //singkatan dari ---->> select * from student WHERE id = $id;

        // menambahkan data courses
        $courses = Courses::all();

        return view('admin.contents.student.edit', [
            'student' => $student,
            'courses' => $courses,
        ]);
    }

    // method untuk menyimpan hasil update 
    public function update($id, Request $request)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); //singkatan dari ---->> select * from student WHERE id = $id;

        // validasi request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'class' => 'required',
            'major' => 'required',
            'courses_id' => 'nullable'
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'class' => $request->class,
            'major' => $request->major,
            'courses_id' => $request->courses_id,
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('message', 'Berhasil mengedit student');
    }

    // method untuk menghapus data
    public function destroy($id)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); //singkatan dari ---->> select * from student WHERE id = $id;

        // hapus student
        $student->delete();

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('message', 'Berhasil menghapus student');
    }
}
