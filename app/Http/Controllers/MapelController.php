<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\KompetensiKeahlian;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    //Menampilkan Data Standar Kompetensi
    public function index()
        {$mapel = Mapel::all();return view('mapel.index', ['mapel' => $mapel]);}

    public function create()
        {
            //Menampilkan Form Tambah Standar Kompetensi
            return view('mapel.create', [
                'mmapel' => KompetensiKeahlian::all() //Mengirimkan semua databidang studi ke Modal pada halaman create
                ]);
        }
    //Menyimpan Data Standar Kompetensi
    public function store(Request $request)
        {
        $request->validate(['mapel' =>'required|unique:mapel,mapel','kdkompkeahlian'=> 'required']);
        $array = $request->only(['mapel', 'kdkompkeahlian']);
        mapel::create($array);
        return redirect()->route('mapel.index')->with('success_message', 'Berhasil menambah standarkompetensi baru');
        }

    public function edit($id)
        {
        //Menampilkan Form Edit
        $mapel = Mapel::find($id);
        if (!$mapel) return redirect()->route('mapel.index')
        ->with('error_message', 'Standar Kompetensi dengan id = '.$id.'tidak ditemukan');
        return view('mapel.edit', [
        'mapel' => $mapel,
        'mmapel' => KompetensiKeahlian::all() //Mengirimkan semua databidang studi ke Modal pada halaman edit
        ]);
        }  
        
    public function update(Request $request, $id)
        {
        //Mengedit Data kompetensi keahlian
        $request->validate([
        'mapel' =>'required|unique:mapel,mapel,'.$id
        ]);
        $mapel = Mapel::find($id);
        $mapel->mapel = $request->mapel;
        $mapel->kdkompkeahlian = $request->kdkompkeahlian;
        $mapel->save();
        return redirect()->route('mapel.index')
        ->with('success_message', 'Berhasil mengubah StandarKompetensi');
        }

    public function destroy(
        Request $request, $id)
        {
        //Menghapus Bidang Studi
        $mapel = Mapel::find($id);
        if ($mapel) $mapel->delete();
        return redirect()->route('mapel.index')
        ->with('success_message', 'Berhasil menghapus standar kompetensi "' . $mapel->mapel. '" !');
        }
}
