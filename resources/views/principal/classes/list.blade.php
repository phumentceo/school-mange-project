@extends('components.master')
@section('contents')
    <div class="card">
        <div class="card-body p-5">
            <!-- Alert message -->
            @if(session('success'))
                <div id="alertMessage" class="alert alert-success pb-0" role="alert">
                    <p style="font-size:15px; color: black;">{{ session('success') }}</p>
                </div>
            @endif

            <h5 class="mb-4">បន្ទាប់រៀនតាមថ្នាក់នីមួយៗ</h5>
            <table class="table table-hover datatable">
                <thead>
                    <tr style="background-color: black; color: white;">
                        <th>ល.រ</th>
                        <th>ឈ្មោះថ្នាក់</th>
                        <th>គ្រូបន្ទុកថ្នាក់</th>
                        <th>សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $key => $class)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $class->name }}</td>
                            <td>
                                @if($class->teacher != '')
                                    {{ $class->teacher->full_name }}
                                @else
                                    <span class="text-danger">មិនមានគ្រូបន្ទុក</span>
                                @endif
                            </td>
                            <td class=" d-flex align-items-center">
                                <a class=" btn btn-success btn-sm" href="{{ route('admin.class.edit',$class->id) }}"><i class="bi bi-eye"></i></a>
                                <a class=" btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this?')" href="{{ route('admin.class.destroy',$class->id) }}" class=" text-danger"><i class="bi bi-trash2-fill"></i></a>
                                <a class=" btn btn-primary btn-sm" href="{{ route('admin.class.edit',$class->id) }}"><i class="bi bi-pen"></i></a>
                    
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-calendar-day"></i>
                                    </button>
                                    
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">ពិនិត្យមើលកាវិភាគ</a></li>
                                      <li><a class="dropdown-item" href="#">បន្ថែមការវិភាគ</a></li>
                                      <li><a class="dropdown-item" href="#">កែសម្រួលកាលវិភាគ</a></li>
                                    </ul>
                                </div>


                                {{-- <i class="bi bi-calendar-day"></i> --}}
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Button trigger modal -->
  
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
<script>
    setTimeout(function() {
        var alertMessage = document.getElementById('alertMessage');
        if (alertMessage) {
            alertMessage.style.display = 'none';
        }
    }, 2000);
</script>
@endsection