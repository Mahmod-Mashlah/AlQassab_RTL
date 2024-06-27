@extends('layouts.master')

@section('title')
    تعديل بيانات الطالب {{ $user->first_name }} {{ $user->last_name }}
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
    تعديل بيانات الطالب {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('content')
    {{-- content --}}

    <div class="justify-content-center">
        <br>
        <div class="card card-teal ">
            <div class="card-header">
                <h1 class="card-title col-md-7">
                    <b>
                        البيانات الشخصية
                    </b>
                </h1>
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
            <!-- form start -->
            <form method="POST"
                action="{{ route('students.update', ['yearname' => $year->name, 'user_id' => $student->user->id]) }}">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="first_name">اسم الطالب</label>
                            <input id="first_name" class="form-control bg- light" type="text" name="first_name"
                                value="{{ old('first_name', $user->first_name) }}" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="last_name">اللقب </label>
                            <input id="last_name" class="form-control bg- light" type="text" name="last_name"
                                value="{{ old('last_name', $user->last_name) }}" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="middle_name">اسم الأب</label>
                            <input id="middle_name" class="form-control bg- light" type="text" name="middle_name"
                                value="{{ old('middle_name', $user->middle_name) }}" required />
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="father_work">مهنة الأب </label>
                            <input id="father_work" class="form-control bg- light" type="text" name="father_work"
                                value="{{ old('father_work', $student->father_work) }}" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="grandfather_name">اسم الجد</label>
                            <input id="grandfather_name" class="form-control bg- light" type="text"
                                name="grandfather_name" value="{{ old('grandfather_name', $student->grandfather_name) }}"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="mother_name">اسم الأم</label>
                            <input id="mother_name" class="form-control bg- light" type="text" name="mother_name"
                                value="{{ old('mother_name', $student->mother_name) }}" required />
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="birth_place">مكان الولادة </label>
                            <input id="birth_place" class="form-control bg- light" type="text" name="birth_place"
                                value="{{ old('birth_place', $student->birth_place) }}" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="birth_date"> تاريخ الولادة</label>
                            <input id="birth_date" class="form-control bg- light" type="date" name="birth_date"
                                placeholder="أدخل السنة أولاً, مثال : 22-09-2024"
                                value="{{ old('birth_date', $user->birth_date) }}"required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="restrict_place">محل القيد</label>
                            <input id="restrict_place" class="form-control bg- light" type="text" name="restrict_place"
                                value="{{ old('restrict_place', $student->restrict_place) }}" />
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="restrict_number">رقم القيد </label>
                            <input id="restrict_number" class="form-control bg- light" type="text" name="restrict_number"
                                value="{{ old('restrict_number', $student->restrict_number) }}" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="nationality"> الجنسية</label>
                            <input id="nationality" class="form-control bg- light" type="text" name="nationality"
                                value="{{ old('nationality', $student->nationality) }}" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="in_date">تاريخ الانتساب للمدرسة</label>
                            <input id="in_date" class="form-control bg- light" type="date" name="in_date"
                                value="{{ old('in_date', $student->in_date) }}" />
                        </div>


                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="from_school">الثانوية التي انتقل منها
                            </label>
                            <input id="from_school" class="form-control bg- light" type="text" name="from_school"
                                value="{{ old('from_school', $student->from_school) }}" />
                        </div>

                        <div class="form-group text-danger col-sm-4">
                            <label for="class_id"> الصف ({{ $class->name }}) الرجاء الإدخال مجدداً
                            </label>
                            {{-- <input id="class_id" class="form-control bg- light" type="text" name="class_id"
                                required /> --}}
                            <br>
                            <select class="form-control bg-light" id="class_id" name="class_id" required>
                                @foreach ($classes as $theclass)
                                    <option class="form-control bg-light" value=" {{ old('class_id', $theclass->id) }}">
                                        {{ $theclass->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="phone_number">رقم الهاتف </label>
                            <input id="phone_number" class="form-control bg- light" type="text" name="phone_number"
                                value="{{ old('phone_number', $student->phone_number) }}" required />
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="failed_class">الصفوف التي رسب فيها قبل الانتقال </label>
                            <input id="failed_class" class="form-control bg- light" type="text" name="failed_class"
                                value="{{ old('failed_class', $student->failed_class) }}" />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="last_serial_number">رقم القيد السابق </label>
                            <input id="last_serial_number" class="form-control bg- light" type="text"
                                name="last_serial_number"
                                value="{{ old('last_serial_number', $student->last_serial_number) }}" />
                        </div>

                    </div>


                </div>
                <!-- /.card-body -->
                <br>
                <div class="row justify-content-center">

                    <button class="btn btn-outline-info col-sm-6 col d-flex justify-content-center" type="submit">
                        <b>تعديل</b>
                    </button>
                </div>
                <br>

            </form>
        </div>
        <!-- /.card -->


    </div>

    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
