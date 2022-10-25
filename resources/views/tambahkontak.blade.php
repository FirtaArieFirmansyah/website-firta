@extends('admin.app')
@section('title', 'tambahkontak')
@section('content-title', 'Tambah Kontak')
@section('content')

<div class="row">
    <div class="col-12">
          <a href="{{ route('masterkontak.index') }}" class="btn btn-dark mb-2">Kembali</a>
      <div class="card mb-5">
        <div class="card-body">
          <form action="{{ route('masterkontak.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <form>
              <div class="form-group">
                <label for="id_siswa">Nama Siswa</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" 
                value="{{ $siswa->nama }}" disabled>
                <input type="hidden" name="nama" value="{{ $siswa->nama }}">
                <input type="hidden" name="id_siswa" value="{{ $siswa->id}}">
                @error('id_siswa')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="jenis_kontak">Jenis Kontak</label>
                <input type="text" name="jenis_kontak" class="form-control @error('jenis_kontak') is-invalid @enderror" id="jenis_kontak" value="{{ old('jenis_kontak')}}">
                @error('jenis_kontak')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" value="{{ old('deskripsi')}}">
                @error('deskripsi')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection