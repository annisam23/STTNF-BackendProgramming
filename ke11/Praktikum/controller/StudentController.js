// TODO 3: Import data students dari folder data/students.js
// code here
const {request} = require("express");
const students = require("../data/students");


//membuat class StudentController
class StudentController{
    index(req,res){
        //TODO 4: Tampilkan data student
        //code here
        const data = {
            message: "Menampilkan semua students",
            data:students
        };

        res.json(data);
    }

    store(req,res){
        const {nama} = req.body;

        //TODO 5: Tambahkan data student
        //code here
        students.push(nama);

        const data = {
            message: `Menambah students : ${nama}`,
            data:students
        };

        res.json(data);
    }

    update(req,res){
        const {id} = req.params;
        const {nama} = req.body;

        //TODO 6: update data student
        //code here
        students[id]=nama;
        
        const data = {
            message: `Mengupdate student dengan id ${id} nama ${nama}`,
            data:students
        };

        res.json(data);
    }
    
    destroy(req,res){
        const {id} = req.params;

        //TODO 7: hapus data student
        //code here
        students.splice(id,1);
        const data = {
            message: `Menghapus student dengan id ${id}`,
            data:students
        };

        res.json(data);
    }
}

//membuat objec StudentController
const object = new StudentController();

//export object studentcontroller
module.exports = object;