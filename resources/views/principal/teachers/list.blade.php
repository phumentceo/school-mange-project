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

            <h5 class="mb-4">បញ្ជីគ្រូបង្រៀនទាំងអស់</h5>
            <table class="table table-hover datatable">
                <thead>
                    <tr style="background-color: black;">
                        <th><b>ឈ្មោះ</b></th>
                        <th>ភេទ</th>
                        <th>ស្ថានភាពគ្រួសារ</th>
                        <th>អ៊ីមែល</th>
                        <th>លេខទូរស័ព្ទ</th>
                        <th>ថ្ងៃចូលធ្វើការ</th>
                        <th>សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->full_name}}</td>
                            <td>
                                @if($teacher->gender == 1)
                                    ប្រុស
                                @elseif($teacher->gender == 2)
                                    ស្រី
                                @else
                                    មិនកំណត់
                                @endif
                            </td>
                            <td>
                                @if($teacher->marital_status == 1)
                                    រៀបការហើយ
                                @elseif($teacher->marital_status == 2)
                                    នៅលីវ
                                @else
                                    មិនកំណត់
                                @endif
                            </td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->phone }}</td>
                            <td>{{ $teacher->hire_date }}</td>
                            <td>
                                <a class=" btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                                <a class=" btn btn-danger btn-sm"><i class="bi bi-trash2-fill"></i></a>
                                <a class=" btn btn-info btn-sm"><i class="bi bi-pen"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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