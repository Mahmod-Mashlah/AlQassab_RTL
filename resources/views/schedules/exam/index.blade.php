@extends('layouts.master')

@section('title')
    {{-- Title here --}}
    الإعلانات
@endsection {{-- or @stop --}}

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    {{-- root --}}
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    {{-- son1 --}}
    الإعلانات
@endsection

@section('son2')
    {{-- son2 --}}
@endsection

@section('content')
    {{-- content --}}


    <div class="card card-teal">
        <div class="card-header">
            <h1 class="card-title col-md-6"><b>الإعلانات</b></h1>
            <div class="card-tools">

                <button type="button" class="btn btn-tool " data-card-widget="remove"><i class="fas fa-times"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            @if (Auth::user()->roles()->first()->name == 'mentor' || Auth::user()->roles()->first()->name == 'manager')
                <form action="{{ route('adverts.create', ['yearname' => $year->name]) }}" method="GET">
                    @csrf
                    @method('Get')
                    <!-- /.card-body -->

                    <a href="{{ route('adverts.create', ['yearname' => $year->name]) }}" class="btn  btn-outline-success "
                        type="button">
                        <b>إضافة إعلان جديد</b>
                    </a>
                    <br>
                    </span>

                </form>
            @endif

            <table id="example2" class="table table-bordered table-striped bg-white">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 35%">عنوان الإعلان</th>
                        <th style="width: 10%">الجهة المستهدفة</th>
                        <th style="width: 10%">تاريخ الإعلان</th>
                        <th style="width: 5%">دور المعلِن</th>
                        <th style="width: 25%">العمليات المتاحة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adverts as $advert)
                        <tr>
                            <td>{{ $advert->id }}</td>
                            <td>{{ $advert->title }}</td>
                            <td>{{ $advert->target }}</td>
                            <td>{{ Carbon\Carbon::parse($advert->created_at)->format('j/n/Y') }}</td>
                            {{-- <td>{{ $advert->user->first_name }} {{ $advert->user->last_name }}</td> --}}
                            <td>{{ $advert->user->roles()->first()->display_name }}</td>

                            <td>

                                {{-- edit form --}}
                                <div class="d-flex justify-content-center">
                                    <form
                                        action="{{ route('adverts.show', ['yearname' => $year->name, 'advert_id' => $advert->id, 'advert' => $advert]) }}"
                                        method="GET">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('adverts.show', ['yearname' => $year->name, 'advert_id' => $advert->id]) }}"
                                            class="btn btn-outline-success     " type="button">
                                            <b>عرض التفاصيل</b>
                                        </a>
                                        <br>
                                        </span>
                                    </form>
                                    @if (Auth::user()->roles()->first()->name == 'mentor' || Auth::user()->roles()->first()->name == 'manager')
                                        <form action="{{ url('/groups/add', []) }}" method="POST">
                                            @csrf

                                            <!-- /.card-body -->

                                            <a href="{{ route('adverts.edit', ['yearname' => $year->name, 'advert_id' => $advert->id]) }}"
                                                class="btn btn-outline-info     " type="button">
                                                <b>تعديل</b>
                                            </a>
                                            <br>
                                            </span>
                                        </form>

                                        {{-- delete form --}}
                                        <div class="d-flex justify-content-center">
                                            <form
                                                action="{{ route('adverts.delete', ['yearname' => $year->name, 'advert_id' => $advert->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <!-- /.card-body -->

                                                <button class="btn btn-outline-danger" type="submit">
                                                    <b>حذف</b>
                                                </button>
                                                <br>
                                                </span>
                                            </form>

                                        </div>
                                    @endif
                            </td>
                        </tr>
                    @endforeach


                    <br>

                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
