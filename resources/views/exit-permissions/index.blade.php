@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    طلبات الإذن
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
    طلبات الإذن
@endsection

@section('son2')
    {{-- son2 --}}
@endsection

@section('content')
    {{-- content --}}


    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-6"><b>طلبات الإذن</b></h1>
            <div class="card-tools">

                <button type="button" class="btn btn-tool " data-card-widget="remove"><i class="fas fa-times"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            {{-- @if (Auth::user()->roles()->first()->name == 'mentor' || Auth::user()->roles()->first()->name == 'manager') --}}
            <form action="{{ route('exit-permissions.create', ['yearname' => $year->name]) }}" method="GET">
                @csrf
                @method('Get')
                <!-- /.card-body -->

                <a href="{{ route('exit-permissions.create', ['yearname' => $year->name]) }}"
                    class="btn  btn-outline-success " type="button">
                    <b>إضافة طلب إذن جديد</b>
                </a>
                <br>
                </span>

            </form>
            {{-- @endif --}}

            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 20%">اسم الطالب</th>
                        <th style="width: 10%">الصف</th>
                        <th style="width: 29%">السبب</th>
                        <th style="width: 16%">تاريخ إعطاء طلب الإذن</th>
                        <th style="width: 20%">العمليات المتاحة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exitPermissions as $exitPermission)
                        <tr>
                            <td>{{ $exitPermission->id }}</td>
                            <td>{{ $exitPermission->student->user->first_name }}
                                {{ $exitPermission->student->user->middle_name }}
                                {{ $exitPermission->student->user->last_name }}</td>
                            <td>{{ $exitPermission->class->name }}</td>
                            <td>{{ $exitPermission->reason }}</td>
                            <td>{{ Carbon\Carbon::parse($exitPermission->date)->format('l, j/n/Y') }}</td>
                            {{-- <td>{{ $exitPermission->user->first_name }} {{ $exitPermission->user->last_name }}</td> --}}
                            <td>

                                {{-- edit form --}}
                                <div class="d-flex justify-content-center">
                                    {{-- <form
                                        action="{{ route('exit-permissions.show', ['yearname' => $year->name, 'exit_permission_id' => $exitPermission->id, 'exitPermission' => $exitPermission]) }}"
                                        method="GET">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('exit-permissions.show', ['yearname' => $year->name, 'exit_permission_id' => $exitPermission->id]) }}"
                                            class="btn btn-outline-success     " type="button">
                                            <b>عرض التفاصيل</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form> --}}
                                    {{-- @if (Auth::user()->roles()->first()->name == 'mentor' || Auth::user()->roles()->first()->name == 'manager') --}}
                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('exit-permissions.edit', ['yearname' => $year->name, 'exit_permission_id' => $exitPermission->id]) }}"
                                            class="btn btn-outline-info     " type="button">
                                            <b>تعديل</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form>

                                    {{-- delete form --}}
                                    <div class="d-flex justify-content-center">
                                        <form
                                            action="{{ route('exit-permissions.delete', ['yearname' => $year->name, 'exit_permission_id' => $exitPermission->id]) }}"
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

                                    </div>
                                    {{-- @endif --}}
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
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
