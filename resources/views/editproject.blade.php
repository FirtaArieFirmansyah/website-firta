@extends('admin.app')
@section('title', 'editproject')
@section('content-title', 'Edit Project')
@section('content')

{{-- <div class="row">
  <div class="col-12">
        <a href="{{ route('masterproject.index') }}" class="btn btn-dark mb-2">Kembali</a>
    <div class="card mb-5">
      <div class="card-body">
        <form method="POST" action="{{ route('masterproject.update', $project['id'])}}">
          @csrf
          @method('PUT')
          <div class="form-group">
           <label>Nama Siswa</label>
            <select class="form-control form-select" name="id_siswa" id="id_siswa">
             <option selected disabled class="text-center">- Pilih Nama Siswa -</option>
             @foreach($siswas as $siswa)
              <option value="{{$siswa->id}}" @if ($project->id_siswa == $siswa->id) selected @endif>{{$siswa->nama}}</option>
             @endforeach
            </select>
          </div>
            <div class="form-group">
              <label for="nama_project">Nama Project</label>
              <input type="text" class="form-control" id="nama_project" value="{{ $project->nama_project }}" placeholder="Masukkan nama project..">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control" id="nama_project" value="{{ $project->deskripsi }}" placeholder="Masukkan alamat deskripsi..">
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
              <input type="date" name="tanggal" value="{{$project['tanggal']}}" class="form-control">
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('masterproject.update', $projects->id ) }}">
          @csrf
          @method('PUT')
          <form>
            <div class="form-group">
              <label for="id_siswa">Nama Siswa</label>
              <select class="form-control form-select" name="id_siswa" id="id_siswa">
                <option disabled selected>- Pilih Nama Siswa -</option>
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}" @if($projects->id_siswa == $siswa->id) selected @endif>{{ $siswa->nama }}</option>
                @endforeach
              </select>
              @error('id_siswa')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_project">Nama Project</label>
              <input type="text" name="nama_project" class="form-control @error('nama_project') is-invalid @enderror" id="nama_project" value="{{ old('nama_project', $projects->nama_project)}}">
              @error('nama_project')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" value="{{ old('deskripsi', $projects->deskripsi)}}">
              @error('deskripsi')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="foto">Foto</label>
              <div class="custom-file">
                <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" id="foto" value="{{ old('foto', $projects->foto)}}"
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
              <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ old('tanggal', $projects->tanggal)}}">
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