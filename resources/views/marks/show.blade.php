@extends('layouts.master')

@section('title')
    عرض علامات الطالب {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    الطلاب
@endsection

@section('son2')
    العلامات
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <div class="justify-content-center">
            <h5 class="text-yellow">علامات الطالب {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }} في
                الصف
                {{ $class->name }}
            </h5>
        </div>
        <br><br>
        @foreach ($all_marks as $mark)
            @php
                $subjects_id = $mark->subject->id;
                $seasons_number1_id = App\Models\Season::where('year_id', $year->id)
                    ->where('number', 1)
                    ->pluck('id');

                $seasons_number2_id = App\Models\Season::where('year_id', $year->id)
                    ->where('number', 2)
                    ->pluck('id');
                $homework1 = App\Models\Homework::where('student_id', $student->user->id)
                    ->where('subject_id', $subjects_id)
                    ->where('season_id', $seasons_number1_id)
                    ->first();
                $h1_mark = $homework1->mark;
                // $h1_mark = $homework1->pluck('mark');
                // $h1_mark = $homework1->getIntegerMark;

                $homework2 = App\Models\Homework::where('student_id', $student->user->id)
                    ->where('subject_id', $subjects_id)
                    ->where('season_id', $seasons_number2_id)
                    ->first();
                $h2_mark = $homework2->mark;
                // $h2_mark = $homework2->pluck('mark');
                // $h2_mark = $homework2->getIntegerMark;

                $test1 = App\Models\Test::where('student_id', $student->user->id)
                    ->where('subject_id', $subjects_id)
                    ->where('season_id', $seasons_number1_id)
                    ->first();
                $t1_mark = $test1->mark;
                // $t1_mark = $test1->pluck('mark');
                // $t1_mark = $test1->getIntegerMark;

                $test2 = App\Models\Test::where('student_id', $student->user->id)
                    ->where('subject_id', $subjects_id)
                    ->where('season_id', $seasons_number2_id)
                    ->first();
                $t2_mark = $test2->mark;
                // $t2_mark = $test2->pluck('mark');
                // $t2_mark = $test2->getIntegerMark;

                $exam1 = App\Models\Exam::where('student_id', $student->user->id)
                    ->where('subject_id', $subjects_id)
                    ->where('season_id', $seasons_number1_id)
                    ->first();
                $e1_mark = $exam1->mark;
                // $e1_mark = $exam1->pluck('mark');
                // $e1_mark = $exam1->getIntegerMark;

                $exam2 = App\Models\Exam::where('student_id', $student->user->id)
                    ->where('subject_id', $subjects_id)
                    ->where('season_id', $seasons_number2_id)
                    ->first();
                $e2_mark = $exam2->mark;
                // $e2_mark = $exam2->pluck('mark');
                // $e2_mark = $exam2->getIntegerMark;
            @endphp
            <div class="card card-teal " id="{{ $mark->subject->id }}">
                <div class="card-header">
                    <h1 class="card-title col-md-7">
                        <b>
                            مادة {{ $mark->subject->name }} , الدرجة الصغرى : {{ $mark->subject->min }} , الدرجة العظمى :
                            {{ $mark->subject->max }}
                        </b>
                    </h1>
                    <div class="card-tools">

                        <button type="button" class="btn btn-tool " data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
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
                    <div class="justify-content-center">
                        <h5 class="text-green">الفصل الأول :
                        </h5>
                    </div>
                    <br>
                    <div class="row">

                        <div class="form-group text-gray col-sm-3">
                            <label for="homework1">الاختبارات الشفهية والوظائف</label>
                            <br>
                            {{ $h1_mark }}
                        </div>
                        <div class="form-group text-gray col-sm-3">
                            <label for="test1">الاختبارات الشهرية (المذاكرات) </label>
                            <br>
                            {{ $h2_mark }}
                        </div>

                        <div class="form-group text-gray col-sm-3">
                            <label for="exam1">درجة الامتحان</label>
                            <br>
                            {{ $e1_mark }}
                        </div>


                        <div class="form-group text-gray col-sm-3">
                            <label for="sum1">المجموع (المحصلة الأولى)</label>
                            <br>
                            {{ $mark->sum1 }}
                        </div>

                    </div>

                    <hr class="bg-green">

                    <div class="row">
                        <div class="justify-content-center">
                            <h5 class="text-green">الفصل الثاني :
                            </h5>
                        </div>
                        <br><br>
                        <div class="row">

                            <div class="form-group text-gray col-sm-3">
                                <label for="homework2">الاختبارات الشفهية والوظائف</label>
                                <br>
                                {{ $h2_mark }}
                            </div>
                            <div class="form-group text-gray col-sm-3">
                                <label for="test1">الاختبارات الشهرية (المذاكرات) </label>
                                <br>
                                {{ $t2_mark }}
                            </div>

                            <div class="form-group text-gray col-sm-3">
                                <label for="exam1">درجة الامتحان</label>
                                <br>
                                {{ $e2_mark }}
                            </div>

                            <div class="form-group text-gray col-sm-3">
                                <label for="sum2">المجموع (المحصلة الثانية)</label>
                                <br>
                                {{ $mark->sum2 }}
                            </div>

                        </div>

                        <hr class="bg-green">


                    </div>

                    <div class="row">
                        <div class="justify-content-center">
                            <h5 class="text-green">النتيجة النهائية :
                            </h5>
                        </div>
                        <br><br>
                        <div class="row">

                            <div class="form-group text-gray col-sm-3">
                                <label for="final_sum">مجموع المحصلتين</label>
                                <br>
                                {{ $mark->final_sum }}
                            </div>
                            <div class="form-group text-gray col-sm-3">
                                <label for="final_result">الدرجة النهائية</label>
                                <br>
                                {{ $mark->final_result }}
                            </div>

                        </div>
                    </div>

                    <hr class="bg-green">


                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
            <br>
        @endforeach

    </div>

    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
