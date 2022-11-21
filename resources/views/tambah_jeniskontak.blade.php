@extends('admin.app')
@section('title', 'Jenis Kontak')
@section('content-title', 'Tambah Jenis Kontak')
@section('content')

<div class="row">
  <div class="col-12">
        <a href="{{ route('masterkontak.index') }}" class="btn btn-dark mb-2">Kembali</a>
        <div class="card-body">
          <div class="form-group row">
              <label for="jenis_kontak" class="col-sm-3 col-form-label">Jenis Kontak Saat Ini : </label>
              <div class="col-sm-5 text-nowrap">
                  @foreach ($jenis_kontak as $item)
                  <form method="POST" action="{{ route('jeniskontak.destroy', $item->id) }}"
                      onclick="return confirm('Apakah Anda Yakin Akan Menghapus Jenis Kontak {{ $item->jenis_kontak }} ?')"
                      class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-secondary btn-icon-split">
                          <span class="icon text-white-50">
                              <i class="fas fa-trash"></i>
                          </span>
                          <span class="text">{{ $item->jenis_kontak }}</span>
                      </button>
                  </form>
                  @endforeach
              </div>
          </div>
    <div class="card mb-5">
      <div class="card-body">
        <form action="{{ route('jeniskontak.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <form>
            <div class="form-group">
              <label for="jenis_kontak">Tambah Jenis Kontak</label>
              <input type="text" name="jenis_kontak" class="form-control @error('jenis_kontak') is-invalid @enderror" id="jenis_kontak" value="{{ old('jenis_kontak')}}">
              @error('jenis_kontak')
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