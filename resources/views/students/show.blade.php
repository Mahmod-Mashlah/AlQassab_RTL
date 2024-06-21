@extends('layouts.master')

@section('title')
    عرض بيانات الطالب {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم
@endsection

@section('son1')
    الطلاب
@endsection

@section('son2')
    عرض بيانات الطالب {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('content')
    {{-- content --}}
    <br>
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

            <div class="card-body">

                <div class="row">

                    <div class="form-group text-gray col-sm-4">
                        <label for="first_name">اسم الطالب</label>
                        <br>
                        {{ $user->first_name }}
                    </div>
                    <div class="form-group text-gray col-sm-4">
                        <label for="last_name">اللقب </label>
                        <br>
                        {{ $user->last_name }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="middle_name">اسم الأب </label>
                        <br>
                        {{ $user->middle_name }}
                    </div>

                    <hr class="bg-green">

                </div>

                <div class="row">
                    <div class="form-group text-gray col-sm-4">
                        <label for="father_work">مهنة الأب </label>
                        <br>
                        {{ $student->father_work }}
                    </div>


                    <div class="form-group text-gray col-sm-4">
                        <label for="grandfather_name">اسم الجد</label>
                        <br>
                        {{ $student->grandfather_name }}
                    </div>


                    <div class="form-group text-gray col-sm-4">
                        <label for="mother_name">اسم الأم</label>
                        <br>
                        {{ $student->mother_name }}
                    </div>
                    <hr class="bg-green">

                </div>

                <div class="row">

                    <div class="form-group text-green col-lg-4">
                        <label for="birth_place">مكان الولادة </label>
                        <br>
                        {{ $student->birth_place }}
                    </div>

                    <div class="form-group text-green col-lg-8">
                        <label for="birth_date"> تاريخ الولادة</label>
                        <br>
                        {{ $user->birth_date }}
                    </div>
                    <hr class="bg-green">

                </div>
                <div class="row">
                    <div class="form-group text-gray col-sm-4">
                        <label for="restrict_place">محل القيد </label>
                        <br>
                        {{ $student->restrict_place }}
                    </div>


                    <div class="form-group text-gray col-sm-4">
                        <label for="restrict_number">رقم القيد </label>
                        <br>
                        {{ $student->restrict_number }}
                    </div>


                    <div class="form-group text-gray col-sm-4">
                        <label for="nationality"> الجنسية</label>
                        <br>
                        {{ $student->nationality }}
                    </div>

                    <hr class="bg-green">

                </div>

                <div class="row">

                    <div class="form-group text-gray col-sm-4">
                        <label for="in_date">تاريخ الانتساب للمدرسة</label>
                        <br>
                        {{ $student->in_date }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="from_school">الثانوية التي انتقل منها</label>
                        <br>
                        {{ $student->from_school }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="class"> الصف الذي انتسب إليه</label>
                        <br>
                        {{ $class->name }}
                    </div>



                </div>

                <hr class="bg-green">

                <div class="row">

                    <div class="form-group text-gray col-sm-4">
                        <label for="phone_number">رقم الهاتف </label>
                        <br>
                        {{ $student->phone_number }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="failed_class">الصفوف التي رسب فيها قبل الانتقال </label>
                        <br>
                        {{ $student->failed_class }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="last_serial_number">رقم القيد السابق </label>
                        <br>
                        {{ $student->last_serial_number }}
                    </div>

                </div>

                <hr class="bg-green">

                @if (Auth::user()->hasRole('secretary'))
                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="password">رمز دخول الطالب</label>
                            <br>
                            {{ $student->password }}
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="parent_password">رمز دخول ولي الأمر </label>
                            <br>
                            {{ $student->parent_password }}
                        </div>


                    </div>
                @endif
            </div>

            <!-- /.card-body -->
            <br>


        </div>
        <!-- /.card -->

    </div>

    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
