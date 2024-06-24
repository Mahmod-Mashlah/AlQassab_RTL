@extends('layouts.master')

@section('title')
    إضافة برنامج مذاكرات جديد
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    البرامج
@endsection

@section('son2')
    إضافة برنامج مذاكرات جديد
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->

        <div class="card card-teal">
            <div class="card-header">

                <h1 class="card-title col-md-7"><b>بيانات برنامج المذاكرات</b></h1>
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
            <form method="Post" action="{{ route('tests.add', ['yearname' => $year->name]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('Post')

                <div class="card-body">
                    <br>
                    <div class="row">

                        <div class="form-group text-gray col-lg-6">

                            <label for="season_id">الفصل الدراسي</label>
                            {{-- <input id="season_id" season="form-control bg- light" type="text" name="season_id"
                                required /> --}}
                            <br>
                            <select class="form-control bg-light" id="season_id" name="season_id" required>
                                @foreach ($seasons as $season)
                                    <option season="form-control bg-light" value="{{ $season->id }}">
                                        {{ $season->number }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-gray col-lg-6">
                            <label for="target">الملف</label>
                            <input id="file" class="form-control bg-light" type="file" name="file" required />
                        </div>

                    </div>

                    <br>

                </div>
                <div class="col-md-12  justify-content-center align-items-center">
                    <button class="btn btn-outline-success col  justify-content-center align-items-center" type="submit">
                        <b>إضافة</b>
                    </button>
                    <br>
                </div>
            </form>
            <br>
            <!-- /.card -->
        </div>

        <!-- /.card -->
    </div>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
