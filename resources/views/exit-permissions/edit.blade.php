@extends('layouts.master')

@section('title')
    تعديل طلب الإذن
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    الرئيسية
@endsection

@section('son1')
    طلبات الإذن
@endsection

@section('son2')
    تعديل طلب الإذن
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->
        <div class="card card-teal ">
            <div class="card-header">
                <h3 class="card-title col-lg-7">تعديل طلب إذن </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method="Get" action="{{ route('exit-permissions') }}">
                @csrf
                @method('Get')

                <div class="card-body">

                    <div class="form-group text-dark">
                        <label for="name">اسم الطالب</label>
                        <input id="name" class="form-control bg- light" type="text" name="name" required />

                    </div>

                    <div class="form-group text-dark ">
                        <label for="date">التاريخ</label>
                        <input id="date" class="form-control bg- light" type="date" name="date" required />
                        {{-- Validation message --}}
                        @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group text-dark">
                        <label for="name">السبب</label>
                        <input id="name" class="form-control bg- light" type="text" name="name" required />

                    </div>
                </div>

                <!-- /.card-body -->
                <br>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-info col d-flex justify-content-center">تعديل</button>


                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
