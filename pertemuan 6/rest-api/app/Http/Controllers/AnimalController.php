<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["Kucing", "Ayam", "Ikan"];
    public function index()
    {
        echo "Menampilkan data animals : ";
        echo "<br>";
        foreach ($this->animals as $animal) {
            echo "-" . $animal;
        }
    }

    public function store(Request $request)
    {
        $data = $request->only('nama');
        array_push($this->animals, $data['nama']);
        echo "  <-- Data setelah ditambah" . $this->index();
    }

    public function update(Request $request, $id)
    {
        //echo "Mengupdate data animal dengan id $id";
        echo "<br>";
        $data = $request->only('nama');
        $this->animals[$id] = $data['nama'];
        echo "  <-- Data dengan id $id setelah diupgrade" . $this->index();
    }

    public function destroy($id)
    {
        //echo "Menghapus data animal dengan id $id";
        unset($this->animals[$id]);
        echo "  <-- Data setelah id $id dihapus" . $this->index();
    }
}
