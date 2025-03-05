@extends('components.master')
@section('contents')
<div class="card">
    <div class="card-body p-4">
      <!-- Document Header -->
      <div class="document-header">
        
        <div class=" text-center">
          <h6 class="main-title" style="font-size: 24px;">ព្រះរាជាណាចក្រកម្ពុជា</h6>
          <h6 class="sub-title">ជាតិ សាសនា ព្រះមហាក្សត្រ</h6>
          <img class="" style="width: 200px;" src="{{ asset('save1.jpg') }}" alt="">
        </div>
        
        <div class="div">
          <p>ខេត្ត កំពង់ធំ</p>
          <h6>មន្ទីអប់រំយុវជននិងកីឡា</h6>
          <p>វិទ្យាល័យ ហ៊ុន សែន ត្បែង</p>
          <p>ថ្នាក់ទី 10B </p>
        </div>
        <h6 class="text-center">តារាងស្រង់ពិន្ទុប្រចាំខែ មិថុនា ថ្នាក់ទី 10A</h6>
      </div>

      <!-- Table Section -->
      <table class="student_ranking">
        <thead>
          <tr>
           
            <th>ម៉ោង</th>
            <th>ថ្ងៃច័ន្ទ</th>
            <th>ថ្ងៃអង្គារ</th>
            <th>ថ្ងៃពុធ</th>
            <th>ថ្ងៃព្រហសត្ប</th>
            <th>ថ្ងៃសុក្រ</th>
            <th>ថ្ងៃសៅរ៌ិ</th>
          </tr>
        </thead>
        <tbody id="table-body">

            @foreach ($schedule7A as $value )
                <tr>
                
                    <td>{{ $value->start_time }} - {{ $value->end_time }}</td>
                    <td>គណិតវិទ្យា</td>
                    <td>រូបវិទ្យា</td>
                    <td>ភូមិវិទ្យា</td>
                    <td>ភាសាខ្មែរ</td>
                    <td>គីមីវិទ្យា</td>
                    <td>សីលធម៍</td>
                
                </tr>
            @endforeach
            
        </tbody>
      </table>

      <!-- Footer Section -->
      <div class="footer">
        <p>សេចក្តីបញ្ជាក់៖ មួយចំនួននៃឈ្មោះត្រូវបានផ្ទៀងផ្ទាត់</p>
        <div class="footer-signature">

          

          <div>
            <p>គ្រូបន្ទុកថ្នាក់</p>
            <p>ហត្ថលេខានិងឈ្មោះ</p>
            <div style="margin-top:60px;"></div>
            <p>ឈ្មោះ................................</p>
          </div>

          <div>
            <p>វិ.ហ៊ុនសែនត្បែងថ្ងៃទី.......ខែ.......ឆ្នាំ 2024</p>
            <p>បានឃើញនិងឯកភាពដោយ</p>
            <div style="margin-top:60px;"></div>
            <p>ឈ្មោះ................................</p>
          </div>

        </div>
      </div>

      <div style="font-size: 20px; cursor: pointer; color:rgb(8, 149, 25);" >
        <i class="bi bi-printer-fill"></i>
        <span>Prin ឯកសារ</span>
      </div>
    </div>
  </div>
@endsection