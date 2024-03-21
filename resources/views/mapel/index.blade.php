@extends('adminlte::page')
@section('title', 'List Standar Kompetensi')
@section('content_header')
 <h1 class="m-0 text-dark">List Mapel</h1>
@stop
@section('content')
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 <a href="{{route('mapel.create')}}" class="btn
btn-primary mb-2">
 Tambah
 </a>
 <table class="table table-hover table-bordered
table-stripped" id="example2">
 <thead>
<tr>
 <th>No.</th>
 <th>Id Mapel</th>
 <th>Mapel</th>
 <th>Kompetensi Keahlian</th>
 <th>Opsi</th>
 </tr>
</thead>
<tbody>
@foreach($mapel as $key => $sk)
 <tr>
 <td>{{$key+1}}</td>
 <td>{{$sk->id}}</td>
 <td id={{$key+1}}>{{$sk->mapel}}</td>
 <td>{{$sk->fkompkeahlian->kompetensikeahlian}}</td>
 <td>
 <a href="{{route('mapel.edit',
$sk)}}" class="btn btn-primary btn-xs">
 Edit
 </a>
<a
href="{{route('mapel.destroy', $sk)}}"
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