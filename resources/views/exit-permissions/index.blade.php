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
    لوحة التحكم
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
            <h1 class="card-title col-md-6"><b>طلبات الإذن المعطاة للطلاب</b></h1>
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
            <form action="{{ url('/groups/add', []) }}" method="POST">
                @csrf

                <!-- /.card-body -->

                <a href="{{ route('exit-permissions-add') }}" class="btn  btn-outline-success " type="button">
                    <b>إضافة طلب إذن جديد</b>
                </a>
                <br>
                </span>

            </form>
            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الطالب</th>
                        <th>الصف</th>
                        <th>الشعبة</th>
                        <th>السبب</th>
                        <th>اليوم</th>
                        <th>التاريخ</th>
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
                        <td>

                            {{-- edit form --}}
                            <div class="d-flex justify-content-center">
                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('exit-permissions-edit') }}" class="btn btn-outline-info     "
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

                                        <a href="{{ route('exit-permissions-delete') }}" class="btn btn-outline-danger     "
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
                        <td>
                            <div class="d-flex justify-content-center">
                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('exit-permissions-edit') }}" class="btn btn-outline-info     "
                                        type="button">
                                        <b>تعديل</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('exit-permissions-delete') }}" class="btn btn-outline-danger     "
                                        type="button">
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
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
