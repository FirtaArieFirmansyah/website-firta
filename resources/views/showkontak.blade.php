@if($kontaks->isEmpty())
  <h6 class="text-center">Siswa belum memiliki kontak.</h6>
@else
    @foreach($kontaks as $kontak)
        
    <div class="card">
        <div class="card-header">
            <i class="fab fa-{{$kontak->jeniskontak->jenis_kontak}}"></i>

        </div>
        <div class="card-body">
            {{-- 
                <i class="fab fa-instagram"></i> 
                <i class="fa-brands fa-whatsapp"></i>
            
            <h6>Jenis Kontak : {{$kontak->jeniskontak->jenis_kontak}}</h6>
            --}}
            <h6>{{$kontak->deskripsi}}</h6> 
        </div>
        <div class="card-footer">
            <a href="{{route('masterkontak.edit', $kontak['id'])}}" class="btn btn-sm btn warning"><i class="fas fa-edit"></i></a>
            <form action="{{ route('masterkontak.destroy', $kontak->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya ?')" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm-danger"><i class="fas fa-trash"></i></button>
                </form>
        </div>
    </div>
    <br>
    @endforeach

@endif