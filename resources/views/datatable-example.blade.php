@extends('layouts.master')

@section('title')
    DataTable Example
@endsection {{-- or @stop --}}

@section('css')
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.5/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.1/fc-5.0.0/r-3.0.2/sb-1.7.1/sp-2.3.1/sl-2.0.1/datatables.min.css"
        rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.5/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.1/fc-5.0.0/r-3.0.2/sb-1.7.1/sp-2.3.1/sl-2.0.1/datatables.min.js">
    </script>
@endsection

@section('root')
    Dashboard
@endsection

@section('son1')
    Tables
@endsection

@section('son2')
    Data Table Example
@endsection

@section('content')
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped bg-cyan">
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>الاسم</th>
                    <th>اسم الأب</th>
                    <th>المهنة</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>1</td>
                    <td>محمد كامل</td>
                    <td>وليد</td>
                    <td>-</td>
                    <td>إضافة</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>كامل وليد</td>
                    <td>خالد</td>
                    <td>-</td>
                    <td>إضافة</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>خالد إسماعيل</td>
                    <td>تامر</td>
                    <td>-</td>
                    <td>إضافة</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>عبد الرحمن سعد</td>
                    <td>محمد</td>
                    <td>-</td>
                    <td>إضافة</td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th>الرقم</th>
                    <th>الاسم</th>
                    <th>اسم الأب</th>
                    <th>المهنة</th>
                    <th>العمليات</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('scipts')
@endsection
