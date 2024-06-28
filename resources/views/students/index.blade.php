@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    طلاب سنة {{ $year->name }}
@endsection {{-- or @stop --}}

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    {{-- root --}}
    لوحة التحكم
@endsection

@section('son1')
    {{-- son1 --}}
    الطلاب
@endsection

@section('son2')
    طلاب سنة {{ $year->name }}
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
                        <a href="{{ route('students.add', ['yearname' => $year->name]) }}" target="_blank" type="submit"
                            class="btn btn-outline-success col  justify-content-center align-items-center">
                            إضافة طالب جديد
                        </a>
                    </div>
                </form>

            </div>
        @endif
    </div>

    <br>
    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-7"><b>الطلاب</b></h1>
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

                <div class="col form-group text-gray col-md-12">

                    <input list="mylist" id="student_id" name="student_id" class="form-control bg- light"
                        placeholder="البحث عن طالب" required />
                    <datalist id="mylist">
                        @foreach ($students as $student)
                            <option class="form-control bg-light" value="{{ $student->id }}">
                                {{ $student->user->first_name }}
                                {{ $student->user->middle_name }}
                                {{ $student->user->last_name }}
                            </option>
                        @endforeach
                    </datalist>


                    <div class="col form-group text-gray col-md-4 ">
                        <br>
                        <div class="justify-content-center align-items-center">
                            <a href="{{ route('students.search', ['yearname' => $year->name, 'user_id' => $student->user->id]) }}"
                                class="btn btn-outline-success   col-md-6  justify-content-center align-items-center  "
                                type="button">
                                <b>بحث</b>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

            <br>
            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>

                    <tr>
                        <th style="width: 10%">#</th>
                        <th style="width: 20%">اسم الطالب</th>
                        <th style="width: 20%">اسم الأب</th>
                        <th style="width: 20%">اللقب</th>
                        {{-- <th>الصف الحالي </th> --}}
                        <th style="width: 30%" class="align-items-center justify-content-center">خيارات إضافية</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->user->first_name }} </td>
                            <td>{{ $student->user->middle_name }}</td>
                            <td>{{ $student->user->last_name }}</td>
                            {{-- <td>{{ $student->class->name }}</td> --}}
                            <td>

                                {{-- show form --}}
                                <div class="d-flex justify-content-center">
                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('students.show', ['yearname' => $year->name, 'user_id' => $student->user->id]) }}"
                                            class="btn btn-outline-success     " type="button">
                                            <b>عرض التفاصيل</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form>
                                    @if (Auth::user()->hasRole('secretary'))
                                        <form
                                            action="{{ route('students.edit', ['yearname' => $year->name, 'user_id' => $student->user->id]) }}"
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
                                            action="{{ route('students.delete', ['yearname' => $year->name, 'user_id' => $student->user->id]) }}"
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
