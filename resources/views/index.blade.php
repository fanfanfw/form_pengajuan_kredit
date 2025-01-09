@extends('main')
@section('container')

<div class="body-wrapper">
  <div class="container-fluid">
    <!--  Owl carousel -->
    <div class="owl-carousel counter-carousel owl-theme">
      <div class="item">
        <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
          <div class="card-body">
            <div class="text-center">
              <img src="../assets/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
              <p class="fw-semibold fs-3 text-primary mb-1">
                Employees
              </p>
              <h5 class="fw-semibold text-primary mb-0">96</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
          <div class="card-body">
            <div class="text-center">
              <img src="../assets/images/svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
              <p class="fw-semibold fs-3 text-warning mb-1">Clients</p>
              <h5 class="fw-semibold text-warning mb-0">3,650</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card border-0 zoom-in bg-info-subtle shadow-none">
          <div class="card-body">
            <div class="text-center">
              <img src="../assets/images/svgs/icon-mailbox.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
              <p class="fw-semibold fs-3 text-info mb-1">Projects</p>
              <h5 class="fw-semibold text-info mb-0">356</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
          <div class="card-body">
            <div class="text-center">
              <img src="../assets/images/svgs/icon-favorites.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
              <p class="fw-semibold fs-3 text-danger mb-1">Events</p>
              <h5 class="fw-semibold text-danger mb-0">696</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card border-0 zoom-in bg-success-subtle shadow-none">
          <div class="card-body">
            <div class="text-center">
              <img src="../assets/images/svgs/icon-speech-bubble.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
              <p class="fw-semibold fs-3 text-success mb-1">Payroll</p>
              <h5 class="fw-semibold text-success mb-0">$96k</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card border-0 zoom-in bg-info-subtle shadow-none">
          <div class="card-body">
            <div class="text-center">
              <img src="../assets/images/svgs/icon-connect.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
              <p class="fw-semibold fs-3 text-info mb-1">Reports</p>
              <h5 class="fw-semibold text-info mb-0">59</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  Row 1 -->
    <div class="row">
      

      @php
      $colors = ['text-bg-primary', 'text-bg-success', 'text-bg-warning', 'text-bg-danger', 'text-bg-info'];
      @endphp
  
  @foreach ($products as $index => $product)
      <div class="col-md-4 d-flex align-items-stretch">
          <div class="card w-100">
              @php
                  // Pilih warna berdasarkan index
                  $color = $colors[$index % count($colors)];
              @endphp
              <div class="card-header {{ $color }}">
                  <h4 class="mb-0 text-white card-title">{{ $product->name }}</h4>
              </div>
              <div class="card-body">
                  <h3 class="card-title">{{ $product->name }}</h3>
                  <p class="card-text">
                      {{ $product->description }}
                  </p>
              </div>
          </div>
      </div>
  @endforeach

    </div>
  </div>
</div>
@endsection