@extends('adminlte::page')
@section('title', 'Edit Standar Kompetensi')
@section('content_header')
<h1
class="m-0 text-dark">Edit Kompetensi Keahlian</h1>
@stop
@section('content')
<form action="{{route('jurusan.update', $jurusan)}}"
method="post">
@method('PUT')
@csrf
<div
class="row">
<div
class="col-12">
<div
class="card">
<div
class="card-body">
<div
class="form-group">
<label for="kompetensikeahlian">Kompetensi Keahlian</label>
<input type="text"
class="form-control
@error('kompetensikeahlian') is-invalid @enderror" id="kompetensikeahlian"
placeholder="Kompetensi Keahlian" name="kompetensikeahlian"
value="{{$jurusan->kompetensikeahlian ?? old('kompetensikeahlian')}}">
@error('kompetensikeahlian') <span
class="text-danger">{{$message}}</span> @enderror
</div>
<div
class="form-group">
<label for="standarkompetensi">Standar Kompetensi</label>
<div
class="input-group">
<input type="hidden" name="kdstandkomp"
id="kdstandkomp" value="{{$jurusan->fstandkomp->id ??
old('kdstandkomp')}}">
<input type="text"
class="form-control
@error('standarkompetensi') is-invalid @enderror" placeholder="Standar Kompetensi"
id="standarkompetensi" name="standarkompetensi" value="{{$jurusan->fstandkomp->standarkompetensi ?? old('standarkompetensi')}}" aria-label="Standar Kompetensi" aria-
describedby="cari" readonly>
<button
class="btn btn-warning" type="button"
data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i>
Cari Data Bidang Studi</button>
</div>
</div>
</div>
<div
class="card-footer">
<button type="submit"
class="btn btn-
primary">Simpan</button>
<a href="{{route('jurusan.index')}}"
class="btn
btn-default">
Batal
</a>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div
class="modal fade" id="staticBackdrop" data-bs-
backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-
labelledby="staticBackdropLabel" aria-hidden="true">
<div
class="modal-dialog modal-lg modal-dialog-scrollable p-5">
<div
class="modal-content">
<div
class="modal-header">
<h1
class="modal-title fs-5"
id="staticBackdropLabel">Pencarian Data Standar Kompetensi</h1>
<button type="button"
class="btn-close" data-bs-
dismiss="modal" aria-label="Close"></button>
</div>
<div
class="modal-body">
<table
class="table table-hover table-bordered table-
stripped" id="example2">
<thead>
<tr>
<th>No.</th>
<th>Standar Kompetensi</th>
<th>Opsi</th>
</tr>
</thead>
<tbody>
@foreach($kkeahlian as $key => $bs)
<tr>
<td>{{$key+1}}</td>
<td id={{$key+1}}>{{$bs->standarkompetensi}}</td>
<td>
<button type="button"
class="btn btn-primary
btn-xs" onclick="pilih('{{$bs->id}}', '{{$bs->standarkompetensi}}')" data-bs-dismiss="modal">
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
//Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form edit
function pilih(id,kkeahlian){
document.getElementById('kdstandkomp').value = id
document.getElementById('standarkompetensi').value = kkeahlian
}
</script>
@endpush