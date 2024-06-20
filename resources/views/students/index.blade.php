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
            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>

                    <tr>
                        <th>#</th>
                        <th>اسم الطالب</th>
                        <th>اسم الوالد</th>
                        <th>اللقب</th>
                        <th>اسم الجد</th>
                        <th>الصف الحالي </th>
                        <th>خيارات إضافية</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->user->first_name }} </td>
                            <td>{{ $student->user->middle_name }}</td>
                            <td>{{ $student->user->last_name }}</td>
                            <td>إضافة</td>
                            <td>إضافة</td>
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

                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('students', ['yearname' => $year->name]) }}"
                                            class="btn btn-outline-info     " type="button">
                                            <b>تعديل</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form>

                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('students', ['yearname' => $year->name]) }}"
                                            class="btn btn-outline-danger     " type="button">
                                            <b>حذف</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form>

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
