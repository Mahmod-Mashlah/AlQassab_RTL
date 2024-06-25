@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    الشكاوى
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
    الشكاوى
@endsection

@section('son2')
    {{-- son2 --}}
@endsection

@section('content')
    {{-- content --}}


    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-6"><b>الشكاوى</b></h1>
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

            @if (Auth::user()->roles()->first()->name == 'mentor' || Auth::user()->roles()->first()->name == 'manager')
                <form action="{{ route('protests.create', ['yearname' => $year->name]) }}" method="GET">
                    @csrf
                    @method('Get')
                    <!-- /.card-body -->

                    <a href="{{ route('protests.create', ['yearname' => $year->name]) }}" class="btn  btn-outline-success "
                        type="button">
                        <b>إضافة شكوى جديدة</b>
                    </a>
                    <br>
                    </span>

                </form>
            @endif

            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>
                    <tr>

                        <th style="width: 5%">#</th>
                        <th style="width: 20%">اسم مقدِّم الشكوى</th>
                        <th style="width: 15%">عنوان الشكوى</th>
                        <th style="width: 43%">مضمون الشكوى</th>
                        <th style="width: 17%">تاريخ الشكوى</th>
                        @if (Auth::user()->hasRole('manager'))
                            <th style="width: 17%">حذف</th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @foreach ($protests as $protest)
                        <tr>
                            <td>{{ $protest->id }}</td>
                            <td>{{ $protest->user->first_name }}
                                {{ $protest->user->middle_name }}
                                {{ $protest->user->last_name }}
                            </td>
                            <td>{{ $protest->title }}</td>
                            <td>{{ $protest->body }}</td>
                            <td>{{ Carbon\Carbon::parse($protest->created_at)->format('l, j/n/Y') }}</td>
                            {{-- <td>{{ $protest->user->first_name }} {{ $protest->user->last_name }}</td> --}}

                            <td>

                                {{-- edit form --}}
                                <div class="d-flex justify-content-center">
                                    {{-- <form
                                        action="{{ route('protests.show', ['yearname' => $year->name, 'protest_id' => $protest->id, 'protest' => $protest]) }}"
                                        method="GET">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('protests.show', ['yearname' => $year->name, 'protest_id' => $protest->id]) }}"
                                            class="btn btn-outline-success     " type="button">
                                            <b>عرض التفاصيل</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form> --}}
                                    @if (Auth::user()->hasRole('manager'))
                                        {{-- <form action="{{ url('/groups/add', []) }}" method="POST">
                                            @csrf

                                            <!-- /.card-body -->

                                            <a href="{{ route('protests.edit', ['yearname' => $year->name, 'protest_id' => $protest->id]) }}"
                                                class="btn btn-outline-info     " type="button">
                                                <b>تعديل</b>
                                            </a>
                                            <br>
                                            </span>
                                        </form> --}}

                                        {{-- delete form --}}
                                        <div class="d-flex justify-content-center">
                                            <form
                                                action="{{ route('protests.delete', ['yearname' => $year->name, 'protest_id' => $protest->id]) }}"
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
