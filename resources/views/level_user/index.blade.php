@extends('kalender_beasiswa.partials.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Data Level User</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Data Level User</li>
</ol>
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Data Level User</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Tambah Level User
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Level User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('level_user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Level User</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form></div>
    </div>
</div>
</div>
@php
$no = 1;
@endphp
{{-- Table --}}
<table id="example2" class="table table-bordered table-hover">
<thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach ($data as  $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->nama }}</td>
            <td>
                <form action="{{ route('level_user.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <!-- Edit Button -->
                    <a href="#" data-toggle="modal" data-target="#editModal{{ $item->id }}" class="btn btn-warning">Update</a>
                    <!-- Delete Button -->
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

                @foreach ($data as $item)
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Update Level User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('level_user.update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Level User</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $item->nama }}" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form></div>
            </div>
        </div>
    </div>
@endforeach


            </td>
        </tr>
    @endforeach
</tbody>
</table>
{{-- /Table --}}
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection