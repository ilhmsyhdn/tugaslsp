@extends('adminlte::page')
@section('title', 'List Standar Kompetensi')
@section('content_header')
 <h1 class="m-0 text-dark">List Kompetnsi Keahlian</h1>
@stop
@section('content')
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 <a href="{{route('jurusan.create')}}" class="btn
btn-primary mb-2">
 Tambah
 </a>
 <table class="table table-hover table-bordered
table-stripped" id="example2">
 <thead>
<tr>
 <th>No.</th>
 <th>Id Kompetensi Keahlian</th>
 <th>Kompetensi Keahlian</th>
 <th>Standar Kompetensi</th>
 <th>Opsi</th>
 </tr>
</thead>
<tbody>
@foreach($jurusan as $key => $sk)
 <tr>
 <td>{{$key+1}}</td>
 <td>{{$sk->id}}</td>
 <td id={{$key+1}}>{{$sk->kompetensikeahlian}}</td>
 <td>{{$sk->fstandkom->standarkompetensi}}</td>
 <td>
 <a href="{{route('jurusan.edit',
$sk)}}" class="btn btn-primary btn-xs">
 Edit
 </a>
<a
href="{{route('jurusan.destroy', $sk)}}"
 onclick="notificationBeforeDelete(event, this, <?php echo $key+1; ?>)" class="btn btn-danger btn-xs">
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
 function notificationBeforeDelete(event, el, dt) {event.preventDefault();
 if (confirm('Apakah anda yakin akan menghapus data StandarKompetensi \"' + document.getElementById(dt).innerHTML + '\" ?')) {
 $("#delete-form").attr('action', $(el).attr('href'));
 $("#delete-form").submit();
 }
 }
 </script>
@endpush