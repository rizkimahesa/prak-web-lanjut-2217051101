@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Isi Data User</h2>
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        @csrf
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" required>
        </div>

        <div class="form-group">
            <label for="npm">IPK:</label>
            <input type="text" id="ipk" name="ipk" class="form-control" placeholder="Masukkan IPK" required>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select name="kelas_id" id="kelas_id" class="form-control" required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="foto">Foto:</label><br>
            <input type="file" id="foto" name="foto"><br><br>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection