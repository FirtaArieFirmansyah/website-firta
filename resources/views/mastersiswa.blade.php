@extends('admin.app')
@section('title', 'mastersiswa')
@section('content-title', 'Master Siswa')
@section('content')
{{-- <section>
    <ul>
        @foreach($siswas as $siswa)
                <li>NISN : {{ $siswa->nisn }}</li>
                <li>Nama : {{ $siswa->nama }}</li>
                <li>Alamat : {{ $siswa->alamat }}</li>
                <li>Email : {{ $siswa->email }}</li>
                <li>Jenis Kelamin : {{ $siswa->jk }}</li>
                <li>Foto : {{ $siswa->foto }}</li>
                <li>About : {{ $siswa->about }}</li>
                <br>
        @endforeach
    </ul>
</section> --}}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary text-center">DATA SISWA</h4>
    </div>
    <section>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('mastersiswa.create')}}" class="btn btn-primary mb-4">+ Tambah Data</a>
                <table class="table table-responsive table-bordered table-hover table-stripped"> 
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th>No.</th>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </tbody>
                    {{-- @php $no=0; @endphp --}}
                    @if($siswas->count() > 0)
                        @foreach ($siswas as $siswa)
                        {{-- @php $no++; @endphp --}}
                        <tr class="text-center text-nowrap">
                            {{-- <th>{{$no}}</th> --}}
                            <td>{{$loop->iteration}}</td>
                            <td>{{$siswa->nisn}}</td>
                            <td>{{$siswa->nama}}</td>
                            <td>{{$siswa->jk}}</td>
                            <td>{{$siswa->email}}</td>
                            <td>{{$siswa->alamat}}</td>
                            {{-- <td> 
                                <img src="{{asset('storage/'. $siswa->foto)}}" alt="" style="display: block;
                                max-height: 50px;
                                width: auto;
                                overflow: hidden;">
                            </td> --}}
                            <td>
                                <a href="{{route('mastersiswa.show', $siswa['id'])}}" class="btn btn-success"><i class="fas fa-address-book"></i>&nbspLihat</a>
                                <a href="{{route('mastersiswa.edit', $siswa['id'])}}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbspEdit</a>
                                <form action="{{ route('mastersiswa.destroy', $siswa->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya??')" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Siswa Kosong.
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </section>
</div>

@endsection