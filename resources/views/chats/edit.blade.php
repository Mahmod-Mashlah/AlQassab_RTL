@extends('layouts.master')

@section('title')
    تعديل غرفة مناقشة
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    غرف المناقشة الإدارية
@endsection

@section('son2')
    تعديل غرفة مناقشة
@endsection


@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->
        <div class="card card-teal ">
            <div class="card-header">
                <h3 class="card-title col-lg-7">التعديلات</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method="POST" action="{{ route('chats.update', ['yearname' => $year->name, 'chat_id' => $chat->id]) }}">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group text-gray col-md-12">
                            <label for="target">ملخص المحادثة </label>
                            <input id="target" class="form-control bg- light" type="text" name="target"
                                value="{{ old('target', $chat->target) }}" required />
                        </div>

                        <div class="form-group text-gray col-md-12">
                            <label for="summery">التفاصيل </label>
                            <input id="summery" class="form-control bg- light" type="text" name="summery"
                                value="{{ old('summery', $chat->summery) }}" required />
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
