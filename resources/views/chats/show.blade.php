@extends('layouts.master')

@section('title')
    عرض تفاصيل غرفة المناقشة الإدارية
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم
@endsection

@section('son1')
    غرف المناقشة
@endsection

@section('son2')
    عرض تفاصيل غرفة المناقشة الإدارية
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">


        <br>
        <div class="card card-teal ">
            <div class="card-header">
                <h1 class="card-title col-md-7">
                    <b>
                        البيانات
                    </b>
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

                    <div class="form-group text-gray col-lg-6">
                        <label for="target">ملخص المحادثة </label>
                        <br>
                        {{ $chat->target }}
                    </div>

                    <div class="form-group text-gray col-lg-6">
                        <label for="created_at">تاريخ الإضافة</label>
                        <br>
                        {{ Carbon\Carbon::parse($chat->created_at)->format('l j/n/Y') }}
                    </div>

                </div>
                <br>
                <hr class="bg-green">
                <br>
                <div class="row">

                    <div class="form-group text-gray col-lg-12">
                        <label for="summery">التفاصيل </label>
                        <br>
                        {{ $chat->summery }}
                    </div>

                    <br>
                </div>

                <!-- /.card-body -->
                <br>


            </div>
            <!-- /.card -->

        </div>

        <br>
    </div>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
