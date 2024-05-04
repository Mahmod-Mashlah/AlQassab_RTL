@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    الملاحظات السلوكية
@endsection {{-- or @stop --}}

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    الرئيسية
@endsection

@section('son1')
    الملاحظات السلوكية
@endsection

@section('son2')
    {{-- son2 --}}
@endsection

@section('content')
    {{-- content --}}


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
            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الطالب</th>
                        <th>الصف</th>
                        <th>الشعبة</th>
                        <th>نوع الملاحظة </th>
                        <th>التفاصيل</th>
                        <th>الملفات المرفقة</th>
                        <th>تاريخ إضافة الملاحظة</th>
                        <th>العمليات المتاحة</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>محمد كامل</td>
                        <td>وليد</td>
                        <td>-</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>

                            {{-- edit form --}}
                            <div class="d-flex justify-content-center">
                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('behavioral-notes-edit') }}" class="btn btn-outline-info     "
                                        type="button">
                                        <b>تعديل</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                {{-- delete form --}}
                                <div class="d-flex justify-content-center">
                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('behavioral-notes-delete') }}" class="btn btn-outline-danger     "
                                            type="button">
                                            <b>حذف</b>
                                        </a>
                                        <br>
                                        </span>

                                    </form>

                                </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>كامل وليد</td>
                        <td>خالد</td>
                        <td>-</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>

                            {{-- edit form --}}
                            <div class="d-flex justify-content-center">
                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('behavioral-notes-edit') }}" class="btn btn-outline-info     "
                                        type="button">
                                        <b>تعديل</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                {{-- delete form --}}
                                <div class="d-flex justify-content-center">
                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('behavioral-notes-delete') }}" class="btn btn-outline-danger     "
                                            type="button">
                                            <b>حذف</b>
                                        </a>
                                        <br>
                                        </span>

                                    </form>

                                </div>
                        </td>
                    </tr>

                    <tr>
                        <form action="{{ url('/groups/add', []) }}" method="POST">
                            @csrf

                            <!-- /.card-body -->

                            <a href="{{ route('behavioral-notes-types-add') }}" class="btn  btn-outline-success "
                                type="button">
                                <b>إضافة ملاحظة جديدة</b>
                            </a>
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
            <form action="{{ url('/groups/add', []) }}" method="POST">
                @csrf

                <!-- /.card-body -->

                {{-- Button with insert --}}
                <div class="d-flex justify-content-center">
                    <div class="input-group mb-6 col-md-10">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-outline-success"><b>إضافة نوع جديد</b></button>
                        </div>
                        <!-- /btn-group -->
                        <input type="text" class="form-control">

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

                        <tr>
                            <td>1</td>
                            <td>التدخين</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('behavioral-notes-types-delete') }}"
                                            class="btn btn-outline-danger     " type="button">
                                            <b>حذف</b>
                                        </a>
                                        <br>
                                        </span>

                                    </form>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>كامل وليد</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('behavioral-notes-types-delete') }}"
                                            class="btn btn-outline-danger     " type="button">
                                            <b>حذف</b>
                                        </a>
                                        <br>
                                        </span>

                                    </form>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>خالد إسماعيل</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('behavioral-notes-types-delete') }}"
                                            class="btn btn-outline-danger     " type="button">
                                            <b>حذف</b>
                                        </a>
                                        <br>
                                        </span>

                                    </form>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>عبد الرحمن سعد</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('behavioral-notes-types-delete') }}"
                                            class="btn btn-outline-danger     " type="button">
                                            <b>حذف</b>
                                        </a>
                                        <br>
                                        </span>

                                    </form>

                                </div>
                            </td>
                        </tr>

                        <br>

                    </tbody>

                </table>
            </div>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
