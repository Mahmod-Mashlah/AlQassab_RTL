@extends('layouts.master')

@section('title')
    إضافة طلب إذن جديد
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    طلبات الإذن
@endsection

@section('son2')
    إضافة طلب إذن جديد
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->

        <div class="card card-teal">
            <div class="card-header">

                <h1 class="card-title col-md-7"><b>بيانات الطلب</b></h1>
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
            <form method="Post" action="{{ route('exit-permissions.add', ['yearname' => $year->name]) }}">
                @csrf
                @method('Post')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="student_id"> اسم الطالب ( سيتم اختيار رقم ولكن يمكن البحث بالاسم) </label>
                            {{-- <input id="student_id" class="form-control bg- light" type="text" name="student_id"
                                required /> --}}
                            <br>
                            <input list="mylist" id="student_id" name="student_id" class="form-control bg- light"
                                required />
                            <datalist id="mylist">
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

                        <div class="form-group text-gray col-sm-4">
                            <label for="class_id">الصف</label>
                            {{-- <input id="class_id" class="form-control bg- light" type="text" name="class_id"
                                required /> --}}
                            <br>
                            <select class="form-control bg-light" id="class_id" name="class_id" required>
                                @foreach ($classes as $class)
                                    <option class="form-control bg-light" value="{{ $class->id }}">
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-gray col-md-4">
                            <label for="date">تاريخ إعطاء طلب الإذن </label>
                            <input id="date" class="form-control bg- light" type="date" name="date" required />
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group text-gray col-md-12">
                            <label for="reason">السبب </label>
                            <input id="reason" class="form-control bg- light" type="text" name="reason" required />
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
    <script>
        $(document).ready(function() {
            $('#mySelect').select2({
                placeholder: 'Select an option',
                ajax: {
                    url: '/search',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 10) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function(markup) {
                    return markup;
                },
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            function formatRepo(repo) {
                if (repo.loading) return repo.text;
                var markup = '<div>' + repo.name + '</div>';
                return markup;
            }

            function formatRepoSelection(repo) {
                return repo.name || repo.text;
            }
        });
    </script>
@endsection
