@extends('layouts.master')

@section('title')
    تعديل طلب إذن الطالب {{ $student->user->first_name }} {{ $student->user->last_name }}
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    طلبات الإذن
@endsection

@section('son2')
    تعديل طلب إذن
@endsection


@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->
        <div class="card card-teal ">
            <div class="card-header">
                <h3 class="card-title col-lg-7">التعديلات</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method="POST"
                action="{{ route('exit-permissions.update', ['yearname' => $year->name, 'exit_permission_id' => $exitPermission->id]) }}">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="title"> اسم الطالب ( سيتم اختيار رقم ولكن يمكن البحث بالاسم)</label>
                            <input list="mylist" id="student_id" name="student_id" class="form-control bg- light"
                                required />
                            <datalist id="mylist">
                                @foreach ($students as $student)
                                    <option class="form-control bg-light" value="{{ old('student_id', $student->id) }}">
                                        {{ $student->user->first_name }}
                                        {{ $student->user->middle_name }}
                                        {{ $student->user->last_name }}
                                    </option>
                                @endforeach
                            </datalist>
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="class_id">الصف</label>
                            {{-- <input id="class_id" class="form-control bg- light" type="text" name="class_id"
                                required /> --}}
                            <br>
                            <select class="form-control bg-light" id="class_id" name="class_id" required>
                                @foreach ($classes as $class)
                                    <option class="form-control bg-light" value="{{ old($class->name, $class->id) }}">
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="date">تاريخ إعطاء طلب الإذن </label>
                            <input id="date" class="form-control bg- light" type="date" name="date"
                                value="{{ old('date', $exitPermission->date) }}" required />
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-md-12">
                            <label for="reason">السبب </label>
                            <input id="reason" class="form-control bg- light" type="text" name="reason"
                                value="{{ old('reason', $exitPermission->reason) }}" required />
                        </div>


                    </div>

                </div>
                <!-- /.card-body -->
                <br>
                <br>
                <div class="row justify-content-center">

                    <button class="btn btn-outline-info col-sm-5 col d-flex justify-content-center" type="submit">
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
