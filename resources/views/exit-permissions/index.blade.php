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
    الرئيسية
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
            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الطالب</th>
                        <th>الصف</th>
                        <th>الشعبة</th>
                        <th>اسم الطالب</th>
                        <th>السبب</th>
                        <th>اليوم</th>
                        <th>التاريخ</th>
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
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>خالد إسماعيل</td>
                        <td>تامر</td>
                        <td>-</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>عبد الرحمن سعد</td>
                        <td>محمد</td>
                        <td>-</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                    </tr>
                    <tr>
                        <form action="{{ url('/groups/add', []) }}" method="POST">
                            @csrf

                            <!-- /.card-body -->

                            <a href="{{ route('exit-permissions-add') }}" class="btn  btn-outline-success " type="button">
                                <b>إضافة طلب إذن</b>
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
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
