<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        //Menampilkan Data Guru
        return view('guru.index', ['guru' => Guru::all()]);
        } 
    public function create(){
        //Menampilkan Form Tambah Guru
        return view('guru.create');
        }
        public function store(Request $request){
        //Menyimpan Data Guru
        $request->validate([
        'nip_nuptk' => 'required|unique:guru,nip_nuptk',
        'namaguru' => 'required',
        'notelp' => 'required',
        'jk' => 'required',
        'alamat' => 'required',
        'namapt' => 'required',
        'tempatlahir' => 'required',
        'tgllahir' => 'required',
        'foto' => 'required|image|file|max:2048'
        ]);
        $array = $request->only([
        'nip_nuptk',
        'namaguru',
        'notelp',
        'jk',
        'alamat',
        'agama',
        'gelardepan',
        'gelarbelakang',
        'namapt',
        'tahunlulus',
        'tempatlahir',
        'tgllahir'
        ]);

        $array['foto'] = $request->file('foto')->store('Foto Guru');
        $tambah=Guru::create($array);
        if($tambah) $request->file('foto')->store('Foto Guru');
        return redirect()->route('guru.index')
        ->with('success_message', 'Berhasil menambah guru baru');
        } 
        public function destroy(Request $request, $id)
        { 
        //Menghapus Guru
        $guru = Guru::find($id);
        if ($guru){
        $hapus=$guru->delete();
        if($hapus) unlink("storage/" . $guru->foto);
        } 
        return redirect()->route('guru.index') 
        ->with('success_message', 'Berhasil menghapus guru "' .
       $guru->name . '" !');
        }
        
}
