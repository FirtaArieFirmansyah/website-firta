@extends('admin.app')
@section('title', 'masterproject')
@section('content-title', 'Master Project')
@section('content')

<div class="row mb-4">
    <div class="col-lg-4">
      {{-- <a class="btn btn-primary" href="{{ route('masterproject.create') }}">Tambah Project</a> --}}
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
                  @if($siswas->count() > 0)
                    @foreach($siswas as $i => $siswa)
                        <tr>
                          <td>{{$siswa->nisn}}</td>
                          <td>{{$siswa->nama}}</td>
                          <td class="text-nowrap">
                          <a onclick="show({{ $siswa->id}})" class="btn btn-info btn-sm">
                          <i class="far fa-folder-open"></i>
                          </a>
                          <a href="{{ route('masterproject.create') }}?siswa={{ $siswa->id}}" class="btn btn-success btn-sm">
                          <i class="fas fa-plus"></i>
                          </a>
                          </td>
                        </tr>
                    @endforeach
                    @else 
                        <tr>
                            <td colspan="3" class="text-center">
                                Data Siswa Kosong.
                            </td>
                        </tr>
                    @endif
                </tbody>
                </thead>
              </table>  
             </div>
            </div>

          </div>
           <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Project Siswa </h6>
                </div>
                <div id="project" class="card-body text-center">
                  Pilih siswa terlebih dahulu
                </div>
            </div>
          </div>          
  </div>
       
  <script>
    function show(id){
    
        $.get('masterproject/'+id, function(siswas){
            $('#project').html(siswas);
        })
    }
  </script>

@endsection