@extends('layouts.master')

@section('title')
    إضافة ملاحظة سلوك جديدة
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم
@endsection

@section('son1')
    الملاحظات السلوكية
@endsection

@section('son2')
    إضافة ملاحظة سلوك جديدة
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->
        <div class="card card-teal ">
            <div class="card-header">
                <h3 class="card-title col-lg-7">إضافة ملاحظة سلوك جديدة</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <form method="Post" action="{{ route('behavioral-notes.add', ['yearname' => $year->name]) }}">
                    @csrf
                    @method('Post')

                    <div class="row">

                        <div class="form-group text-gray col-sm-6">
                            <label for="student_id"> اسم الطالب ( سيتم اختيار رقم ولكن يمكن البحث بالاسم) </label>
                            {{-- <input id="student_id" class="form-control bg- light" type="text" name="student_id"
                                required /> --}}
                            <br>
                            <input list="note_types_list" id="student_id" name="student_id" class="form-control bg-light"
                                required />
                            <datalist id="note_types_list">
                                @foreach ($students as $student)
                                    <option class="form-control bg-light" value="{{ $student->id }}">
                                        {{ $student->user->first_name }}
                                        {{ $student->user->middle_name }}
                                        {{ $student->user->last_name }}
                                    </option>
                                @endforeach
                            </datalist>
                            {{-- <input type="hidden" id="group_id" name="group_id"
                                                        value="{{ $group->id }}"> --}}
                            {{-- <select class="form-control bg-light" id="student_id" name="student_id" required>
                                @foreach ($students as $student)
                                    <option class="form-control bg-light" value="{{ $student->id }}">
                                        {{ $student->user->first_name }}
                                        {{ $student->user->middle_name }}
                                        {{ $student->user->last_name }}
                                    </option>
                                @endforeach
                            </select> --}}
                        </div>

                        <div class="form-group text-gray col-sm-6">
                            <label for="note_id">نوع الملاحظة</label>
                            {{-- <input id="note_id" class="form-control bg- light" type="text" name="note_id"
                                required /> --}}
                            <br>
                            <input list="mylist" id="note_id" name="note_id" class="form-control bg-light" required />
                            <datalist id="mylist">
                                @foreach ($notes_types as $notes_type)
                                    <option class="form-control bg-light" value="{{ $notes_type->id }}">
                                        {{ $notes_type->name }}
                                    </option>
                                @endforeach
                            </datalist>
                            {{-- <input type="hidden" id="group_id" name="group_id"
                                                        value="{{ $group->id }}"> --}}
                            {{-- <select class="form-control bg-light" id="note_id" name="note_id" required>
                                @foreach ($students as $student)
                                    <option class="form-control bg-light" value="{{ $student->id }}">
                                        {{ $student->user->first_name }}
                                        {{ $student->user->middle_name }}
                                        {{ $student->user->last_name }}
                                    </option>
                                @endforeach
                            </select> --}}
                        </div>

                        {{-- <div class="form-group text-gray col-md-4">
                            <label for="date">تاريخ إعطاء طلب الإذن </label>
                            <input id="date" class="form-control bg- light" type="date" name="date" required />
                        </div> --}}

                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-md-12">
                            <label for="details">التفاصيل </label>
                            <input id="details" class="form-control bg-light" type="text" name="details" />
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
            <!-- /.card-body -->
            <br>

            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
