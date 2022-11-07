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
        //cari id student yang ingin di update
        $student = Student::find($id);

        if ($student) {
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'jurusan' => $request->jurusan ?? $student->jurusan,
                'email' => $request->email ?? $student->email,
                'umur' => $request->umur ?? $student->umur,
            ];

            //melakukan update data
            $student->update($input);

            $data = [
                'message' => 'Student is updated',
                'data' => $student
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            // mengembalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }

    //buat method destroy($id)
    public function destroy($id)
    {
        //cari id student yang ingin dihapus
        $student = Student::find($id);

        if ($student) {
            //hapus student tersebut
            $student->delete();

            $data = [
                "message" => "Student is deleted",
            ];
            // mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            // mengembalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }

    //mendapatkan detail resource student
    //membuat method show
    public function show($id)
    {
        //cari id student yang ingin didapatkan
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get detail student',
                'data' => $student
            ];
            //mengembalikan data(json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];
            //mengembalikan data(json) dan kode 404
            return response()->json($data, 404);
        }
    }
}
