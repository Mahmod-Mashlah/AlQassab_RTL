@extends('layouts.master')

@section('title')
    إضافة طالب جديد
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    الطلاب
@endsection

@section('son2')
    إضافة طالب جديد
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

                <h1 class="card-title col-md-7"><b>البيانات الشخصية للطالب</b></h1>
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
            <form method="Post" action="{{ route('students.add', ['yearname' => $year->name]) }}">
                @csrf
                @method('Post')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="first_name">اسم الطالب</label>
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
                            <label for="father_work">مهنة الأب </label>
                            <input id="father_work" class="form-control bg- light" type="text" name="father_work" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="grandfather_name">اسم الجد</label>
                            <input id="grandfather_name" class="form-control bg- light" type="text"
                                name="grandfather_name" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="mother_name">اسم الأم</label>
                            <input id="mother_name" class="form-control bg- light" type="text" name="mother_name"
                                required />
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="birth_place">مكان الولادة </label>
                            <input id="birth_place" class="form-control bg- light" type="text" name="birth_place" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="birth_date"> تاريخ الولادة</label>
                            <input id="birth_date" class="form-control bg- light" type="text" name="birth_date"
                                placeholder="أدخل السنة أولاً, مثال : 22-09-2024" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="restrict_place">محل القيد</label>
                            <input id="restrict_place" class="form-control bg- light" type="text"
                                name="restrict_place" />
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="restrict_number">رقم القيد </label>
                            <input id="restrict_number" class="form-control bg- light" type="text"
                                name="restrict_number" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="nationality"> الجنسية</label>
                            <input id="nationality" class="form-control bg- light" type="text" name="nationality" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="in_date">تاريخ الانتساب للمدرسة</label>
                            <input id="in_date" class="form-control bg- light" type="text" name="in_date" />
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="from_school">الثانوية التي انتقل منها
                            </label>
                            <input id="from_school" class="form-control bg- light" type="text" name="from_school" />
                        </div>

                        <div class="form-group text-info col-sm-4">
                            <label for="class_id"> الصف الذي انتسب إليه</label>
                            {{-- <input id="class_id" class="form-control bg- light" type="text" name="class_id"
                                required /> --}}
                            <br>
                            <select class="form-control bg-light" id="class_id" name="class_id" required>
                                @foreach ($classes as $class)
                                    <option class="form-control bg-light" value="{{ $class->id }}">
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="phone_number">رقم الهاتف </label>
                            <input id="phone_number" class="form-control bg- light" type="text" name="phone_number"
                                required />
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="failed_class">الصفوف التي رسب فيها قبل الانتقال </label>
                            <input id="failed_class" class="form-control bg- light" type="text"
                                name="failed_class" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="last_serial_number">رقم القيد السابق </label>
                            <input id="last_serial_number" class="form-control bg- light" type="text"
                                name="last_serial_number" />
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
@endsection
