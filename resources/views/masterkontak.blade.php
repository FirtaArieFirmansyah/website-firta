@extends('admin.app')
@section('title', 'masterkontak')
@section('content-title', 'Master Kontak')
@section('content')

{{-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary text-center">DATA KONTAK</h4>
    </div>
    <section>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('masterkontak.create')}}" class="btn btn-primary mb-4">+ Tambah Data</a>
                <table class="table table-responsive table-bordered table-hover table-stripped"> 
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kontak</th>
                            <th>Deskripsi</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </tbody>
                    @foreach ($kontaks as $kontak)
                    <tr class="text-nowrap">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$siswa->nama}}</td>
                        <td>{{$siswa->jenis_kontak}}</td>
                        <td>{{$siswa->deskripsi}}</td>
                        <td>
                            <a href="{{route('masterkontak.show', $kontak['id'])}}" class="btn btn-success"><i class="fas fa-address-book"></i>&nbspLihat</a>
                            <a href="{{route('masterkontak.edit', $kontak['id'])}}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbspEdit</a>
                            <form action="{{ route('masterkontak.destroy', $project->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya??')" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
</div> --}}

<div class="row mb-4">
    <div class="col-lg-4">
          <div class="card shadow">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
              </div>
               <div class="card-body text-center">
                <table class="table table-responsive table-bordered table-hover table-stripped">
                  <thead>
                  <tr>
                   <th>NISN</th>
                   <th>Nama</th>
                   <th class="text-nowrap" width="15%">Aksi</th>
                  </tr>
                  <tbody>
                  @foreach($siswas as $i => $siswa)
                      <tr>
                         <td>{{$siswa->nisn}}</td>
                         <td>{{$siswa->nama}}</td>
                         <td class="text-nowrap">
                         <a onclick="show({{ $siswa->id}})" class="btn btn-info btn-sm">
                         {{-- <i class="far fa-folder-open"></i> --}}
                         <i class="fas fa-id-card-alt"></i>
                         </a>
                         <a href="{{ route('masterkontak.create') }}?siswa={{ $siswa->id}}" class="btn btn-success btn-sm">
                         <i class="fas fa-plus"></i>
                         </a>
                         </td>
                      </tr>
                  @endforeach
                  </tbody>
                  </thead>
                </table>  
               </div>
              </div>
  
            </div>
             <div class="col-lg-8">
              <div class="card shadow mb-4">
                  <div class="card-header py-3 d-flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Kontak Siswa </h6>
                  </div>
                  <div id="kontak" class="card-body text-center">
                    Pilih siswa terlebih dahulu
                  </div>
              </div>
            </div>          
    </div>
         
    <script>
      function show(id){
      
          $.get('masterkontak/'+id, function(siswas){
              $('#kontak').html(siswas);
          })
      }
    </script>

@endsection