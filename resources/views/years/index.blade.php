@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    السنوات الدراسية
@endsection {{-- or @stop --}}

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    {{-- root --}}
@endsection

@section('son1')
    {{-- son1 --}}
    السنوات الدراسية
@endsection

@section('son2')
    {{-- son2 --}}
@endsection

@section('content')
    {{-- content --}}

    <div class="row">
        <div class="d-flex justify-content-center align-items-center">

            <div class="col-sm-4 col-12">
                <!-- small card -->
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h5 class="text-green">عدد الطلاب الكلي </h5>
                        <h6 class="text-dark">250</h6>

                        {{-- <h6 class="text-green">2</h6> --}}
                    </div>
                    <br>
                    <br>
                    <div class="icon">
                        <i class="fas fa fa-users"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->

            <!-- .col -->
            <div class="col-sm-4 col-3">
                <!-- small card -->
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h5 class="text-green">عدد الموظفين الكلي </h5>
                        <h6 class="text-dark">250</h6>
                    </div>
                    <br>
                    <br>
                    <div class="icon">
                        <i class="fas fa fa-address-card "></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
    {{-- ./row --}}

    <br>
    <div class=" justify-content-center align-items-center col-md-12">
        <div class="card card-teal ">
            <div class="card-header">
                <h1 class="card-title col-md-7"><b> اختر السنة الدراسية </b></h1>
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
            <div class="card-body">
                <form action="{{ url('/years/add', []) }}" method="Get">
                    @csrf
                    @method('Get')
                    <!-- /.card-body -->

                    {{-- Button with insert --}}
                    <div class="d-flex justify-content-center">
                        <div class="input-group mb-6 col-md-10">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-success"><b>إضافة سنة دراسية
                                        جديدة</b></button>
                            </div>
                            <!-- /btn-group -->
                            <input type="text" placeholder="أدخل بداية السنة فقط, مثلاً : 2024" class="form-control">

                        </div>
                    </div>
                    </span>

                </form>
                <br>
                <div class="d-flex justify-content-center">
                    <table id="example2" class="table table-bordered  bg-white col-md-6">
                        <thead>
                            <tr>

                                <th>
                                    <div class="d-flex justify-content-center">
                                        السنة الدراسية
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <form action="{{ url('/dashboard/{year}', []) }}" method="POST">
                                            @csrf
                                            <!-- /.card-body -->

                                            <a href="
                                            {{-- {{ route('dashboard') }} --}}
                                            "
                                                class="btn btn-outline-success " type="button">
                                                <b>2024</b>
                                            </a>
                                            <br>
                                            </span>

                                        </form>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <form action="{{ url('/dashboard/{year}', []) }}" method="POST">
                                            @csrf
                                            <!-- /.card-body -->

                                            <a href="
                                            {{-- {{ route('dashboard') }} --}}
                                            "
                                                class="btn btn-outline-success " type="button">
                                                <b>2025</b>
                                            </a>
                                            <br>
                                            </span>

                                        </form>

                                    </div>
                                </td>
                            </tr>
                            <br>

                        </tbody>

                    </table>
                </div>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
