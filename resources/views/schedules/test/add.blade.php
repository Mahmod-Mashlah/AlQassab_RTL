@extends('layouts.master')

@section('title')
    إضافة إعلان جديد
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    الإعلانات
@endsection

@section('son2')
    إضافة إعلان جديد
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->

        <div class="card card-teal">
            <div class="card-header">

                <h1 class="card-title col-md-7"><b>بيانات الإعلان</b></h1>
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
            <form method="Post" action="{{ route('adverts.add', ['yearname' => $year->name]) }}">
                @csrf
                @method('Post')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group text-gray col-md-8">
                            <label for="title">عنوان الإعلان</label>
                            <input id="title" class="form-control bg- light" type="text" name="title" required />
                        </div>

                        <div class="form-group text-gray col-md-4">
                            <label for="target">الجهة المستهدفة</label>
                            <input id="target" class="form-control bg- light" type="text" name="target" required />
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-md-12">
                            <label for="body">تفاصيل الإعلان </label>
                            <input id="body" class="form-control bg- light" type="text" name="body" />
                        </div>

                    </div>

                </div>
                <div class="col-md-12  justify-content-center align-items-center">
                    <button class="btn btn-outline-success col  justify-content-center align-items-center" type="submit">
                        <b>إضافة</b>
                    </button>
                </div>
                <br>
            </form>
            <!-- /.card -->
        </div>
        <!-- /.card -->
    </div>
    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
