@extends('layouts.master')

@section('title')
    إضافة موظف جديد
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    الموظفين
@endsection

@section('son2')
    إضافة موظف جديد
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->
        @if (session('success'))
            <script>
                swal("{{ session('success') }}", "", "success");
            </script>
        @endif
        <div class="card card-teal">
            <div class="card-header">

                <h1 class="card-title col-md-7"><b>البيانات الشخصية للموظف</b></h1>
                <div class="card-tools">

                    <button type="button" class="btn btn-tool " data-card-widget="remove"><i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                            class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <form method="Post" action="{{ route('employees.add', ['yearname' => $year->name]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('Post')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="first_name">اسم الموظف</label>
                            <input id="first_name" class="form-control bg- light" type="text" name="first_name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="last_name">اللقب </label>
                            <input id="last_name" class="form-control bg- light" type="text" name="last_name" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="middle_name">اسم الأب</label>
                            <input id="middle_name" class="form-control bg- light" type="text" name="middle_name"
                                required />
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="mother_name">اسم الأم</label>
                            <input id="mother_name" class="form-control bg- light" type="text" name="mother_name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="birth_place">محل الولادة</label>
                            <input id="birth_place" class="form-control bg- light" type="text" name="birth_place"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="birth_date">تاريخ الولادة</label>
                            <input id="birth_date" class="form-control bg- light" type="date" name="birth_date"
                                required />
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="phone">رقم الهاتف </label>
                            <input id="phone" class="form-control bg- light" type="text" name="phone" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="address"> العنوان</label>
                            <input id="address" class="form-control bg- light" type="text" name="address" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="restrict_place">محل قيد النفوس </label>
                            <input id="restrict_place" class="form-control bg- light" type="text"
                                name="restrict_place" />
                        </div>


                    </div>
                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="nationality">الجنسية </label>
                            <input id="nationality" class="form-control bg- light" type="text" name="nationality" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="family_mode">الوضع العائلي</label>
                            <input id="family_mode" class="form-control bg- light" type="text" name="family_mode" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="children_number">عدد الأولاد</label>
                            <input id="children_number" class="form-control bg- light" type="text"
                                name="children_number" />
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="family_compensation_number">عدد من يتقاضى تعويضاً عائلياً </label>
                            <input id="family_compensation_number" class="form-control bg- light" type="text"
                                name="family_compensation_number" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="work_date"> قدمه في الوظيفة</label>
                            <input id="work_date" class="form-control bg- light" type="date" name="work_date" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="school_from">المدرسة المنقول منها</label>
                            <input id="school_from" class="form-control bg- light" type="text" name="school_from" />
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="book_number">رقم كتاب التعيين</label>
                            <input id="book_number" class="form-control bg- light" type="text" name="book_number" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="book_date">تاريخ كتاب التعيين</label>
                            <input id="book_date" class="form-control bg- light" type="date" name="book_date" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="work_start_date">تاريخ المباشرة</label>
                            <input id="work_start_date" class="form-control bg- light" type="date"
                                name="work_start_date" />
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="leave_date">تاريخ الانفكاك</label>
                            </label>
                            <input id="leave_date" class="form-control bg- light" type="date" name="leave_date" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="school_to">المدرسة التي نقل إليها</label>
                            <input id="school_to" class="form-control bg- light" type="text" name="school_to" />

                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="military_is">هل أدى خدمة العلم</label>
                            <input id="military_is" class="form-control bg- light" type="text" name="military_is" />
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="military_rank">رتبته العسكرية</label>
                            <input id="military_rank" class="form-control bg- light" type="text"
                                name="military_rank" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="salary_place">اسم المدرسة التي يتم نصابه فيها إذل كان سياراً</label>
                            <input id="salary_place" class="form-control bg- light" type="text"
                                name="salary_place" />
                        </div>

                        <div class="row">

                            <div class="form-group text-gray col-sm-12">
                                <label for="certifications">الشهادات الحاصل عليها</label>
                                <input id="certifications" class="form-control bg- light" type="text"
                                    name="certifications" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group text-gray col-sm-12">
                                <label for="file">الصورة الشخصية</label>

                                <input id="imageInput" class="form-control bg-light" type="file" name="file"
                                    accept="image/*" required />

                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group text-gray col-sm-12">
                                <label for="role_id">الصلاحيات </label>
                                <select class="form-control bg-light" id="role_id" name="role_id" required>
                                    @foreach ($roles as $role)
                                        <option class="form-control bg-light" value="{{ $role->id }}">
                                            {{ $role->display_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>


                        </div>


                    </div>


                </div>
                <div class="col-md-12  justify-content-center align-items-center">
                    <button class="btn btn-outline-success col  justify-content-center align-items-center" type="submit">
                        <b>إضافة</b>
                    </button>
                </div>
                <br>
            </form>
            <!-- /.card -->
        </div>
        <!-- /.card -->
    </div>
    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}

    <script>
        const imageInput = document.getElementById('imageInput');

        imageInput.addEventListener('change', (e) => {
            const file = imageInput.files[0];
            const reader = new FileReader();

            reader.onload = (event) => {
                const imageData = event.target.result;
                const image = new Image();

                image.onload = () => {
                    // If the image loads successfully, it's a valid image
                    console.log('Valid image!');
                };

                image.onerror = () => {
                    // If the image fails to load, it's not a valid image
                    console.log('Invalid image!');
                };

                image.src = imageData;
            };

            reader.readAsDataURL(file);
        });
    </script>
@endsection
