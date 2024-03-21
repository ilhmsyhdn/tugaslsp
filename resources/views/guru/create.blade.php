@extends('adminlte::page') 
@section('title', 'Tambah Guru') 
@section('content_header') 
 <h1 class="m-0 text-dark">Tambah Guru</h1>
@stop
@section('content') 
 <form action="{{route('guru.store')}}" method="post"
enctype="multipart/form-data">
 @csrf
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 <div class="form-group">
 <label for="nip_nuptk">NIP/NUPTK</label>
 <input type="number" class="form-control 
@error('nip_nuptk') is-invalid @enderror" id="nip_nuptk"
placeholder="NIP/NUPTK" name="nip_nuptk" value="{{old('nip_nuptk')}}">
 @error('nip_nuptk') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="namaguru">Nama Guru</label>
 <input type="text" class="form-control 
@error('namaguru') is-invalid @enderror" id="namaguru" placeholder="Nama 
Guru" name="namaguru" value="{{old('namaguru')}}">
 @error('namaguru') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="notelp">No Telepon/HP</label>
 <input type="number" class="form-control 
@error('notelp') is-invalid @enderror" id="notelp" placeholder="No 
Telepon/HP" name="notelp" value="{{old('notelp')}}">
 @error('notelp') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label>Jenis Kelamin</label>
 <div class="form-check">
 <input class="form-check-input" type="radio"
name="jk" id="jkL" value="L" @if(old('jk') == 'L') checked @endif
checked>
 <label class="form-check-label me-5"
for="jkL">
 Laki-laki
 </label>
 <input class="form-check-input" type="radio"
name="jk" id="jkP" value="P" @if(old('jk') == 'P') checked @endif>
 <label class="form-check-label"
for="jkP">
 Perempuan
</label>
 </div>
 </div>
 <div class="form-group">
 <label for="alamat">Alamat</label>
 <textarea rows="5" class="form-control 
@error('alamat') is-invalid @enderror" id="alamat"
name="alamat">{{old('alamat')}}</textarea> 
 @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="agama">Agama</label>
 <select class="form-select @error('agama') isinvalid @enderror" id="agama" name="agama">
 <option value="I" @if(old('agama') ==
'I')selected @endif>Islam</option>
 <option value="H" @if(old('agama') ==
'H')selected @endif>Hindu</option>
 <option value="B" @if(old('agama') ==
'B')selected @endif>Budha</option>
 <option value="K" @if(old('agama') ==
'K')selected @endif>Katolik</option>
 <option value="P" @if(old('agama') ==
'P')selected @endif>Protestan</option>
 <option value="L" @if(old('agama') ==
'L')selected @endif>Lainnya</option>
 </select>
 </div>
 <div class="form-group">
 <label for="gelardepan">Gelar Depan</label>
 <input type="text" class="form-control 
@error('gelardepan') is-invalid @enderror" id="gelardepan"
placeholder="Gelar Depan" name="gelardepan"
value="{{old('gelardepan')}}">
 @error('gelardepan') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="gelarbelakang">Gelar
Belakang</label>
 <input type="text" class="form-control 
@error('gelarbelakang') is-invalid @enderror" id="gelarbelakang"
placeholder="Gelar Belakang" name="gelarbelakang"
value="{{old('gelarbelakang')}}">
 @error('gelarbelakang') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="namapt">Perguruan Tinggi</label>
 <input type="text" class="form-control 
@error('namapt') is-invalid @enderror" id="namapt" placeholder="Nama 
Perguruan Tinggi" name="namapt" value="{{old('namapt')}}">
 @error('namapt') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="tahunlulus">Tahun Lulus</label>
 <select class="form-select @error('tahunlulus') 
is-invalid @enderror" id="tahunlulus" name="tahunlulus">
 @for($thn = date("Y");$thn > date("Y") -
50;$thn--) 
 <option value="{{$thn}}"
@if(old('tahunlulus') == $thn)selected @endif>{{$thn}}</option>
 @endfor
 </select>
 </div>
 <div class="form-group">
 <label for="tempatlahir">Tempat Lahir</label>
 <input type="text" class="form-control 
@error('tempatlahir') is-invalid @enderror" id="tempatlahir"
placeholder="Tempat Lahir" name="tempatlahir"
value="{{old('tempatlahir')}}">
 @error('tempatlahir') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="tgllahir">Tanggal Lahir</label>
 <input type="date" class="form-control"
class="form-control @error('tgllahir') is-invalid @enderror"
id="tgllahir" placeholder="Tanggal Lahir" name="tgllahir"
value="{{old('tgllahir')}}">
 @error('tgllahir') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="foto" class="formlabel">Foto</label>
 <img src="/img/guru.jfif" class="imgthumbnail d-block" name="tampil" alt="..." width="15%" id="tampil">
 <input class="form-control @error('foto') isinvalid @enderror" type="file" id="foto" name="foto">
 @error('foto') <span class="textdanger">{{$message}}</span> @enderror
 </div> 
 </div>
 <div class="card-footer">
 <button type="submit" class="btn btnprimary">Simpan</button>
 <a href="{{route('guru.index')}}" class="btn btndefault">
 Batal
 </a>
 </div>
 </div>
 </div>
 </div>
@stop
@push('js') 
<script>
 function readURL(input){
 if(input.files && input.files[0]){
 var reader = new FileReader();
 reader.onload = function(e){
 $('#tampil').attr('src', e.target.result);
 } 
 reader.readAsDataURL(input.files[0]);
 } 
 } 
 $("#foto").change(function(){
 readURL(this);
 });
</script>
@endpush