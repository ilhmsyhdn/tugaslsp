<?php

namespace App\Http\Controllers;

use App\Models\BidangStudi;
use App\Models\StandarKompetensi;
use Illuminate\Http\Request;

class StandarKompetensiController extends Controller
{
    //Menampilkan Data Standar Kompetensi
    public function index()
        {
            $stankom = StandarKompetensi::all();
            return view('standarkompetensi.index', ['stankom' => $stankom]);
        }

    public function create()
        {
        //Menampilkan Form Tambah Standar Kompetensi
        return view('standarkompetensi.create', [
            'bstudi' => BidangStudi::all() //Mengirimkan semua databidang studi ke Modal pada halaman create
            ]);
        }
    public function store(Request $request)
        {
        //Menyimpan Data Standar Kompetensi
        $request->validate(['standarkompetensi' =>'required|unique:standarkompetensi,standarkompetensi','kdbidstudi'=> 'required']);
        $array = $request->only([
        'standarkompetensi', 'kdbidstudi'
        ]);
        StandarKompetensi::create($array);
        return redirect()->route('standkomp.index')
        ->with('success_message', 'Berhasil menambah standarkompetensi baru');
        }
        public function edit($id)
        {
        //Menampilkan Form Edit
        $stankom = StandarKompetensi::find($id);
        if (!$stankom) return redirect()->route('standkomp.index')
        ->with('error_message', 'Standar Kompetensi dengan id = '.$id.'tidak ditemukan');
        return view('standarkompetensi.edit', [
        'stankom' => $stankom,
        'bstudi' => BidangStudi::all() //Mengirimkan semua databidang studi ke Modal pada halaman edit
        ]);
        }
        public function update(Request $request, $id)
        {
        //Mengedit Data Standar Kompetensi
        $request->validate([
        'standarkompetensi' =>'required|unique:standarkompetensi,standarkompetensi,'.$id
        ]);
        $stankom = StandarKompetensi::find($id);
        $stankom->standarkompetensi = $request->standarkompetensi;
        $stankom->kdbidstudi = $request->kdbidstudi;
        $stankom->save();
        return redirect()->route('standkomp.index')
        ->with('success_message', 'Berhasil mengubah StandarKompetensi');
        }

        public function destroy(Request $request, $id)
        {
        //Menghapus Bidang Studi
        $stankom = StandarKompetensi::find($id);
        if ($stankom) $stankom->delete();
        return redirect()->route('standkomp.index')->with('success_message', 'Berhasil menghapus standarkompetensi "' . $stankom->standarkompetensi . '" !');
        } 
}
