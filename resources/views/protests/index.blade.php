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
    لوحة التحكم
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
            <h1 class="card-title col-md-6"><b>شكاوى الآباء</b></h1>
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
                        <th>رقم الشكوى</th>
                        <th>اسم مقدِّم الشكوى</th>
                        <th>عنوان الشكوى</th>
                        <th>مضمون الشكوى</th>
                        <th>تاريخ الشكوى</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>محمد كامل</td>
                        <td>وليد</td>
                        <td>-</td>
                        <td>إضافة</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>كامل وليد</td>
                        <td>خالد</td>
                        <td>-</td>
                        <td>إضافة</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>خالد إسماعيل</td>
                        <td>تامر</td>
                        <td>-</td>
                        <td>إضافة</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>عبد الرحمن سعد</td>
                        <td>محمد</td>
                        <td>-</td>
                        <td>إضافة</td>
                    </tr>

                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


    <br>

    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-6"><b>شكاوى الطلاب</b></h1>

            <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
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
                        <th>رقم الشكوى</th>
                        <th>اسم مقدِّم الشكوى</th>
                        <th>عنوان الشكوى</th>
                        <th>مضمون الشكوى</th>
                        <th>تاريخ الشكوى</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>محمد كامل</td>
                        <td>وليد</td>
                        <td>-</td>
                        <td>إضافة</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>كامل وليد</td>
                        <td>خالد</td>
                        <td>-</td>
                        <td>إضافة</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>خالد إسماعيل</td>
                        <td>تامر</td>
                        <td>-</td>
                        <td>إضافة</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>عبد الرحمن سعد</td>
                        <td>محمد</td>
                        <td>-</td>
                        <td>إضافة</td>
                    </tr>

                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
