//import mysql
const mysql = require("mysql");

//import dotenv dan jalankan method config
require("dotenv").config();

//destructing object process .env
const{
    DB_HOST,
    DB_USERNAME,
    DB_PASSWORD,
    DB_DATABASE
} = process.env;

//membuat koneksi db menggunakan method createConnection
//method menerima parameter object : host,user,password,database
const db = mysql.createConnection({
    host:DB_HOST,
    user:DB_USERNAME,
    password:DB_PASSWORD,
    database:DB_DATABASE,
});

//menghubungkan ke database menggubnakan method connect
//menerima parameter callback

db.connect((err)=>{
    if(err){
        console.log("error connecting" + err.stack);
        return;
    }else{
        console.log("Connected to database");
        return;
    }
});

module.exports = db;