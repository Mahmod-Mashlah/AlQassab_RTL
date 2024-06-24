@extends('layouts.master')

@section('title')
    تعديل الإعلان {{ $advert->id }}
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
    تعديل الإعلان {{ $advert->id }}
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->
        <div class="card card-teal ">
            <div class="card-header">
                <h3 class="card-title col-lg-7">تعديل الإعلان </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method="POST"
                action="{{ route('adverts.update', ['yearname' => $year->name, 'advert_id' => $advert->id]) }}">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">

                        <div class="form-group text-gray col-md-8">
                            <label for="title">عنوان الإعلان</label>
                            <input id="title" class="form-control bg- light" type="text" name="title"
                                value="{{ old('title', $advert->title) }}"required />
                        </div>

                        <div class="form-group text-gray col-md-4">
                            <label for="target">الجهة المستهدفة</label>
                            <input id="target" class="form-control bg- light" type="text" name="target"
                                value="{{ old('target', $advert->target) }}" required />
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-md-12">
                            <label for="body">تفاصيل الإعلان </label>
                            <input id="body" class="form-control bg- light" type="text" name="body"
                                value="{{ old('body', $advert->body) }}" />
                        </div>

                    </div>

                </div>
                <!-- /.card-body -->
                <br>
                <br>
                <div class="row justify-content-center">

                    <button class="btn btn-outline-info col-sm-5 col d-flex justify-content-center" type="submit">
                        <b>تعديل</b>
                    </button>
                </div>
                <br>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
