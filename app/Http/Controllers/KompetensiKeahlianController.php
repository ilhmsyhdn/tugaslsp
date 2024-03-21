<?php

namespace App\Http\Controllers;

use App\Models\KompetensiKeahlian;
use App\Models\StandarKompetensi;
use Illuminate\Http\Request;

class KompetensiKeahlianController extends Controller
{
    //Menampilkan Data Standar Kompetensi
    public function index()
        {$jurusan = KompetensiKeahlian::all();return view('kompetensikeahlian.index', ['jurusan' => $jurusan]);}

    public function create()
        {
            //Menampilkan Form Tambah Standar Kompetensi
            return view('kompetensikeahlian.create', [
                'kkeahlian' => StandarKompetensi::all() //Mengirimkan semua databidang studi ke Modal pada halaman create
                ]);
        }

    public function store(Request $request)
        {
        //Menyimpan Data Standar Kompetensi
        $request->validate(['kompetensikeahlian' =>'required|unique:kompetensikeahlian,kompetensikeahlian','kdstandkomp'=> 'required']);
        $array = $request->only(['kompetensikeahlian', 'kdstandkomp']);
        KompetensiKeahlian::create($array);
        return redirect()->route('jurusan.index')->with('success_message', 'Berhasil menambah standarkompetensi baru');
        }
        
        public function edit($id)
        {
        //Menampilkan Form Edit
        $jurusan = KompetensiKeahlian::find($id);
        if (!$jurusan) return redirect()->route('jurusan.index')
        ->with('error_message', 'Standar Kompetensi dengan id = '.$id.'tidak ditemukan');
        return view('kompetensikeahlian.edit', [
        'jurusan' => $jurusan,
        'kkeahlian' => StandarKompetensi::all() //Mengirimkan semua databidang studi ke Modal pada halaman edit
        ]);
        }  
        
        public function update(Request $request, $id)
        {
        //Mengedit Data kompetensi keahlian
        $request->validate([
        'kompetensikeahlian' =>'required|unique:kompetensikeahlian,kompetensikeahlian,'.$id
        ]);
        $jurusan = KompetensiKeahlian::find($id);
        $jurusan->kompetensikeahlian = $request->kompetensikeahlian;
        $jurusan->kdstandkomp = $request->kdstandkomp;
        $jurusan->save();
        return redirect()->route('jurusan.index')
        ->with('success_message', 'Berhasil mengubah StandarKompetensi');
        }

        public function destroy(
            Request $request, $id)
            {
            //Menghapus Bidang Studi
            $jurusan =
            KompetensiKeahlian::find($id);
            if ($jurusan) $jurusan->delete();
            return redirect()->route('jurusan.index')
            ->with('success_message', 'Berhasil menghapus standar kompetensi "' . $jurusan->kompetensikeahlian . '" !');
            }


}
