@extends('layout.footer')

@extends('layout.content')
@section('content')
<div class="row">
   
    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail</button>
            </li>
          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                <div class="col-lg-9 col-md-8">Dava Rizky Mustofa</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">NISN</div>
                <div class="col-lg-9 col-md-8">2223070004</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Kelas</div>
                <div class="col-lg-9 col-md-8">XII-RPL</div>
              </div>

            </div>

          


      
         

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>

  @endsection

@extends('layout.header')