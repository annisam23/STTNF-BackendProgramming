//import student controller
const StudentController = require("../controller/StudentController");

//import express
const express = require("express");

//objek router
const router = express.Router();

//routing
router.get("/",(req,res)=>{
    res.send("hello express");
});

//kode routing students
router.get("/students",StudentController.index);
router.get("/students/:id",StudentController.show);
router.post("/students",StudentController.store);
router.put("/students/:id",StudentController.update);
router.delete("/students/:id",StudentController.destroy);

//export router
module.exports = router;