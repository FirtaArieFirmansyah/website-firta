@extends('admin.app')
@section('title', 'editsiswa')
@section('content-title', 'Edit Siswa')
@section('content')

<div class="row">
  <div class="col-12">
        <a href="{{ route('mastersiswa.index') }}" class="btn btn-dark mb-2">Kembali</a>
    <div class="card mb-5">
      <div class="card-body">
        <form action="{{ route('mastersiswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <form>
            <div class="form-group">
              <label for="nisn">NISN</label>
              <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" value="{{ $siswa->nisn }}" placeholder="Masukkan nisn siswa.." name="nisn">
              @error('nisn')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $siswa->nama }}" placeholder="Masukkan nama siswa.." name="nama">
              @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
             <label for="nama">Jenis Kelamin</label><br>
              <select name="jk" class="form-control @error('jk') is-invalid @enderror" id="jk">
               <option @if($siswa->jk == "Laki-laki") selected @endif value="Laki-laki">Laki - laki</option>
               <option @if($siswa->jk == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
              </select>
              @error('jk')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $siswa->email }}" placeholder="Masukkan alamat email siswa..">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ $siswa->alamat }}" placeholder="Masukkan alamat siswa..">
              @error('alamat')
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

            {{-- <div class="form-group">
              <label for="foto">Foto</label>
              <div class="custom-file">
                <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" id="foto"><br>
                <img src="{{ asset('storage/'.$siswa->foto) }}" onchange="previewImage()" width="100" height="100" class="img-thumbnail">
                <label>
                @error('foto')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div> --}}
            {{-- </div> <br><br> --}}
            <div class="form-group">
              <label for="about">Tentang Siswa</label>
              <textarea name="about" class="form-control @error('about') is-invalid @enderror" id="about" value="{{ $siswa->about }}" placeholder="Masukkan about siswa..">
              @error('about')
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