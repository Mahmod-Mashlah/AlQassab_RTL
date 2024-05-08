@extends('layouts.master')

@section('title')
    إضافة إعلان
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
    إضافة إعلان
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->
        <div class="card card-teal ">
            <div class="card-header">
                <h3 class="card-title col-lg-7">إضافة إعلان جديد</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method="Get" action="{{ route('adverts') }}">
                @csrf
                @method('Get')

                <div class="card-body">

                    <div class="form-group text-dark">
                        <label for="name">عنوان الإعلان</label>
                        <input id="name" class="form-control bg- light" type="text" name="name" required />
                    </div>

                    <div class="form-group text-dark">
                        <label for="name">تفاصيل الإعلان</label>
                        <input id="name" class="form-control bg- light" type="text" name="name" required />
                    </div>

                    <div class="form-group text-dark">
                        <label for="name"> الجهة المستهدفة</label>
                        <input id="name" class="form-control bg- light" type="text" name="name" required />
                    </div>

                </div>

                <!-- /.card-body -->
                <br>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-success col d-flex justify-content-center">إضافة</button>


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
