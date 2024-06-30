@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    الملاحظات السلوكية
@endsection {{-- or @stop --}}

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    الملاحظات السلوكية
@endsection

@section('son2')
    {{-- son2 --}}
@endsection

@section('content')
    {{-- content --}}
   @if (Auth::user()->hasRole('mentor'))

    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-7"><b> أنواع الملاحظات </b></h1>
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
            <form action="{{ route('behavioral-notes-types.add', ['yearname'=> $yearname]) }}" method="Post">
                @csrf
                @method('Post')
                <!-- /.card-body -->

                {{-- Button with insert --}}
                <div class="form-group text-gray ">
                        </div>
               <span>
                <div class="d-flex justify-content-center ">
                    <div class="input-group col-md-10">

                        <div class="input-group-prepend">

                            <button type="submit" class="btn btn-outline-success"><b>إضافة نوع جديد</b></button>
                        </div>
                        <!-- /btn-group -->
                            <input id="name" class="form-control bg-light  align-items-center justify-content-center" type="text" name="name"
                            placeholder="أدخل نوع الملاحظات الذي ترغب بإضافته" required />

                    </div>
                </div>
                </span>

            </form>
            <br>
            <div class="d-flex justify-content-center">
                <table id="example2" class="table table-bordered  bg-white col-md-6">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                <div class="d-flex justify-content-center">
                                    نوع الملاحظة
                                </div>
                            </th>
                            <th>
                                <div class="d-flex justify-content-center">
                                    حذف نوع الملاحظة
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($notes_types as $note_type)
                        <tr>

                            <td>{{ $note_type->id }}</td>
                            <td>{{ $note_type->name }}</td>
                            <td>

                                {{-- edit form --}}
                                <div class="d-flex justify-content-center">

                                       {{-- delete form --}}
                                        <div class="d-flex justify-content-center">
                                            <form
                                                action="{{ route('behavioral-notes-types.delete', ['yearname' => $year->name, 'note_type_id' => $note_type->id]) }}"
                                                method="Post">
                                                @csrf
                                                @method('Post')
                                                <!-- /.card-body -->

                                                <button class="btn btn-outline-danger" type="submit">
                                                    <b>حذف</b>
                                                </button>
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


        </div>
        <!-- /.card-body -->
    </div>
    @endif

    <!-- /.card -->

    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-7"><b>الملاحظات السلوكية</b></h1>
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

            @if (Auth::user()->hasRole('mentor')
            // || Auth::user()->roles()->first()->name == 'manager'
            )
                <form action="{{ route('behavioral-notes.create', ['yearname' => $year->name]) }}" method="Get">
                    @csrf
                    @method('Get')
                    <!-- /.card-body -->

                    <a href="{{ route('behavioral-notes.create', ['yearname' => $year->name]) }}" class="btn  btn-outline-success "
                        type="button">
                        <b>إضافة ملاحظة سلوك جديدة</b>
                    </a>
                    <br>
                    </span>

                </form>
            @endif

            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 33%">اسم الطالب</th>
                        <th style="width: 20%">نوع الملاحظة </th>
                        <th style="width: 17%">تاريخ إضافة الملاحظة</th>
                        <th style="width: 25%">عرض تفاصيل أكثر</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($notes as $note)
                    <tr>
                        <td>{{ $note->id }}</td>
                        <td>{{ $note->student->first_name }} {{ $note->student->middle_name }} {{ $note->student->last_name }}</td>
                        {{-- <td>{{ $note->type }}</td> --}}
                        <td>{{ $note->type }}</td>
                        <td>{{ Carbon\Carbon::parse($note->created_at)->format('l, j/n/Y') }}</td>

                        <td>

                                {{-- delete form --}}
                                <div class="d-flex justify-content-center">
                                    <form action="{{ route('behavioral-notes.show', ['yearname' => $year->name, 'behavioral_note_id' => $note->id]) }}" method="GET">
                                        @csrf
                                        @method('Get')
                                        <!-- /.card-body -->

                                        <a href="{{ route('behavioral-notes.show', ['yearname' => $year->name, 'behavioral_note_id' => $note->id]) }}" class="btn btn-outline-success"
                                            type="button">
                                            <b>عرض التفاصيل</b>
                                        </a>
                                        <br>
                                        </span>

                                    </form>

                                </div>
                        </td>
                    </tr>
                     @endforeach

                            <br>
                            </span>

                        </form>
                    </tr>
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
