@extends('kalender_beasiswa.partials.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Data User</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Data User</li>
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
<h3 class="card-title">Data User</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Tambah User
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Modal User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="form-group">
            <label for="id_level_user">Level User</label>
            <select class="form-control" name="id_level_user">
                <option value="">Pilih Level User</option>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nomer_telepon">Nomer Telepon</label>
            <input type="text" name="nomer_telepon" class="form-control" id="nomer_telepon">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat"></textarea>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
        </div>
        <button type="submit" class="btn btn-warning">Simpan</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

{{-- Table --}}
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Level User</th>
<th>Nomer Telepon</th>
<th>Alamat</th>
<th>Tanggal Lahir</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach ($users as $index => $user)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->level_user->nama }}</td>
    <td>{{ $user->nomer_telepon }}</td>
    <td>{{ $user->alamat }}</td>
    <td>{{ $user->tanggal_lahir }}</td>
    <td>
        <form action="{{ route('user.destroy', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <!-- Edit Button -->
            <a href="#" data-toggle="modal" data-target="#editModal{{ $user->id }}" class="btn btn-warning">Update</a>
            <!-- Delete Button -->
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>

<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="id_level_user">Level User</label>
                        <select class="form-control" name="id_level_user">
                            <option value="">Pilih Level User</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" @if ($level->id == $user->id_level_user) selected @endif>{{ $level->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nomer_telepon">Nomer Telepon</label>
                        <input type="text" name="nomer_telepon" class="form-control" id="nomer_telepon" value="{{ $user->nomer_telepon }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat">{{ $user->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $user->tanggal_lahir }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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
