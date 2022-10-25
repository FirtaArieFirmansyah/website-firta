@if($siswas->isEmpty())
  <h6 class="text-center">Siswa belum memiliki kontak.</h6>
@else
    @foreach($siswas as $siswa)
        
    <div class="card">
        <div class="card-header">
            {{$siswa->jenis_kontak}}

        </div>
        <div class="card-body">
            <h6>Jenis Kontak : {{$siswa->jenis_kontak_id}}</h6>
            <h6>Deskripsi : {{$siswa->deskripsi}}</h6> 
        </div>
        <div class="card-footer">
            <a href="{{route('masterkontak.edit', $siswa['id'])}}" class="btn btn-sm btn warning"><i class="fas fa-edit"></i></a>
            <form action="{{ route('masterkontak.destroy', $siswa->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya ?')" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm-danger"><i class="fas fa-trash"></i></button>
                </form>
        </div>
    </div>
    <br>
    @endforeach

@endif