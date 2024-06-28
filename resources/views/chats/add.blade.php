@extends('layouts.master')

@section('title')
    إضافة غرفة مناقشة جديدة
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم {{ $year->name }}
@endsection

@section('son1')
    غرف المناقشة
@endsection

@section('son2')
    إضافة غرفة مناقشة جديدة
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->

        <div class="card card-teal">
            <div class="card-header">

                <h1 class="card-title col-md-7"><b>البيانات </b></h1>
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
            <form method="Post" action="{{ route('chats.add', ['yearname' => $year->name]) }}">
                @csrf
                @method('Post')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group text-gray col-md-12">
                            <label for="target">ملخص المحادثة </label>
                            <input id="target" class="form-control bg- light" type="text" name="target" required />
                        </div>

                        <div class="form-group text-gray col-md-12">
                            <label for="summery">التفاصيل </label>
                            <input id="summery" class="form-control bg- light" type="text" name="summery" />
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
