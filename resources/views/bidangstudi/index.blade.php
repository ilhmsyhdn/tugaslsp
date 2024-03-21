@extends('adminlte::page')
@section('title', 'List Bidang Studi')
@section('content_header')
<h1
class="m-0 text-dark">List Bidang Studi</h1>
@stop
@section('content')
<div
class="row">
<div
class="col-12">
<div
class="card">
<div
class="card-body">
<a href="{{route('bidstudi.create')}}"
class="btn
btn-primary mb-2">
Tambah
</a>
<table
class="table table-hover table-bordered
table-stripped" id="example2">
<thead>
<tr>
<th>No.</th>
<th>Id Bidang Studi</th>
<th>Bidang Studi</th>
<th>Opsi</th>
</tr>
</thead>
<tbody>
@foreach($bdstudi as $key => $bs)
<tr>
<td>{{$key+1}}</td>
<td>{{$bs->id}}</td>
<td>{{$bs->bidangstudi}}</td>
<td>
<a href="{{route('bidstudi.edit',
$bs)}}"
class="btn btn-primary btn-xs">
Edit
</a>
<a href="{{route('bidstudi.destroy',$bs)}}" onclick="notificationBeforeDelete(event, this)"
class="btn btn-danger btn-xs">
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
function notificationBeforeDelete(
event,
el) {
event.preventDefault();
if (confirm('Apakah anda yakin akan menghapus data ? ')) {
$("#delete-form").attr('action', $(el).attr('href'));
$("#delete-form").submit();
}
}
</script>
@endpush