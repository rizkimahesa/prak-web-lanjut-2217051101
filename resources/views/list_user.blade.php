@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background: #f8f9fa;">
    <h2 class="mb-4">Daftar User</h2>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>IPK</th>
                <th>Kelas</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user) 
            <tr>
                <td>{{ $user->id }}</td> 
                <td>{{ $user->nama }}</td>
                <td>{{ $user->ipk }}</td>
                <td>{{ $user->nama_kelas }}</td>
                <td><img src="{{ asset($user->foto) }}" class="user-photo"></td>
                <td>
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary mb-3">Detail</a>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-400 p-1 text-md-center font-semibold mx-1 rounded-lg" 
                        onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .user-photo {
        width: 50%;
        height: auto;
        max-width: 150px;
        border-radius: 5px;
        object-fit: cover;
    }
</style>
@endsection
