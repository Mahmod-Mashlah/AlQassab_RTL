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
                        <h6 class="text-olive">{{ $studentCount }}</h6>

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
                        <h6 class="text-olive">{{ $employeesCount }}</h6>
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
        <!-- .card -->
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

                {{-- add year by secretary --}}
                @if (Auth::user()->roles()->first()->name == 'secretary')
                    <form action="{{ route('years.add') }}" method="Post">
                        @csrf
                        @method('Post')
                        <!-- /.card-body -->

                        {{-- Button with insert --}}
                        <div class="d-flex justify-content-center">
                            <div class="input-group mb-6 col-md-12">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-outline-success"><b>إضافة سنة دراسية
                                            جديدة</b></button>
                                </div>
                                <!-- /btn-group -->
                                <input type="text" name="year_start"
                                    placeholder=" تاريخ بداية السنة(السنة ثم الشهر ثم اليوم) مثلاً 30-09-2024"
                                    class="form-control ">
                                <input type="text" name="year_end" placeholder="أدخل تاريخ نهاية السنة "
                                    class="form-control">

                            </div>
                        </div>
                        </span>

                    </form>
                    <br>
                @endif
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
                            @foreach ($years as $year)
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <form action="{{ url('/dashboard/{yearname}', []) }}" method="POST">
                                                @csrf
                                                <!-- /.card-body -->

                                                <a href="{{ url('dashboard', $year->name) }}
                                            "
                                                    class="btn btn-outline-success " type="submit">
                                                    <b>{{ $year->name }}</b>
                                                </a>
                                                <br>
                                                </span>

                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <br>

                        </tbody>

                    </table>
                </div>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- .card -->
        <div class="card card-teal ">
            <div class="card-header">
                <h1 class="card-title col-md-7"><b> الفصول الدراسية </b></h1>
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

                {{-- add year by secretary --}}
                @if (Auth::user()->roles()->first()->name == 'secretary')
                    <form action="{{ route('seasons.add') }}" method="Post">
                        @csrf
                        @method('Post')
                        <!-- /.card-body -->

                        {{-- Button with insert --}}

                        <div class=" justify-content-center">

                            <div class="row">
                                <div class="input-group  col-md-4">
                                    <label for="year_id" class="text-gray">اختر السنة : </label>

                                    <input list="mylist" id="year_id" name="year_id" class="form-control bg- light"
                                        {{-- placeholder="البحث عن موظف عن طريق الاسم" --}} required />
                                    <datalist id="mylist">
                                        @foreach ($years as $year)
                                            <option class="form-control bg-light" value="{{ $year->id }}">
                                                {{ $year->name }}
                                            </option>
                                        @endforeach
                                    </datalist>
                                    <br>
                                    <!-- /btn-group -->
                                </div>

                                <div class="input-group mb-6 col-md-4">
                                    <label for="number" class="text-gray">اختر رقم الفصل: </label>

                                    <select class="form-control bg-light" id="number" name="number" required>

                                        <option class="form-control bg-light" value="1">
                                            1
                                        </option>
                                        <option class="form-control bg-light" value="2">
                                            2
                                        </option>
                                        <option class="form-control bg-light" value="3">
                                            3
                                        </option>

                                    </select>
                                    <br>
                                    <!-- /btn-group -->
                                </div>

                                <div class="input-group mb-6 col-md-4">
                                    <label for="season_start" class="text-gray">تاريخ بداية الفصل : </label>
                                    <input type="date" id="season_start" name="season_start" {{-- placeholder=" تاريخ بداية الفصل(السنة ثم الشهر ثم اليوم) مثلاً 30-09-2024" --}}
                                        class="form-control "required>
                                    <br>
                                    <!-- /btn-group -->
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="input-group col  col-md-8">
                                    <label for="student_id" class="text-gray">تاريخ نهاية الفصل : </label>

                                    <input type="date" id="season_end" name="season_end" {{-- placeholder="أدخل تاريخ نهاية الفصل " --}}
                                        class="form-control"required>
                                    <br>
                                    <!-- /btn-group -->
                                </div>

                                {{-- <div class=" align-items-center col col-md-12 justify-content-center"> --}}

                                <div class="input-group  col col-md-4">
                                    <button type="submit" class="btn btn-outline-info"><b>إضافة فصل دراسي

                                            جديد</b></button>
                                    <!-- /btn-group -->
                                </div>
                            </div>
                            {{-- </div> --}}

                        </div>
                        </span>

                    </form>
                    <br>
                @endif
                <div class="d-flex justify-content-center">
                    <table id="example2" class="table table-bordered  bg-white col-md-12">
                        <thead>
                            <tr>

                                <th style="width: 17%" class=" justify-content-center">
                                    السنة الدراسية
                                </th>
                                <th style="width: 10%" class=" justify-content-center">
                                    رقم الفصل
                                </th>
                                <th style="width: 17%" class=" justify-content-center">
                                    تاريخ بداية الفصل الدراسي
                                </th>
                                <th style="width: 17%" class=" justify-content-center">
                                    تاريخ نهاية الفصل الدراسي
                                </th>
                                <th style="width: 11%" class=" justify-content-center">
                                    عدد أيام الفصل
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seasons as $season)
                                <tr>
                                    <td>
                                        <b>{{ $season->year->name }}</b>
                                    </td>
                                    <td>
                                        {{ $season->number }}
                                    </td>
                                    <td>
                                        {{ $season->season_start }}
                                    </td>
                                    <td>
                                        {{ $season->season_end }}
                                    </td>
                                    <td>
                                        {{ $season->days_number }}
                                    </td>
                                </tr>
                            @endforeach
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
