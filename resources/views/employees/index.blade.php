@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    الموظفين
@endsection {{-- or @stop --}}

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    {{-- root --}}
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    {{-- son1 --}}
    الموظفين
@endsection

@section('son2')
    الموظفين
@endsection

@section('content')
    {{-- content --}}


    <br>
    <div class="row justify-content-center align-items-center">

        @if (Auth::user()->hasRole('secretary'))
            <div class="col col-md-7">
                <form method="Post" action="{{ route('students.add', ['yearname' => $year->name]) }}">
                    @csrf
                    @method('Post')

                    <!-- /.card-body -->

                    <div class="col-md-10  justify-content-center align-items-center">
                        <a href="{{ route('employees.add', ['yearname' => $year->name]) }}" target="_blank" type="submit"
                            class="btn btn-outline-success col  justify-content-center align-items-center">
                            إضافة موظف جديد
                        </a>
                    </div>
                </form>

            </div>
        @endif
    </div>

    <br>
    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-7"><b>الموظفين</b></h1>
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
        <div class="card-body">
            <div class="row">
                {{-- <div class="form-group text-gray col-md-6"> --}}
                {{-- <label for="student_id">البحث عن طالب : </label> --}}
                {{-- <input id="student_id" class="form-control bg- light" type="text" name="student_id"
                                    required /> --}}

                {{-- </div> --}}

                {{-- <div class="col form-group text-gray col-md-12">
                    <label for="employee">البحث عن موظف</label>
                    <input list="mylist" id="employee" name="employee_id" class="form-control bg- light" --}}
                {{-- placeholder="البحث عن موظف عن طريق الاسم" --}}
                {{-- required /> --}}
                {{-- <datalist id="mylist">
                        @foreach ($employees as $employee)
                            <option class="form-control bg-light" value="{{ $employee->id }}">
                                {{ $employee->user->first_name }}
                                {{ $employee->user->middle_name }}
                                {{ $employee->user->last_name }}
                            </option>
                        @endforeach
                    </datalist> --}}
                {{-- 🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂 --}}

                {{-- <div class="col form-group text-gray col-md-12">
                    <form method="Post" action="#">
                        @csrf
                        @method('Post')
                        <label for="employee">البحث عن موظف</label>

                        <input id="employee_id" list="employees-list" class="form-control bg- light" name="employee_id"
                            required />

                        <datalist id="employees-list">
                            @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"> {{ $employee->user->first_name }}
                                    {{ $employee->user->middle_name }}
                                    {{ $employee->user->last_name }}</option>
                            @endforeach
                        </datalist> --}}
                {{-- 🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂🙂 --}}

                {{-- <input list="mylist" id="student_id" name="student_id" class="form-control bg- light" required />
                        <datalist id="mylist">
                            @foreach ($students as $student)
                                <option class="form-control bg-light" value="{{ $student->id }}">
                                    {{ $student->user->first_name }}
                                    {{ $student->user->middle_name }}
                                    {{ $student->user->last_name }}
                                </option>
                            @endforeach
                        </datalist> --}}
                {{--
                <div class="col form-group text-gray col-md-4 ">
                    <br>
                    <div class="justify-content-center align-items-center">
                        <a href="
                            {{ route('employees.search', ['yearname' => $year->name]) }}
                            "
                            class="btn btn-outline-success   col-md-6  justify-content-center align-items-center  "
                            type="button">
                            <b>بحث</b>
                        </a>
                    </div>

                </div>
                </form>
            </div> --}}

            </div>

            <br>
            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>

                    <tr>
                        <th style="width: 10%">#</th>
                        <th style="width: 20%">اسم الموظف</th>
                        <th style="width: 20%">اسم الأب</th>
                        <th style="width: 20%">اللقب</th>
                        {{-- <th>الصف الحالي </th> --}}
                        <th style="width: 30%" class="align-items-center justify-content-center">خيارات إضافية</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->user->first_name }} </td>
                            <td>{{ $employee->user->middle_name }}</td>
                            <td>{{ $employee->user->last_name }}</td>
                            {{-- <td>{{ $employee->class->name }}</td> --}}
                            <td>

                                {{-- show form --}}
                                <div class="d-flex justify-content-center">
                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('employees.show', ['yearname' => $year->name, 'user_id' => $employee->user->id]) }}"
                                            class="btn btn-outline-success" type="button">
                                            <b>عرض التفاصيل</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form>
                                    @if (Auth::user()->hasRole('secretary'))
                                        <form
                                            action="{{ route('employees.edit', ['yearname' => $year->name, 'user_id' => $employee->user->id]) }}"
                                            method="Post">
                                            @csrf
                                            @method('Get')
                                            <!-- /.card-body -->

                                            <button type="submit" class="btn btn-outline-info">
                                                <b>تعديل</b>
                                            </button>
                                            <br>
                                            </span>
                                        </form>

                                        <form
                                            action="{{ route('employees.delete', ['yearname' => $year->name, 'user_id' => $employee->user->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <!-- /.card-body -->

                                            <button class="btn btn-outline-danger" type="submit">
                                                <b>حذف</b>
                                            </button>
                                            <br>
                                            </span>
                                        </form>
                                    @endif

                            </td>

                        </tr>
                    @endforeach


                    <br>

                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


    <br>

    <!-- /.card -->
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
