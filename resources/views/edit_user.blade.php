@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Isi Data User</h2>
    <form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        @csrf
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control" value = "{{ old('nama',$user->nama) }}" placeholder="Masukkan Nama" required >
        </div>

        <div class="form-group">
            <label for="ipk">IPK:</label>
            <input type="text" id="ipk" name="ipk" class="form-control" value = "{{ old('ipk',$user->ipk) }}" placeholder="Masukkan IPK">
        </div>

        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select name="kelas_id" id="kelas_id" class="form-control" required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}"
                        {{ $kelasItem->id == $user->kelas_id ? 'selected' : ''}}>
                        {{ $kelasItem->nama_kelas}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="foto">Foto:</label><br>
            <input type="file" id="foto" name="foto"><br><br>
            @if($user->foto)
            <img src="{{ asset($user->foto) }}" alt="User Photo" width = "100" class = "mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection