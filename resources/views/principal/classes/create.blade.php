@extends('components.master')
@section('contents')
<div class="card">
    <div class="card-body p-5">
      <h5 class=" mb-3">បញ្ចូលបន្ទប់រៀនទៅក្នុងប្រព័ន្ធ</h5>
      <!-- Multi Columns Form -->
      <form class="row g-3">
        <div class="col-md-12">
          <label for="inputName5" class="form-label">ឈ្មោះបន្ទប់រៀន</label>
          <input type="text" class="form-control shadow-none" id="inputName5">
        </div>
        
        <div class="col-12">
          <label for="inputAddress5" class="form-label">គ្រូបន្ទុកថ្នាក់</label>
          <select name="" class=" form-control shadow-none" id="">
            <option value="">ជ្រើសរើសគ្រូបន្ទុកថ្នាក់</option>
            <option value="">បញ្ញា</option>
          </select>
        </div>

        
        
        <div class="col-12">
          <label class="form-label">ចំនួនកៅអី</label>
          <input type="text" class="form-control shadow-none" >
        </div>
        <div class="col-md-6">
          <label class="form-label">កង្ហារ</label>
          <input type="text" class="form-control shadow-none">
        </div>
        <div class="col-md-4">
          <label class="form-label">ក្តារខៀន</label>
          <select id="inputState" class="form-select shadow-none">
            <option selected>ជ្រើសរើសចំនួនក្តារខៀន</option>
            <option>១</option>
            <option>២</option>
            <option>៣</option>
          </select>
        </div>

        <div class="col-md-2">
          <label for="inputZip" class="form-label">អំពូលភ្លើង</label>
          <input type="text" class="form-control shadow-none" id="inputZip">
        </div>

        <div class="col-12">
            <label class="form-label">ផ្សេងៗ</label>
            <textarea name="" class="form-control shadow-none" rows="5"></textarea>
        </div>

        
        <div class="text-center">
          <button type="submit" class="btn btn-success">បង្កើត</button>
          <button type="reset" class="btn btn-danger">ត្រឡប់ក្រោយ</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
</div>
@endsection