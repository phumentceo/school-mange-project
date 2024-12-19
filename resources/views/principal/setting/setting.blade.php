@extends('components.master')
@section('contents')
   <div class="card">
      <div class="card-body">
          <div class="row">
            <!-- Teachers Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class=" card-title">គ្រូបង្រៀន <span>| ឆ្នាំ 2024-2025</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-workspace"></i>
                  </div>
                  <div class="ps-3">
                    <h6>40 នាក់</h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- End Teachers Card -->

          <!-- Students Card -->
          <div class="col-xxl-4 col-md-6">

            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title text-center">ប្រព័ន្ធរៀបចំថ្នាក់រៀនសម្រាប់សិស្ស</span></h5>

                <div class="d-flex justify-content-center align-items-center">
                  <button class=" btn btn-success">ពិនិត្យថ្នាក់ដែរមាន</button>
                  <button class=" btn btn-success ms-1">រៀបចំថ្នាក់</button>
                </div>
              </div>
            </div>

          </div>
          <!-- End Student Card -->

          <!-- Class stady Card -->
          <div class="col-xxl-4 col-md-6">

            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title text-center">ប្រព័ន្ធរៀបចំថ្នាក់រៀនសម្រាប់សិស្ស</span></h5>

                <div class="d-flex justify-content-center align-items-center">
                  <button class=" btn btn-success">ពិនិត្យថ្នាក់ដែរមាន</button>
                  <button class=" btn btn-success ms-1">រៀបចំថ្នាក់</button>
                </div>

                

              </div>
            </div>

          </div>
           <!-- End Class stady Card -->

           {{-- Custormer start --}}
          <div class="col-xxl-4 col-md-6">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li><a class="dropdown-item" href="#">ឆ្នាំ 2022-2023</a></li>
                  <li><a class="dropdown-item" href="#">ឆ្នាំ 2023-2024</a></li>
                  <li><a class="dropdown-item" href="#">ឆ្នាំ 2024-2025</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">អ្នកប្រើប្រាស់ <span>| ឆ្នាំ 2024-2025</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6>300</h6>
                    <span class="text-danger small pt-1 fw-bold">15</span> <span class="text-muted small pt-2 ps-1">ជាគ្រូបង្រៀន</span>
                  </div>
                </div>

              </div>
            </div>

          </div>
          {{-- Customer end --}}
          </div>
      </div>
   </div>
@endsection