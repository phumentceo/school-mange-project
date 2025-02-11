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

            <h5 class="mb-4">មុខវិជ្ជាបង្រៀនទាំងអស់</h5>
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
                                @if($class->teachers->isNotEmpty())
                                    {{ $class->teachers->pluck('full_name')->implode(', ') }}
                                @else
                                    <span class="text-danger">មិនមានគ្រូបន្ទុក</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.class.edit', $class->id) }}" class="btn btn-warning btn-sm">កែប្រែ</a>
                                <form action="{{ route('admin.class.destroy', $class->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('តើអ្នកប្រាកដថាចង់លុប?')">លុប</button>
                                </form>
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
