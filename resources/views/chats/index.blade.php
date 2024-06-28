@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    غرف المناقشة الإدارية
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
    غرف المناقشة الإدارية
@endsection

@section('son2')
    {{-- son2 --}}
@endsection

@section('content')
    {{-- content --}}


    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-6"><b>البيانات</b></h1>
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
            <form action="{{ route('chats.create', ['yearname' => $year->name]) }}" method="GET">
                @csrf
                @method('Get')
                <!-- /.card-body -->

                <a href="{{ route('chats.create', ['yearname' => $year->name]) }}" class="btn  btn-outline-success "
                    type="button">
                    <b>إضافة غرفة مناقشة جديدة</b>
                </a>
                <br>
                </span>

            </form>
            {{-- @endif --}}

            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 55%">ملخص المحادثة</th>
                        <th style="width: 16%">تاريخ الإضافة</th>
                        <th style="width: 24%">العمليات المتاحة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chats as $chat)
                        <tr>
                            <td>{{ $chat->id }}</td>
                            <td>{{ $chat->target }}</td>
                            <td>{{ Carbon\Carbon::parse($chat->created_at)->format('l, j/n/Y') }}</td>
                            {{-- <td>{{ $chat->user->first_name }} {{ $chat->user->last_name }}</td> --}}
                            <td>

                                {{-- edit form --}}
                                <div class="d-flex justify-content-center">
                                    <form
                                        action="{{ route('chats.show', ['yearname' => $year->name, 'chat_id' => $chat->id]) }}"
                                        method="GET">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('chats.show', ['yearname' => $year->name, 'chat_id' => $chat->id]) }}"
                                            class="btn btn-outline-success     " type="button">
                                            <b>عرض التفاصيل</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form>
                                    {{-- @if (Auth::user()->roles()->first()->name == 'mentor' || Auth::user()->roles()->first()->name == 'manager') --}}
                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('chats.edit', ['yearname' => $year->name, 'chat_id' => $chat->id]) }}"
                                            class="btn btn-outline-info     " type="button">
                                            <b>تعديل</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form>

                                    {{-- delete form --}}
                                    <div class="d-flex justify-content-center">
                                        <form
                                            action="{{ route('chats.delete', ['yearname' => $year->name, 'chat_id' => $chat->id]) }}"
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
