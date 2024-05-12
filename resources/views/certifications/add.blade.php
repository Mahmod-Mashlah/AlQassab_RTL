@extends('layouts.master')

@section('title')
    إضافة شهادة جديدة
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم
@endsection

@section('son1')
    الموظفين
@endsection

@section('son2')
    إضافة شهادة جديدة
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->
        <div class="card card-teal">
            <div class="card-header">
                <h1 class="card-title col-md-7"><b> إضافة شهادة جديدة </b></h1>
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
            <form method="Get"
                action="{{ route('employees-edit', [
                    'name' => 'Ahmad',
                    // $val->id
                ]) }}">
                @csrf
                @method('Get')
                <div class="card-body">
                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">المرتبة</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">الدرجة</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>

                        <div class="form-group text-dark col-sm-4">
                            <label for="date">تاريخ الترفيع</label>
                            <input id="date" class="form-control bg- light" type="date" name="date" required />
                            {{-- Validation message --}}
                            @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم الشهادة </label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>



                        <div class="form-group text-dark col-sm-4">
                            <label for="date">تاريخ الحصول عليها</label>
                            <input id="date" class="form-control bg- light" type="date" name="date" required />
                            {{-- Validation message --}}
                            @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">الكلية المنتسب إلبها</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group text-green col-lg-4">
                            <label for="name">العقوبات </label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>

                        <div class="form-group text-green col-lg-8">
                            <label for="name">الملاحظات </label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>
                        <br>
                        <div class="card-footer">

                            <a href="{{ route('certifications-add', [
                                'name' => 'Ahmed',
                                // $val->id
                            ]) }}"
                                class="btn btn-outline-success col d-flex justify-content-center" type="button">
                                <b>إضافة</b>
                            </a>
                        </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.card -->
    <!-- /.card -->
    </div>
    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
