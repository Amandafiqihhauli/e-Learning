<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //menampilkan data courses dari database
    public function index (){
        $courses = Courses::all();

    // kirim data ke view
    return view('admin.contents.courses.index', [
        'courses' => $courses
    ]);
    }

    // method untuk menampilkan form tambah courses
    public function create(){
        return view('admin.contents.courses.create');
    }


    // method untuk menyimpan data courses
    public function store(Request $request){
        
        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan ke database
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil menambahkan course');
    }

     // method untuk menampilkan halaman edit
     public function edit($id){
        // cari data courses berdasarkan id
        $courses = Courses::find($id); //singkatan dari ---->> select * from courses WHERE id = $id;

        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }

    // method untuk menyimpan hasil update 
    public function update($id, Request $request){
        // cari data courses berdasarkan id
        $courses = Courses::find($id); //singkatan dari ---->> select * from courses WHERE id = $id;

        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan perubahan
        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/courses')->with('message', 'Berhasil mengedit course');
    }

    // method untuk menghapus data
    public function destroy($id){
        // cari data courses berdasarkan id
        $courses = Courses::find($id); //singkatan dari ---->> select * from courses WHERE id = $id;

        // hapus student
        $courses->delete();

        // kembalikan ke halaman student
        return redirect('/admin/courses')->with('message', 'Berhasil menghapus course');
    }
}
