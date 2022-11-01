@extends('admin.app')
@section('title', 'Jenis Kontak')
@section('content-title', 'Tambah Jenis Kontak')
@section('content')

<div class="row">
  <div class="col-12">
        <a href="{{ route('masterkontak.index') }}" class="btn btn-dark mb-2">Kembali</a>
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