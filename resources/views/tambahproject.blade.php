@extends('admin.app')
@section('title', 'tambahproject')
@section('content-title', 'Tambah Project')
@section('content')

{{-- <div class="row">
  <div class="col-12">
        <a href="{{ route('masterproject.index') }}" class="btn btn-dark mb-2">Kembali</a>
    <div class="card mb-5">
      <div class="card-body">
        <form method="POST" action="{{ route('masterproject.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
           <label>Nama Siswa</label>
            <select class="form-control form-select" name="id_siswa" id="id_siswa">
             <option selected disabled class="text-center">- Pilih Nama Siswa -</option>
             @foreach($siswas as $siswa)
              <option value="{{$siswa->id}}">{{$siswa->nama}}</option>
             @endforeach
            </select>
          </div>
            <div class="form-group">
              <label for="nama_project">Nama Project</label>
              <input type="text" name="nama_project" class="form-control">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" name="deskripsi" class="form-control">
            </div>
            <div class="mb-3">
              <label for="foto">Foto</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto">
                <label class="custom-file-label" for="foto">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" name="tanggal" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </form>
      </div>
    </div>
  </div>
</div> --}}

<div class="row">
  <div class="col-12">
        <a href="{{ route('masterproject.index') }}" class="btn btn-dark mb-2">Kembali</a>
    <div class="card mb-5">
      <div class="card-body">
        <form action="{{ route('masterproject.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <form>
            <div class="form-group">
              <label for="id_siswa">Nama Siswa</label>
              {{-- <select class="form-control form-select" name="id_siswa" id="id_siswa">
                <option disabled selected>Nama Siswa</option>
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}" @if($siswa->id == $mimin_id) selected @endif>{{ $siswa->nama }}</option>
                @endforeach
              </select> --}}
              {{-- <input type="text" name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror" id="id_siswa" value="{{ old('id_siswa')}}">
              --}}
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
              <label for="nama_project">Nama Project</label>
              <input type="text" name="nama_project" class="form-control @error('nama_project') is-invalid @enderror" id="nama_project" value="{{ old('nama_project')}}">
              @error('nama_project')
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
            <div class="form-group">
              <label for="foto">Foto</label>
              <div class="custom-file">
                <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" id="foto" value="{{ old('foto')}}"
                onchange="previewImage()"><br>
                <img src="" class="img-preview w-100 img-fluid mb-3 col-sm-1">
                <label>
                @error('foto')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="about" value="{{ old('tanggal')}}">
              @error('tanggal')
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

<script>
 function previewImage(){
  const image = document.querySelector("#foto");
  const imgPreview = document.querySelector('.img-preview');
  imgPreview.style.display = 'block';

  const ofReader = new FileReader();
  ofReader.readAsDataURL(image.files[0]);

  ofReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
 }
</script>

@endsection