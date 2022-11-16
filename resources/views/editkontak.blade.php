@extends('admin.app')
@section('title', 'editkontak')
@section('content-title', 'Edit Kontak')
@section('content')

<div class="row">
    <div class="col-12">
          <a href="{{ route('masterkontak.index') }}" class="btn btn-dark mb-2">Kembali</a>
      <div class="card mb-5">
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data" action="{{ route('masterkontak.update', $kontaks->id ) }}">
            @csrf
            @method('PUT')
            <form>
              <div class="form-group">
                <label for="id_siswa">Nama Siswa</label>
                <select class="form-control form-select" name="id_siswa" id="id_siswa">
                  <option disabled selected>- Pilih Nama Siswa -</option>
                  @foreach ($siswas as $siswa)
                      <option value="{{ $siswa->id }}" @if($kontaks->id_siswa == $siswa->id) selected @endif>{{ $siswa->nama }}</option>
                  @endforeach
                </select>
                @error('id_siswa')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="jenis_kontak">Jenis Kontak</label>
                <input type="text" name="jenis_kontak" class="form-control @error('jenis_kontak') is-invalid @enderror" id="jenis_kontak" value="{{ old('jenis_kontak', $kontaks->jenis_kontak)}}">
                @error('jenis_kontak')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" value="{{ old('deskripsi', $kontaks->deskripsi)}}">
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