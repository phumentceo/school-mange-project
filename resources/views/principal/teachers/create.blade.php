@extends('components.master')
@section('contents')
<div class="card">
    <div class="card-body p-5">
      <h5 class="mb-4">បញ្ចូលគ្រូបង្រៀនទៅក្នុងប្រព័ន្ធ</h5>

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

        <div class="col-md-6">
            <label for="inputPassword5" class="form-label">ថ្ងៃ ខែ ឆ្នាំ កំណើត</label>
            <input type="date" name=""  class=" form-control">
        </div>


        <div class="col-md-6">
            <label for="inputPassword5" class="form-label">ស្ថានភានជិវិត</label>
            <select name="" class=" form-control shadow-none" name="english_name">
              <option value="">មានគ្រួសារ</option>
              <option value="">នៅលីវ</option>
            </select>
        </div>

          


        <div class="col-6">
          <label for="inputAddress5" class="form-label">មុខវិជ្ជាបង្រៀន</label>
          <select name="" class=" form-control shadow-none" id="">
            <option value="">ជ្រើសរើសមុខវិជ្ជា</option>
            <option value="">គណិត</option>
          </select>
        </div>

        <div class="col-6">
            <label for="inputAddress5" class="form-label">មុខវិជ្ជាជំនាញ</label>
            <select name="" class=" form-control shadow-none" id="">
              <option value="">ជ្រើសរើសមុខវិជ្ជា</option>
              <option value="">គណិត</option>
            </select>
        </div>

        <div class="col-6">
            <label class="form-label">កំរិតសញ្ញាប័ត្រ</label>
            <select name="" class=" form-control shadow-none" id="">
                <option value="">បរិញ្ញាប័ត្រ</option>
                <option value="">អនុបណ្ខិត</option>
                <option value="">បណ្ខិត</option>
            </select>
        </div>

        <div class="col-6">
            <label class="form-label">បញ្ចប់ការសិក្សារមកពីសាលា</label>
            <input type="text" class="form-control shadow-none">  
        </div>

        <div class="col-6">
          <label class="form-label">លេខទូរស័ព្ទទំនាក់ទំនង់</label>
          <input type="text" class="form-control shadow-none" >
        </div>

        <div class="col-6">
            <label class="form-label">អាសយដ្ឋាន Email</label>
            <input type="text" class="form-control shadow-none" >
        </div>

        <div class="col-md-3">
          <label class="form-label">ភូមិ​​​</label>
          <input type="text" class="form-control shadow-none">
        </div>
        <div class="col-md-3">
            <label class="form-label">ឃុំ​/សង្កាត់</label>
           <input type="text" class="form-control shadow-none">
        </div>

        <div class="col-md-3">
          <label for="inputZip" class="form-label">ស្រុក​/ក្រុង​/ខណ្ឌ</label>
          <input type="text" class="form-control shadow-none" id="inputZip">
        </div>

        <div class="col-md-3">
            <label for="inputZip" class="form-label">រាជធានី​/ខេត្ត</label>
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