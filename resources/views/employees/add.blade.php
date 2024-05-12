@extends('layouts.master')

@section('title')
    إضافة موظف
@endsection

@section('css')
    {{-- Css here --}}
@endsection

@section('root')
    لوحة التحكم
@endsection

@section('son1')
    الموظفين
@endsection

@section('son2')
    إضافة موظف جديد
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">
        <!-- general form elements -->
        <div class="card card-teal">
            <div class="card-header">
                <h1 class="card-title col-md-7"><b>البيانات الشخصية للموظف</b></h1>
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
            <form method="Get" action="{{ route('adverts') }}">
                @csrf
                @method('Get')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم الموظف</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">لقب الموظف</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم الوالد</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم الوالدة</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">محل الولادة</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">تاريخ الولادة</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group text-green col-lg-4">
                            <label for="name">رقم الهاتف </label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>

                        <div class="form-group text-green col-lg-8">
                            <label for="name">العنوان </label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">محل قيد النفوس </label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">الجنسية </label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">الوضع العائلي</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">عدد الأولاد</label>
                            <input id="name" class="form-control bg- light" type="text" name="name" required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">عدد من يتقاضى تعويضاً عائلياً </label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">قدمه في الوظيفة</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">المدرسة المنقول منها</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">رقم كتاب التعيين</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">تاريخ كتاب التعيين</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">تاريخ المباشرة</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">تاريخ الانفكاك</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">المدرسة التي نقل إليها</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">هل أدى خدمة العلم</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">رتبته العسكرية</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم المدرسة التي يتم نصابه فيها إذل كان سياراً</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-12">
                            <label for="name">الصورة الشخصية</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center col-md-12">
                    <h4 type="text" class=" btn-warning text-black col-md-6 d-flex justify-content-center"
                        data-toggle="modal" data-target="#modal-primary">
                        الصلاحيات
                    </h4> <br>

                </div>
                <br>
                <div class="row col-md-12 justify-content-center text-align-center ">
                    <div class="form-group text-gray col-md-4">
                        {{-- ____________________________________________________________________ --}}
                        <label for="plays">- نوع الموظف : <sub> (اختر نوع واحد فأكثر ) </sub> </label>

                        <br>
                        {{-- @foreach ($plays->sortBy('type') as $play) --}}
                        <input type="checkbox" name="plays[]" value="{ $play->id }">
                        {{-- {{ $play->type }} --}}put them in foreach
                        <br>
                        {{-- @endforeach --}}
                    </div>

                    <div class="form-group text-gray col-md-4">
                        {{-- ____________________________________________________________________ --}}
                        <label for="plays">- الصفوف التي يستلمها : <sub> (اختر نوع واحد فأكثر ) </sub> </label>

                        <br>
                        {{-- @foreach ($plays->sortBy('type') as $play) --}}
                        <input type="checkbox" name="plays[]" value="{ $play->id }">
                        {{-- {{ $play->type }} --}}put them in foreach
                        <br>
                        {{-- @endforeach --}}
                    </div>

                    <div class="form-group text-gray col-md-4">
                        {{-- ____________________________________________________________________ --}}
                        <label for="plays">- المواد الدراسية التي يعطيها : <sub> (اختر نوع واحد فأكثر ) </sub> </label>

                        <br>
                        {{-- @foreach ($plays->sortBy('type') as $play) --}}
                        <input type="checkbox" name="plays[]" value="{ $play->id }">
                        {{-- {{ $play->type }} --}}put them in foreach
                        <br>
                        {{-- @endforeach --}}
                    </div>
                </div>
                <!-- /.card-body -->
                <br>
                <div class="card-footer">
                    <form
                        action="{{ route('employees-add', [
                            'name' => 3,
                            // $val->id
                        ]) }}"
                        method="POST">
                        @csrf

                        <!-- /.card-body -->

                        <a href="{{ route('employees-add', [
                            'name' => 3,
                            // $val->id
                        ]) }}"
                            class="btn btn-outline-success col d-flex justify-content-center" type="submit">
                            <b>إضافة</b>
                        </a>
                        <br>
                        </span>
                    </form>
                </div>
            </form>
            <!-- /.card -->
        </div>
        <!-- /.card -->
    </div>
    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
