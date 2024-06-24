@extends('layouts.master')
@section('title')
    البرامج
@endsection {{-- or @stop --}}
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
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <br>
            {{-- Rows --}}
            <div class="row d-flex justify-content-center">

                <!-- ./col -->
                <div class="col-md-8 col-6">
                    <!-- small card -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h5 class="text-white col-12"> جداول الحصص اليومية</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fas fa fa-th"></i>
                        </div>
                        <a href="{{ route('daily', ['yearname' => $year->name]) }}" target="_blank" class="small-box-footer">
                            <h6 class="text-white">عرض <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            {{-- ./row --}}
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-4">
                    <!-- small card -->
                    <div class="small-box bg-cyan">
                        <div class="inner">
                            <h5 class="text-white col-12">برامج المذاكرات</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fas fa fa-chevron-circle-down"></i>
                        </div>
                        <a href="{{ route('schedules.tests', ['yearname' => $year->name]) }}" target="_blank"
                            class="small-box-footer">
                            <h6 class="text-white">عرض <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            <div class="row d-flex justify-content-center">

                <div class="col-md-8 col-3">
                    <!-- small card -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h5 class="text-white col-12">برنامج الامتحانات</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fas fa fa-arrow-circle-down"></i>
                        </div>
                        <a href="{{ route('schedules.exams', ['yearname' => $year->name]) }}" target="_blank"
                            class="small-box-footer">
                            <h6 class="text-white">عرض <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@section('scipts')
    {{-- Scripts here --}}
@endsection
