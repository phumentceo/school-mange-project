@extends('components.master')
@section('contents')


    @include('principal.classes.modals.schedule-create')
    @include('principal.classes.modals.schedule-update')


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
                                <a class=" btn btn-success btn-sm" href="{{ route('admin.class.edit', $class->id) }}"><i
                                        class="bi bi-eye"></i></a>
                                <a class=" btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this?')"
                                    href="{{ route('admin.class.destroy', $class->id) }}" class=" text-danger"><i
                                        class="bi bi-trash2-fill"></i></a>
                                <a class=" btn btn-primary btn-sm" href="{{ route('admin.class.edit', $class->id) }}"><i
                                        class="bi bi-pen"></i></a>

                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bi bi-calendar-day"></i>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">ពិនិត្យមើលកាវិភាគ</a></li>
                                        <li data-bs-toggle="modal" data-bs-target="#exampleModal"><a class="dropdown-item"
                                                onclick="openModal({{ $class->id }})"
                                                href="javascript:void()">បន្ថែមការវិភាគ</a></li>
                                        <li data-bs-toggle="modal" data-bs-target="#schedule-update"><a class="dropdown-item"
                                                href="javascript:void()">កែសម្រួលកាលវិភាគ</a></li>
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





@endsection

@section('scripts')
    <script>
        setTimeout(function () {
            var alertMessage = document.getElementById('alertMessage');
            if (alertMessage) {
                alertMessage.style.display = 'none';
            }
        }, 2000);


        const openModal = (id) => {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.schedule.create') }}",
                data: {
                    'id': id
                },
                dataType: "json",
                success: function (response) {
                    if (response.status === 200) {

                        let teachers = response.teachers;
                        let htmlModal = '';
                        htmlModal += `
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">បន្ថែមការវិភាគសម្រាប់ថ្នាក់ </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <div class="row p-0">
                                        <div class="col-12 mb-3">
                                            <label for="">គ្រូបង្រៀន</label>
                                            <select name="" class=" form-control">`;

                                                $.each(teachers, function (index, value) { 
                                                    let levelsText = value.levels.map(item => item.name).join(", ");
                                                     htmlModal += `
                                                       <option value="${value.id}">
                                                          ${value.full_name} (បង្រៀនថ្នាក់ : ${levelsText})
                                                        </option>
                                                     `;
                                                });

                                                
                                            htmlModal += ` 
                                            </select>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label for="">ថ្ងៃបង្រៀន</label>
                                            <select name="" class=" form-control shadow-none">
                                                <option value="ច័ន្ទ">ច័ន្ទ</option>
                                                <option value="អង្គារ">ច័អង្គារ</option>
                                                <option value="ពុធ">ពុធ</option>
                                                <option value="ព្រ.ហ">ព្រ.ហ</option>
                                                <option value="សុក្រ">សុក្រ</option>
                                                <option value="សៅរ៍ិ">សៅរ៍ិ</option>
                                            </select>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label for="">ពេលវេលា</label>
                                            <select name="" class=" form-control shadow-none">
                                                @foreach ($studyTimes as $time )
                                                    <option value="{{ $time->id }}">{{ $time->start_time }}  - {{ $time->end_time }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>


                                    </div>

                                </form>
                            </div>
                        `;

                        $(".display-modal").html(htmlModal);
                    }
                }
            });
        }
    </script>
@endsection