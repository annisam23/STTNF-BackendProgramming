<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method inde - get all resources
    function index()
    {
        $students = Student::all();

        $data = [
            'message' => "Get all students",
            "data" => $students
        ];

        //mengirim data (json) dan kode 200
        return response()->json($data, 200);
    }

    //membuat method store
    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'umur' => $request->umur,
        ];

        //menggunkaan model Student uuntuk insertd data
        $student = Student::create($input);

        $data = [
            'message' => "Student is created succesfully",
            'data' => $student,
        ];

        //mengembalikan data json dan kode 201
        return response()->json($data, 201);
    }

    //buat method update
    public function update($id, Request $request)
    {
        $post = Student::find($id)->update($request->all());
        return response()->json($post, 200);
    }

    //buat method destroy($id)
    public function destroy($id)
    {
        Student::destroy($id);

        $hasil = [
            "message" => "Data student dengan id $id telah dihapus",
            "data" => $this->index()
        ];

        return $hasil;
    }
}
