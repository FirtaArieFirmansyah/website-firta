@extends('parent')

@section('title', 'Contact')

@section('content')
    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>Contact Me</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap : </label>
                <input type="text" class="form-control" id="name" aria-describedby="name" />
              <div class="mb-3">
                <label for="email" class="form-label">Email : </label>
                <input type="email" class="form-control" id="email" aria-describedby="email" />
                <div class="mb-3">
                  <label for="pesan" class="form-label">Pesan : </label>
                  <textarea class="form-control" id="pesan" rows="3"></textarea>
                </div>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,192L80,208C160,224,320,256,480,250.7C640,245,800,203,960,192C1120,181,1280,203,1360,213.3L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
    <!-- Akhir Contact -->
@endsection