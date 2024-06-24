@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    برامج المذاكرات
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
    البرامج
@endsection

@section('son2')
    برامج المذاكرات
@endsection

@section('content')
    {{-- content --}}


    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-6"><b> برامج المذاكرات</b></h1>
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

            @if (Auth::user()->roles()->first()->name == 'mentor' || Auth::user()->roles()->first()->name == 'secretary')
                <form action="{{ route('tests.create', ['yearname' => $year->name]) }}" method="GET">
                    @csrf
                    @method('Get')
                    <!-- /.card-body -->

                    <a href="{{ route('tests.create', ['yearname' => $year->name]) }}" class="btn  btn-outline-success "
                        type="button">
                        <b>إضافة برنامج مذاكرات جديد</b>
                    </a>
                    <br>
                    </span>

                </form>
            @endif

            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 20%">الفصل الدراسي</th>
                        <th style="width: 30%">اسم الملف</th>
                        <th style="width: 15%">ناشر الملف</th>
                        <th style="width: 30%">العمليات المتاحة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($test_schedules as $test_schedule)
                        <tr>
                            <td>{{ $test_schedule->id }}</td>
                            <td>{{ $test_schedule->season->number }}</td>
                            <td>{{ $test_schedule->file->name }}</td>
                            <td>{{ $test_schedule->file->user->first_name }} {{ $test_schedule->file->user->last_name }}
                            </td>

                            <td>
                                {{-- show/download form --}}
                                <div class="d-flex justify-content-center">
                                    <form action="{{ route('adverts', ['yearname' => $year->name]) }}" method="GET">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('tests.download', ['yearname' => $year->name, 'file_name' => $test_schedule->file->name]) }}"
                                            class="btn btn-outline-info     " type="button">
                                            <b>تنزيل الملف</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form>
                                    @if (Auth::user()->hasRole('mentor') || Auth::user()->hasRole('secretary'))
                                        @if ($test_schedule->file->user_id == Auth::user()->id)
                                            {{-- delete form --}}
                                            <div class="d-flex justify-content-center">
                                                <form
                                                    action="{{ route('tests.delete', ['yearname' => $year->name, 'test_schedule_id' => $test_schedule->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- /.card-body -->

                                                    <button class="btn btn-outline-danger" type="submit">
                                                        <b>حذف الملف</b>
                                                    </button>
                                                    <br>
                                                    </span>
                                                </form>

                                            </div>
                                        @endif
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
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
