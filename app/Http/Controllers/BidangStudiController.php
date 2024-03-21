<?php

namespace App\Http\Controllers;

use App\Models\BidangStudi;
use Illuminate\Http\Request;

class BidangStudiController extends Controller
{
    public function index()
        {
            //Menampilkan Semua Data Bidang Studi
            $bstudi = BidangStudi::all();
            return view('bidangstudi.index', [
                'bdstudi' => $bstudi
            ]);
        }
    
    public function create()
        {
            //Menampilkan Form Tambah Bidang Studi
            return view('bidangstudi.create');
        }

    public function store(Request $request)
        {
            //Menyimpan Data Bidang Studi
            $request->validate([
            'bidangstudi' => 'required|unique:bidangstudi,bidangstudi'
            ]);
            $array = $request->only([
            'bidangstudi'
            ]);
            $bstudi = BidangStudi::create($array);
            return redirect()->route('bidstudi.index')->with('success_message', 'Berhasil menambah bidang studi baru');
        } 

    public function edit($id)
        {
            //Menampilkan Form Edit
            $bstudi = BidangStudi::find($id);
            if (!$bstudi) return redirect()->route('bidstudi.index')
            ->with('error_message', 'bidang studi dengan id = '.$id.' tidak
            ditemukan');
            return view('bidangstudi.edit', ['bdstudi' => $bstudi]);
        }
    public function update(Request $request, $id)
        {
            //Mengedit Data Bidang Studi
            $request->validate([
            'bidangstudi' =>
            'required|unique:bidangstudi,bidangstudi,'.$id
            ]);
            $bstudi = BidangStudi::find($id);
            $bstudi->bidangstudi = $request->bidangstudi;
            $bstudi->save();
            return redirect()->route('bidstudi.index')->with('success_message', 'Berhasil mengubah bidang studi');
        }

    public function destroy(Request $request, $id)
        {
            //Menghapus Bidang Studi
            $bstudi = BidangStudi::find($id);
            if ($bstudi) $bstudi->delete();
            return redirect()->route('bidstudi.index')->with('success_message', 'Berhasil menghapus bidangstudi');
        }
}