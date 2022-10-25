@if($siswas->isEmpty())
  <h6 class="text-center">Siswa belum memiliki project.</h6>
@else
    @foreach($siswas as $siswa)
        
    <div class="card">
        <div class="card-header">
            {{$siswa->nama_project}}

        </div>
        <div class="card-body">
            <img class="w-50" src="{{asset('storage/'. $siswa->foto)}}" alt=""><br><br>
            <h6>Deskripsi : {{$siswa->deskripsi}}</h6> 
            <h6>Tanggal : {{$siswa->tanggal}}</h6>

        </div>
        <div class="card-footer">
            <a href="{{route('masterproject.edit', $siswa['id'])}}" class="btn btn-sm btn warning"><i class="fas fa-edit"></i></a>
            {{-- <a href="" class="btn btn-sm-danger"><i class="fas fa-trash"></i></a> --}}

            <form action="{{ route('masterproject.destroy', $siswa->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya ?')" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm-danger"><i class="fas fa-trash"></i></button>
                </form>
        </div>
    </div>
    <br>
    @endforeach

@endif