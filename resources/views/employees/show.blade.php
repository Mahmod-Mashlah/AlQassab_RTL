@extends('layouts.master')

@section('title')
    عرض بيانات الموظف {{ $user->first_name }} {{ $user->last_name }}
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
    عرض بيانات الموظف {{ $user->first_name }} {{ $user->last_name }}
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
                        <label for="first_name">اسم الموظف</label>
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
                        <label for="mother_name">اسم الأم</label>
                        <br>
                        {{ $employee->mother_name }}
                    </div>


                    <div class="form-group text-gray col-sm-4">
                        <label for="birth_place">محل الولادة</label>
                        <br>
                        {{ $employee->birth_place }}
                    </div>


                    <div class="form-group text-gray col-sm-4">
                        <label for="birth_date">تاريخ الولادة</label>
                        <br>
                        {{ Carbon\Carbon::parse($employee->user->birth_date)->format(' j/n/Y') }}

                    </div>
                    <hr class="bg-green">

                </div>

                <div class="row">

                    <div class="form-group text-green col-lg-4">
                        <label for="phone">رقم الهاتف </label>
                        <br>
                        {{ $employee->phone }}
                    </div>

                    <div class="form-group text-green col-lg-8">
                        <label for="address"> العنوان</label>
                        <br>
                        {{ $employee->address }}
                    </div>
                    <hr class="bg-green">

                </div>
                <div class="row">
                    <div class="form-group text-gray col-sm-4">
                        <label for="restrict_place">محل قيد النفوس </label>
                        <br>
                        {{ $employee->restrict_place }}
                    </div>


                    <div class="form-group text-gray col-sm-4">
                        <label for="nationality">الجنسية </label>
                        <br>
                        {{ $employee->nationality }}
                    </div>


                    <div class="form-group text-gray col-sm-4">
                        <label for="family_mode">الوضع العائلي</label>
                        <br>
                        {{ $employee->family_mode }}
                    </div>

                    <hr class="bg-green">

                </div>

                <div class="row">

                    <div class="form-group text-gray col-sm-4">
                        <label for="children_number">عدد الأولاد</label>
                        <br>
                        {{ $employee->children_number }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="family_compensation_number">عدد من يتقاضى تعويضاً عائلياً </label>
                        <br>
                        {{ $employee->family_compensation_number }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="work_date"> قدمه في الوظيفة</label>
                        <br>
                        {{ $employee->work_date }}
                    </div>

                </div>

                <hr class="bg-green">

                <div class="row">

                    <div class="form-group text-gray col-sm-4">
                        <label for="school_from">المدرسة المنقول منها</label>
                        <br>
                        {{ $employee->school_from }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="book_number">رقم كتاب التعيين</label>
                        <br>
                        {{ $employee->book_number }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="book_date">تاريخ كتاب التعيين</label>
                        <br>
                        {{ $employee->book_date }}
                    </div>

                </div>

                <hr class="bg-green">

                <div class="row">

                    <div class="form-group text-gray col-sm-4">
                        <label for="work_start_date">تاريخ المباشرة</label>
                        <br>
                        {{ $employee->work_start_date }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="leave_date">تاريخ الانفكاك</label>
                        <br>
                        {{ $employee->leave_date }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="school_to">المدرسة التي نقل إليها</label>
                        <br>
                        {{ $employee->school_to }}
                    </div>

                </div>

                <hr class="bg-green">

                <div class="row">

                    <div class="form-group text-gray col-sm-4">
                        <label for="military_is">هل أدى خدمة العلم</label>
                        <br>
                        {{ $employee->military_is }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="military_rank">رتبته العسكرية</label>
                        <br>
                        {{ $employee->military_rank }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="salary_place">اسم المدرسة التي يتم نصابه فيها إذل كان سياراً</label>
                        <br>
                        {{ $employee->salary_place }}
                    </div>

                </div>

                <hr class="bg-green">

                <div class="row">

                    <div class="form-group text-gray col-sm-12">
                        <label for="certifications">الشهادات الحاصل عليها</label>
                        <br>
                        {{ $employee->certifications }}
                    </div>

                </div>

                <hr class="bg-green">

                <div class="row">

                    <div class="form-group text-gray col-sm-12">
                        <label for="year">الصورة الشخصية</label>
                        <br>
                        <div class="col-md-12  justify-content-center align-items-center">
                            <a href="{{ asset('/project-files' . '/' . $imageAsFile->name) }}" target="_blank">
                                <button class="btn btn-outline-info col  justify-content-center align-items-center">
                                    عرض الصورة في نافذة جديدة</button>
                            </a>
                            {{-- <img src="{{ asset('/project-files' . '/' . $imageAsFile->name) }}"
                                alt="{{ $imageAsFile->name }}" style="transform: scale(0.3);position: relative;"> --}}
                        </div>
                    </div>

                </div>

                <hr class="bg-green">

                @if (Auth::user()->hasRole('secretary'))
                    <div class="row">

                        <div class="form-group text-gray col-sm-12">
                            <label for="parent_password">كلمة السر</label>
                            <br>
                            {{ $employee->password }}
                        </div>


                    </div>
                @endif
            </div>

            <!-- /.card-body -->
            <br>


        </div>
        <!-- /.card -->
        <div class="card card-teal">
            <div class="card-header">
                <h1 class="card-title col-md-7"><b> الصلاحيات</b></h1>
                <div class="card-tools">

                    <button type="button" class="btn btn-tool " data-card-widget="remove"><i
                            class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                            class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="form-group text-gray col-md-4">
                        {{-- ____________________________________________________________________ --}}
                        <label for="plays">نوع الموظف : </label>

                        <br>
                        <h6>
                            {{-- {{ implode(', ', $user->roles->pluck('display_name')->all()) }} --}}
                            @foreach ($user->roles as $role)
                                {{ $role->display_name }} ,
                            @endforeach
                        </h6>
                        <br>
                        {{-- @endforeach --}}
                    </div>

                    @if ($user->hasRole('teacher'))
                        <div class="form-group text-gray col-md-4">
                            {{-- ____________________________________________________________________ --}}

                            <label for="classes">الصفوف التي يدرس فيها : </label>

                            <br>
                            @foreach ($subjectsIfTeacher as $subject)
                                <ul>
                                    <li>
                                        {{ $subject->name }} في الصف {{ $subject->class->name }}
                                    </li>
                                </ul>
                                <br>
                            @endforeach
                        </div>
                    @endif

                    @if ($user->hasRole('mentor'))
                        <div class="form-group text-gray col-md-4">
                            {{-- ____________________________________________________________________ --}}

                            <label for="classes">الصفوف التي يشرف عليها: </label>

                            <br>
                            @foreach ($classesIfMentor as $class)
                                <ul>
                                    <li>
                                        {{ $class->name }}
                                    </li>
                                </ul>
                                <br>
                            @endforeach
                        </div>
                    @endif


                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
