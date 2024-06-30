@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    الموظفين
@endsection {{-- or @stop --}}

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    {{-- root --}}
    لوحة التحكم
@endsection

@section('son1')
    {{-- son1 --}}
    الموظفين
@endsection

@section('son2')
    {{-- son2 --}}
@endsection

@section('content')
    {{-- content --}}


    <br>
    <div class="row justify-content-center align-items-center">
        <div class="col col-md-7">
            <form method="Get" action="{{ route('employees-add') }}">
                @csrf
                @method('Get')

                <!-- /.card-body -->

                <div class="col-md-10  justify-content-center align-items-center">
                    <a href="{{ route('employees') }}" target="_blank" type="submit"
                        class="btn btn-outline-success col  justify-content-center align-items-center">
                        إضافة موظف جديد
                    </a>
                </div>
            </form>

        </div>

    </div>
    <br>

    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-7"><b>الموجهين</b></h1>
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
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>

                    <tr>
                        <th>#</th>
                        <th>اسم الموجه ولقبه</th>
                        <th>اسم الوالد</th>
                        <th>مسؤوول عن الصف</th>
                        <th>محل وتاريخ الولادة</th>
                        <th>رقم الهاتف</th>
                        <th>تفاصيل إضافية</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>محمد كامل</td>
                        <td>وليد</td>
                        <td>-</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>

                            {{-- show form --}}
                            <div class="d-flex justify-content-center">
                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-show', [
                                        'name' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-success     " type="button">
                                        <b>عرض</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-edit', [
                                        'name' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-info     " type="button">
                                        <b>تعديل</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-delete', [
                                        'id' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-danger     " type="button">
                                        <b>حذف</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>كامل وليد</td>
                        <td>خالد</td>
                        <td>-</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>

                            {{-- edit form --}}
                            <div class="d-flex justify-content-center">
                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-show', [
                                        'name' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-success     " type="button">
                                        <b>عرض</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-edit', [
                                        'name' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-info     " type="button">
                                        <b>تعديل</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-delete', [
                                        'id' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-danger     " type="button">
                                        <b>حذف</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>


                        </td>
                    </tr>

                    <br>

                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <br>
    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-7"><b>الأساتذة</b></h1>
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
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>

                    <tr>
                        <th>#</th>
                        <th>اسم الأستاذ ولقبه</th>
                        <th>اسم الوالد</th>
                        <th>مسؤوول عن الصف</th>
                        <th>المواد التي يدرسها</th>
                        <th>رقم الهاتف</th>
                        <th>تفاصيل إضافية</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>محمد كامل</td>
                        <td>وليد</td>
                        <td>-</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>

                            {{-- show form --}}
                            <div class="d-flex justify-content-center">
                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-show', [
                                        'name' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-success     " type="button">
                                        <b>عرض</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-edit', [
                                        'name' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-info     " type="button">
                                        <b>تعديل</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-delete', [
                                        'id' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-danger     " type="button">
                                        <b>حذف</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>كامل وليد</td>
                        <td>خالد</td>
                        <td>-</td>
                        <td>إضافة</td>
                        <td>إضافة</td>
                        <td>

                            {{-- edit form --}}
                            <div class="d-flex justify-content-center">
                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-show', [
                                        'name' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-success     " type="button">
                                        <b>عرض</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-edit', [
                                        'name' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-info     " type="button">
                                        <b>تعديل</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                                <form action="{{ url('/groups/add', []) }}" method="POST">
                                    @csrf

                                    <!-- /.card-body -->

                                    <a href="{{ route('employees-delete', [
                                        'id' => 3,
                                        // $val->id
                                    ]) }}"
                                        class="btn btn-outline-danger     " type="button">
                                        <b>حذف</b>
                                    </a>
                                    <br>
                                    </span>
                                </form>

                        </td>
                    </tr>

                    <br>

                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


    <br>

    <!-- /.card -->
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
