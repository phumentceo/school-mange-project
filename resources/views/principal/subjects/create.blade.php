@extends('components.master')
@section('contents')
<div class="card">
    <div class="card-body p-5">
      <h5 class=" mb-3">បញ្ចូលមុខវិជ្ជាទៅក្នុងប្រព័ន្ធ</h5>
      <!-- Multi Columns Form -->
      <form class="row g-3">

        <div class="col-md-12">
          <label for="inputName5" class="form-label">ឈ្មោះមុខវិជ្ជា</label>
          <input type="text" class="form-control shadow-none" id="inputName5">
        </div>

        <div class="col-md-12">
          <label for="inputName5" class="form-label">ប្រភេទមុខវិជ្ជា</label>
          <select name="" class=" form-control">
            <option value="">សម្រាប់ថ្នាក់ សង្គម</option>
            <option value="">សម្រាប់ថ្នាក់ វិទ្យាសាស្រ្ត</option>
          </select>
        </div>

        <div class="col-md-6">
          <label for="inputEmail5" class="form-label">កំរិតមុខវិជ្ជា</label>
          <input type="text" placeholder="ទី 10" class="form-control shadow-none" id="inputName5">
        </div>

        <div class="col-md-6">
            <label for="inputEmail5" class="form-label">ចំនួនសៀវភៅសម្រាប់មុខវិជ្ជា</label>
            <input type="text" class="form-control shadow-none" id="inputName5" placeholder="230 ក្បាល">
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