@extends('components.master')

@section('contents')
<div class="card">
    <div class="card-body p-5">
      <h5 class=" mb-3">កែសម្រួលមុខវិជ្ជាទៅក្នុងប្រព័ន្ធ</h5>
      <!-- Multi Columns Form -->
      <form class="row g-3" action="{{ route('admin.subject.update',$subject->id) }}" method="POST" id="subjectForm">
        @method('PUT')
        @csrf
    
        <div class="col-md-12">
            <label for="subject_name" class="form-label">ឈ្មោះមុខវិជ្ជា</label>
            <input type="text" class="form-control shadow-none" id="subject_name" name="subject_name" value="{{ $subject->subject_name }}">
            @error('subject_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="col-md-6">
            <label for="grade" class="form-label">កំរិតមុខវិជ្ជា</label>
            <input type="text" placeholder="ទី 10" class="form-control shadow-none" id="grade" name="grade" value="{{ $subject->grade }}">
            @error('grade')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="col-md-6">
            <label for="credit" class="form-label">ពិន្ទុពេញសម្រាប់មុខវិជា្ជ</label>
            <input type="text" placeholder="ទី 10" class="form-control shadow-none" id="credit" name="credit" value="{{ $subject->credit }}">
            @error('credit')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="col-md-6">
            <label for="subject_type" class="form-label">ប្រភេទមុខវិជ្ជា</label>
            <select name="subject_type" id="subject_type" class="form-control">
                <option value="3" {{ $subject->subject_type == '3' ? 'selected' : '' }}>ទូទៅ</option>
                <option value="1" {{ $subject->subject_type == '1' ? 'selected' : '' }}>សម្រាប់ថ្នាក់ សង្គម</option>
                <option value="2" {{ $subject->subject_type == '2' ? 'selected' : '' }}>សម្រាប់ថ្នាក់ វិទ្យាសាស្រ្ត</option>
            </select>
            @error('subject_type')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="col-md-6">
            <label for="book_number" class="form-label">ចំនួនសៀវភៅសម្រាប់មុខវិជ្ជា</label>
            <input type="text" class="form-control shadow-none" id="book_number" name="book_number" placeholder="230 ក្បាល" value="{{ $subject->book_number }}">
            @error('book_number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="col-12">
            <label for="description" class="form-label">ផ្សេងៗ</label>
            <textarea name="description" class="form-control shadow-none" id="description" rows="5">{{ $subject->description }}</textarea>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="text-center">
            <button type="submit" class="btn btn-success" id="submitBtn">
                <span id="spinner" class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true" style="display: none;"></span>
                កែសម្រួល
            </button>
            <button type="reset" class="btn btn-danger">ត្រឡប់ក្រោយ</button>
        </div>
    </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
  // Handle form submission and show loading spinner
  document.getElementById('subjectForm').addEventListener('submit', function(event) {
      // Show the spinner and disable the submit button
      document.getElementById('spinner').style.display = 'inline-block';
      document.getElementById('submitBtn').disabled = true;
  });
</script>
@endsection

