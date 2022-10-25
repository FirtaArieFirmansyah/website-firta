@extends('parent')

@section('title', 'Project')

@section('content')
    <!-- Projects -->
    <section id="projects">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>My Projects</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/projects/1.jpeg" class="card-img-top" alt="Project 1" />
              <div class="card-body">
                <p class="card-text">Kenjeran Beach view in the morning.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/projects/2.jpeg" class="card-img-top" alt="Project 2" />
              <div class="card-body">
                <p class="card-text">Kenjeran Beach view in the afternoon.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/projects/3.jpeg" class="card-img-top" alt="Project 3" />
              <div class="card-body">
                <p class="card-text">View of public cementery at night.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/projects/4.jpeg" class="card-img-top" alt="Project 4" />
              <div class="card-body">
                <p class="card-text">Madura village view.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/projects/5.jpeg" class="card-img-top" alt="Project 5" />
              <div class="card-body">
                <p class="card-text">Lumajang village view.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/projects/6.jpeg" class="card-img-top" alt="Project 6" />
              <div class="card-body">
                <p class="card-text">Terraced rice field view.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,192L60,170.7C120,149,240,107,360,112C480,117,600,171,720,165.3C840,160,960,96,1080,74.7C1200,53,1320,75,1380,85.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- Akhir Projects -->
@endsection