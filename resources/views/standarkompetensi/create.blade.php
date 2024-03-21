@extends('adminlte::page') 
@section('title', 'Tambah Standar Kompetensi') 
@section('content_header') 
 <h1 class="m-0 text-dark">Tambah Standar Kompetensi</h1>
@stop
@section('content') 
 <form action="{{route('standkomp.store')}}" method="post">
 @csrf
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 <div class="form-group">
 <label for="standarkompetensi">Standar
Kompetensi</label>
 <input type="text" class="form-control 
@error('standarkompetensi') is-invalid @enderror" id="standarkompetensi"
placeholder="Standar Kompetensi" name="standarkompetensi"
value="{{old('standarkompetensi')}}">
 @error('standarkompetensi') <span class="textdanger">{{$message}}</span> @enderror
 </div>
 <div class="form-group">
 <label for="bidangstudi">Bidang Studi</label>
 <div class="input-group">
 <input type="hidden" name="kdbidstudi"
id="kdbidstudi" value="{{old('kdbidstudi')}}">
 <input type="text" class="form-control 
@error('bidangstudi') is-invalid @enderror" placeholder="Bidang Studi"
id="bidangstudi" name="bidangstudi" value="{{old('bidangstudi')}}" arialabel="Bidang Studi" aria-describedby="cari" readonly>
 <button class="btn btn-warning" type="button"
data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i>
Cari Data Bidang Studi</button>
 </div>
 </div> 
 </div>
 <div class="card-footer">
 <button type="submit" class="btn btn-primary">Simpan</button>
 <a href="{{route('standkomp.index')}}" class="btn btn-default">
 Batal
 </a>
 </div>
 </div>
 </div>
 </div>
 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" arialabelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
 <div class="modal-content">
 <div class="modal-header">
 <h1 class="modal-title fs-5"
id="staticBackdropLabel">Pencarian Data Bidang Studi</h1>
 <button type="button" class="btn-close" data-bsdismiss="modal" aria-label="Close"></button>
 </div>
 <div class="modal-body">
 
 <table class="table table-hover table-bordered tablestripped" id="example2">
 <thead>
 <tr>
 <th>No.</th>
 <th>Bidang Studi</th>
 <th>Opsi</th>
 </tr>
 </thead>
 <tbody>
 @foreach($bstudi as $key => $bs)
 <tr>
 <td>{{$key+1}}</td>
 <td id={{$key+1}}>{{$bs->bidangstudi}}</td>
 <td>
 <button type="button" class="btn btn-primary 
btn-xs" onclick="pilih('{{$bs->id}}', '{{$bs->bidangstudi}}')" data-bs-dismiss="modal">
 Pilih
 </button>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 </div>
 </div>
 </div> 
<!-- End Modal -->
@stop
@push('js') 
 <script> 
 $('#example2').DataTable({
 "responsive": true, 
 });
 //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah
 function pilih(id, bstud){
 document.getElementById('kdbidstudi').value = id
 document.getElementById('bidangstudi').value = bstud
 } 
 </script> 
@endpush