@extends('adminlte::page') 
@section('title', 'List Guru') 
@section('content_header') 
 <h1 class="m-0 text-dark">List Guru</h1>
@stop
@section('content') 
 <div class="row">
 <div class="col-12">
 <div class="card overflow-scroll">
 <div class="card-body pe-3">
 <a href="{{route('guru.create')}}" class="btn btn-primary mb-2">
 Tambah
 </a>
 <table class="table table-hover table-bordered 
table-stripped" id="example2">
 <thead>
<tr>
 <th>No.</th>
 <th>NIP/NUPTK</th>
 <th>Nama Guru</th>
 <th>Foto</th>
 <th>No Telepon</th>
 <th>Jenis Kelamin</th>
 <th>Alamat</th>
 <th>Agama</th>
 <th>Gelar Depan</th>
 <th>Gelar Belakang</th>
 <th>Perguruan Tinggi</th>
 <th>Tahun Lulus</th>
 <th>Tempat Lahir</th>
 <th>Tanggal Lahir</th>
 <th>Opsi</th>
 </tr>
</thead>
<tbody>
@foreach($guru as $key => $data)
 <tr>
 <td>{{$key+1}}</td>
 <td>{{$data->nip_nuptk}}</td>
 <td id={{$key+1}} >{{$data->namaguru}}</td>
 <td>
 <img src="storage/{{$data->foto}}"
alt="{{$data->foto}} tidak tampil" class="img-thumbnail">
 </td>
<td>{{$data->notelp}}</td>
 <td>
 @if($data->jk == 'L') 
 Laki-laki
 @else
 Perempuan
 @endif
 </td>
<td>{{$data->alamat}}</td>
 <td>
 @switch($data->agama)
 @case('I') 
 Islam
@break
 @case('H') 
 Hindu
@break
 @case('B') 
 Budha
@break
 @case('K') 
 Katolik
@break
 @case('P') 
 Protestan
@break
 @default
 Lainnya
 @endswitch
 </td>
<td>{{$data->gelardepan}}</td>
 <td>{{$data->gelarbelakang}}</td>
 <td>{{$data->namapt}}</td>
 <td>{{$data->tahunlulus}}</td>
 <td>{{$data->tempatlahir}}</td>
 <td>{{$data->tgllahir}}</td>
 <td>
 <a href="{{route('guru.edit', 
$data)}}" class="btn btn-primary btn-xs">
 Edit
 </a>
<a href="{{route('guru.destroy', 
$data)}}" onclick="notificationBeforeDelete(event, this, <?php echo 
$key+1; ?>)" class="btn btn-danger btn-xs">
 Delete
 </a>
 </td>
 </tr>
 @endforeach
</tbody>
 </table>
 </div>
 </div>
 </div>
 </div>
@stop
@push('js') 
 <form action="" id="delete-form" method="post">
 @method('delete') 
 @csrf
 </form>
 <script> 
 $('#example2').DataTable({
 "responsive": true, 
 });
 function notificationBeforeDelete(event, el, dt) {
 event.preventDefault();
 if (confirm('Apakah anda yakin akan menghapus data Guru \"'
+ document.getElementById(dt).innerHTML + '\" ?')) {
 $("#delete-form").attr('action', $(el).attr('href'));
 $("#delete-form").submit();
 } 
 } 
 </script> 
@endpush