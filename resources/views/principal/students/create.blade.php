@extends('components.master')
@section('contents')
<div class="card">
    <div class="card-body p-5">
      <h5 class="mb-4">បញ្ចូលសិស្សទៅក្នុងប្រព័ន្ធ</h5>
      <!-- Multi Columns Form -->
      <form class="row g-3">
        <div class="col-md-6">
          <label for="inputName5" class="form-label">ឈ្មោះជាភាសាខ្មែរ</label>
          <input type="text" class="form-control shadow-none" name="khmer_name" placeholder="ផាន សុផាត់">
        </div>
        <div class="col-md-6">
          <label for="inputEmail5" class="form-label">ឈ្មោះជាភាសាឡាតាំង</label>
          <input type="text" class="form-control shadow-none" name="english_name" placeholder="PHAN SOPHAT">
        </div>

        <div class="col-md-12">
          <label for="inputPassword5" class="form-label"><strong>ភេទ</strong></label>
          <select name="" class=" form-control shadow-none" name="english_name">
            <option value="">ជ្រើសរើសភេទ</option>
            <option value="">ភេទស្រី</option>
            <option value="">ភេទប្រុស</option>
          </select>
        </div>

        <div class="col-md-12">
            <label for="inputPassword5" class="form-label">ថ្ងៃ ខែ ឆ្នាំ កំណើត</label>
            <input type="text" name=""  class=" form-control" placeholder="30/5/2007">
        </div>


        
        <div class="text-center">
          <button type="submit" class="btn btn-success">បង្កើត</button>
          <button type="reset" class="btn btn-danger">ត្រឡប់ក្រោយ</button>
        </div>

      </form><!-- End Multi Columns Form -->

    </div>
</div>
@endsection