@extends('layouts.master')
@section('title')
    لوحة التحكم
@endsection {{-- or @stop --}}
@section('css')
    {{-- Css here --}}
@endsection


@section('root')
    لوحة التحكم
@endsection

@section('son1')
@endsection

@section('son2')
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <br>
            {{-- Rows --}}
            <div class="row">


                <!-- ./col -->
                <div class="col-md-4 col-3">
                    <!-- small card -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h5 class="text-white">الصفوف والشعب والمواد</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fas fa fa-th"></i>
                        </div>
                        <a href="{{ url('./web/employees', []) }}" target="_blank" class="small-box-footer">
                            <h6 class="text-white">إدارة <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-md-4 col-3">
                    <!-- small card -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h5 class="text-white">الموظفين</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fas fa fa-address-card"></i>
                        </div>
                        <a href="{{ url('./web/employees', []) }}" target="_blank" class="small-box-footer">
                            <h6 class="text-white">إدارة <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-4 col-3">
                    <!-- small card -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h5 class="text-white">الطلاب</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fas fa fa-users"></i>
                        </div>
                        <a href="{{ url('./web/employees', []) }}" target="_blank" class="small-box-footer">
                            <h6 class="text-white">إدارة <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            {{-- ./row --}}
            <div class="row">


                <!-- ./col -->
                <div class="col-md-4 col-3">
                    <!-- small card -->
                    <div class="small-box bg-cyan">
                        <div class="inner">
                            <h5 class="text-white">العلامات</h5>
                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fas fa fa-check-square "></i>
                        </div>
                        <a href="{{ url('./web/employees', []) }}" target="_blank" class="small-box-footer">
                            <h6 class="text-white">إدارة <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-md-4 col-3">
                    <!-- small card -->
                    <div class="small-box bg-cyan">
                        <div class="inner">
                            <h5 class="text-white">السجلات الصادرة</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fas fa fa-arrow-circle-up "></i>
                        </div>
                        <a href="{{ url('./web/employees', []) }}" target="_blank" class="small-box-footer">
                            <h6 class="text-white">إدارة <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-4 col-3">
                    <!-- small card -->
                    <div class="small-box bg-cyan">
                        <div class="inner">
                            <h5 class="text-white">السجلات الواردة</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fas fa fa-arrow-circle-down"></i>
                        </div>
                        <a href="{{ url('./web/employees', []) }}" target="_blank" class="small-box-footer">
                            <h6 class="text-white">إدارة <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            {{-- ./row --}}
            <div class="row">


                <!-- ./col -->
                <div class="col-md-4 col-3">
                    <!-- small card -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h5 class="text-white">الإعلانات</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fa fa-audio-description" aria-hidden="true"></i>
                        </div>
                        <a href="{{ url('./web/employees', []) }}" target="_blank" class="small-box-footer">
                            <h6 class="text-white">إدارة <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-md-4 col-3">
                    <!-- small card -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h5 class="text-white">الجدول اليومي للحصص</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fa fa-calculator"></i>
                        </div>
                        <a href="{{ url('./web/employees', []) }}" target="_blank" class="small-box-footer">
                            <h6 class="text-white">إدارة <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-4 col-3">
                    <!-- small card -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h5 class="text-white">الدفاتر ووثائق الطلاب</h5>

                            {{-- <p class="text-white">2</p> --}}
                        </div>
                        <br>
                        <br>
                        <div class="icon">
                            <i class="fas fa fa-sticky-note "></i>
                        </div>
                        <a href="{{ url('./web/employees', []) }}" target="_blank" class="small-box-footer">
                            <h6 class="text-white">إدارة <i class="fas fa-arrow-circle-right"></i></h6>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            {{-- ./row --}}

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@section('scipts')
    {{-- Scripts here --}}
@endsection
