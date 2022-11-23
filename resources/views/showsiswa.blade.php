@extends('admin.app')
@section('title', 'showsiswa')
@section('content-title', 'Show Siswa')
@section('content')

{{-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary text-center">DATA LENGKAP SISWA</h4>
    </div>
    <section>
        <div class="card-body">
            <div class="table-responsive">
              <a href="{{ route('mastersiswa.index') }}" class="btn btn-dark mb-2">Kembali</a>
                <table class="table table-responsive table-bordered table-hover table-stripped">
                 <ul>
                  <li>NISN : {{ $siswa->nisn }}</li>
                  <li>Nama : {{ $siswa->nama }}</li>
                  <li>Alamat : {{ $siswa->alamat }}</li>
                  <li>Email : {{ $siswa->email }}</li>
                  <li>Jenis Kelamin : {{ $siswa->jk }}</li>
                  <li>Foto : {{ $siswa->foto }}</li>
                  <li>About : {{ $siswa->about }}</li>
                  <br>
                 </ul>
                </table>
            </div>
        </div>
    </section>
</div> --}}
<div>
  
    <a href="{{ route('mastersiswa.index') }}" class="btn btn-dark mb-3">Kembali</a>
      <a href="{{route('mastersiswa.edit', $siswa['id'])}}" class="btn btn-primary mb-3">&nbsp;<i class="fas fa-edit"></i></a>
      <form action="{{ route('mastersiswa.destroy', $siswa->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya??')" method="POST" class="d-inline">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-danger mb-3">&nbsp;<i class="fas fa-trash mr-1"></i></button>
      </form>
  
</div>
<div class="row mb-5">
  <div class="col-lg-5">
   <div class="card shadow mb-4">
    <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary">Profil Siswa</h6>
    </div>
    <div class="card-body text-center">
    <img class="w-50 mx-auto" src="{{asset('img/admin/'. $siswa->foto)}}" alt="" style="display: block; overflow: hidden;">
    <br>
         <ul style="list-style:none;">
            <li>NISN : {{ $siswa->nisn }}</li>
            <li>Nama : {{ $siswa->nama }}</li>
            <li>Alamat : {{ $siswa->alamat }}</li>
            <li>Email : {{ $siswa->email }}</li>
            <li>Jenis Kelamin : {{ $siswa->jk }}</li>
         </ul>
   </div>
  </div>

  <div class="card shadow">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Kontak</h6>
    </div>
    <div class="card-body text-center">
     @foreach($kontak as $k)
     <i class="fab fa-{{$k->jeniskontak->jenis_kontak}}"></i> &nbsp <i class="fas fa-arrow-right"></i> &nbsp
     <span>{{$k->deskripsi}}</span><br>
     @endforeach
     
     </div>
    </div>
</div>

<div class="col-lg-7">
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">About</h6>
  </div>
    <div class="card-body text-center">
      <ul style="list-style:none;">
         <li>{{ $siswa->about }}</li>
      </ul>
   </div>
  </div>

 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Project</h6>
  </div>
  <div class="card-body">
   <div class="row justify-content-center">
    @foreach($projek as $project)
     <div class="col-md-5">
      <div class="card-body">
        <h6 class="text-center">{{$project->nama_project}}</h6>
        <img class="w-100" src="{{asset('img/admin/'. $project->foto)}}" alt="Foto Project.">
        <br><br>
        <h6 class="text-center">{{$project->deskripsi}}</h6>
      </div>
     </div>
    @endforeach
   </div>
   </div>
  </div>
 </div>

</div>


@endsection