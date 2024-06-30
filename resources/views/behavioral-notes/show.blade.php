@extends('layouts.master')

@section('title')
    عرض الملاحظة السلوكية للطالب {{ $note->student->first_name }} {{ $note->student->last_name }}
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم
@endsection

@section('son1')
    الطلاب
@endsection

@section('son2')
    عرض الملاحظة السلوكية
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">

        <br>
        <div class="card card-teal " id="123">
            <div class="card-header">
                <h1 class="card-title col-md-7">
                    <b>
                        بيانات الملاحظة </b>
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
                        <label for="first_name">اسم الطالب</label>
                        <br>
                        {{ $note->student->first_name }} {{ $note->student->middle_name }} {{ $note->student->last_name }}
                    </div>
                    <div class="form-group text-gray col-sm-4">
                        <label for="last_name">نوع الملاحظة </label>
                        <br>
                        {{ $note->type }}
                    </div>

                    <div class="form-group text-gray col-sm-4">
                        <label for="middle_name">تاريخ الملاحظة </label>
                        <br>
                        {{ $note->created_at }}
                    </div>


                </div>

                <hr class="bg-green">

                <div class="row">
                    <div class="form-group text-gray col-md-12">
                        <label for="father_work">التفاصيل </label>
                        <br>
                        {{ $note->details }}
                    </div>


                </div>
                <hr class="bg-green">
                @if (Auth::user()->hasRole('mentor'))
                    <div class="row">
                        <div class="form-group text-gray col">
                            <h5 class="form-group text-gray text-align-center justify-content-center">
                                <b>
                                    العمليات المتاحة
                                </b>
                            </h5>

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

                                {{-- edit form --}}
                                <form
                                    action="{{ route('behavioral-notes.delete', ['yearname' => $year->name, 'behavioral_note_id' => $note->id]) }}"
                                    method="POST">
                                    @csrf

                                    <!-- /.card-body -->
                                    {{-- 🙂🙂🙂🙂🙂🙂🙂 تعديل بيانات الملاحظة السلوكية 🙂🙂🙂🙂🙂🙂🙂 --}}
                                    {{-- <a href="{{ route('behavioral-notes.edit', ['yearname' => $year->name, 'behavioral_note_id' => $note->id]) }}"
                                        class="btn btn-outline-info" type="button">
                                        <b>تعديل بيانات الملاحظة السلوكية</b>
                                    </a> --}}
                                    <br>
                                    </span>
                                </form>

                                {{-- delete form --}}
                                <div class="d-flex justify-content-center">
                                    <form
                                        action="{{ route('behavioral-notes.delete', ['yearname' => $year->name, 'behavioral_note_id' => $note->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <!-- /.card-body -->

                                        <button class="btn btn-outline-danger" type="submit">
                                            <b>حذف الملاحظة السلوكية مع الملفات المتعلقة بها</b>
                                        </button>
                                        <br>
                                        </span>
                                    </form>

                                </div>

                            </div>
                        </div>
                @endif
            </div>

            <!-- /.card-body -->
            <br>

        </div>
        <!-- /.card -->
        <div class="card card-teal" id="12345">
            <div class="card-header">
                <h1 class="card-title col-md-7">
                    <b>
                        الملفات المرفقة الملاحظة </b>
                </h1>
                <div class="card-tools">

                    <button type="button" class="btn btn-tool " data-card-widget="remove"><i
                            class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                            class="fas fa-expand"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
            </div>->
            <div class="card-body">

                @if (Auth::user()->roles()->first()->name == 'mentor' || Auth::user()->roles()->first()->name == 'secretary')
                    <form
                        action="{{ route('behavioral-notes-file.add', ['yearname' => $year->name, 'note_id' => $note->id]) }}"
                        method="Post" enctype="multipart/form-data">
                        @csrf
                        @method('Post')
                        <!-- /.card-body -->
                        <h6 class="text-gray">
                            <b>إضافة ملف جديد للملاحظة : </b>
                        </h6>
                        <br>
                        <input id="file" class="form-control bg-light" type="file" name="file" required />
                        <br>
                        <button class="btn  btn-outline-success " type="submit">
                            <b>إضافة</b>
                        </button>
                        <br>
                        </span>

                    </form>
                @endif

                <table id="example2" class="table table-bordered table-striped bg-white">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 30%">اسم الملف</th>
                            <th style="width: 15%">تاريخ إضافة الملف</th>
                            <th style="width: 30%">العمليات المتاحة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes_files as $notes_file)
                            <tr>
                                <td>{{ $notes_file->id }}</td>
                                <td>{{ $notes_file->name }}
                                    {{-- {{ $notes_file->id }} --}}
                                </td>
                                <td>{{ Carbon\Carbon::parse($notes_file->created_at)->format('l, j/n/Y') }}</td>

                                {{-- {{ $notes_file->user->first_name }}
                                        {{ $notes_file->user->last_name }} --}}
                                </td>

                                <td>
                                    {{-- show/download form --}}
                                    <div class="d-flex justify-content-center">
                                        <form action="{{ route('adverts', ['yearname' => $year->name]) }}" method="GET">
                                            @csrf

                                            <!-- /.card-body -->

                                            <a href=
                                                 "{{ route('behavioral-notes-files.download', ['yearname' => $year->name, 'file_name' => $notes_file->name]) }}"
                                                class="btn btn-outline-info     " type="button">
                                                <b>تنزيل الملف</b>
                                            </a>
                                            <br>
                                            </span>
                                        </form>
                                        @if (Auth::user()->hasRole('mentor'))
                                            {{-- delete form --}}
                                            <div class="d-flex justify-content-center">
                                                <form
                                                    action="{{ route('behavioral-notes-files.delete', ['yearname' => $year->name, 'file_name' => $notes_file->name, 'note_id' => $note->id]) }}"
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

    </div>
    </div>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
