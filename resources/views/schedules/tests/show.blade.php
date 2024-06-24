@extends('layouts.master')

@section('title')
    عرض الإعلان {{ $advert->id }}
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم
@endsection

@section('son1')
    الإعلانات
@endsection

@section('son2')
    عرض تفاصيل الإعلان {{ $advert->id }}
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
                        تفاصيل الإعلان
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

                    <div class="form-group text-gray col-sm-3">
                        <label for="target">الجهة المستهدفة</label>
                        <br>
                        {{ $advert->target }}
                    </div>

                    <div class="form-group text-gray col-sm-3">
                        <label for="created_at">تاريخ الإعلان</label>
                        <br>
                        {{ Carbon\Carbon::parse($advert->created_at)->format('l j/n/Y') }}
                    </div>

                    <div class="form-group text-gray col-sm-3">
                        <label for="admin_name">اسم ناشر الإعلان</label>
                        <br>
                        {{ $advert->user->first_name }} {{ $advert->user->last_name }}</td>
                    </div>

                    <div class="form-group text-gray col-sm-3">
                        <label for="admin_role">دور ناشر الإعلان</label>
                        <br>
                        {{ $advert->user->roles()->first()->display_name }}
                    </div>

                </div>
                <br>
                <hr class="bg-green">
                <br>
                <div class="row">

                    <div class="form-group text-gray col-sm-6">
                        <label for="title">عنوان الإعلان</label>
                        <br>
                        {{ $advert->title }}
                    </div>

                    <div class="form-group text-gray col-sm-6">
                        <label for="body">تفاصيل الإعلان </label>
                        <br>
                        {{ $advert->body }}
                    </div>


                </div>
                <br>
            </div>

            <!-- /.card-body -->
            <br>


        </div>
        <!-- /.card -->

    </div>

    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
