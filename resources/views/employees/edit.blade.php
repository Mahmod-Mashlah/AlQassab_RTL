@extends('layouts.master')

@section('title')
    تعديل بيانات {موظف}
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
    تعديل بيانات موظف
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">

        <div class="card card-teal">
            <div class="card-header">
                <h1 class="card-title col-md-7"><b>تعديل الصلاحيات</b></h1>
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
                <div class="row">
                    <div class="form-group text-gray col-md-4">
                        {{-- ____________________________________________________________________ --}}
                        <label for="plays">نوع الموظف : <sub> (اختر نوع واحد فأكثر ) </sub> </label>

                        <br>
                        {{-- @foreach ($plays->sortBy('type') as $play) --}}
                        <input type="checkbox" name="plays[]" value="{ $play->id }">
                        {{-- {{ $play->type }} --}}put them in foreach
                        <br>
                        {{-- @endforeach --}}
                    </div>

                    <div class="form-group text-gray col-md-4">
                        {{-- ____________________________________________________________________ --}}
                        <label for="plays">الصفوف التي يستلمها : <sub> (اختر نوع واحد فأكثر ) </sub> </label>

                        <br>
                        {{-- @foreach ($plays->sortBy('type') as $play) --}}
                        <input type="checkbox" name="plays[]" value="{ $play->id }">
                        {{-- {{ $play->type }} --}}put them in foreach
                        <br>
                        {{-- @endforeach --}}
                    </div>

                    <div class="form-group text-gray col-md-4">
                        {{-- ____________________________________________________________________ --}}
                        <label for="plays">المواد الدراسية التي يعطيها : <sub> (اختر نوع واحد فأكثر ) </sub> </label>

                        <br>
                        {{-- @foreach ($plays->sortBy('type') as $play) --}}
                        <input type="checkbox" name="plays[]" value="{ $play->id }">
                        {{-- {{ $play->type }} --}}put them in foreach
                        <br>
                        {{-- @endforeach --}}
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12  justify-content-center align-items-center">
                        <button type="submit"
                            class="btn btn-outline-info col col-lg-12  justify-content-center align-items-center">
                            <h6 class="col-md-11">
                                تعديل الصلاحيات
                            </h6>
                        </button>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card -->

        <br>
        <div class="card card-teal ">
            <div class="card-header">
                <h1 class="card-title col-md-7">
                    <b>
                        البيانات الشخصية
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
            <form method="Get" action="{{ route('employees') }}">
                @csrf
                @method('Get')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم الموظف</label>
                            <input id="name" required class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">لقب الموظف</label>
                            <input id="name" required class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم الوالد</label>
                            <input id="name" required class="form-control bg- light" type="text" name="name"
                                required />
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم الوالدة</label>
                            <input id="name" required class="form-control bg- light" type="text" name="name"
                                required />
                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">محل الولادة</label>
                            <input id="name" required class="form-control bg- light" type="text" name="name"
                                required />
                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">تاريخ الولادة</label>
                            <input id="name" required class="form-control bg- light" type="text" name="name"
                                required />
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group text-green col-lg-4">
                            <label for="name">رقم الهاتف </label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                        <div class="form-group text-green col-lg-8">
                            <label for="name">العنوان </label>
                            <input id="name" required class="form-control bg- light" type="text" name="name"
                                required />
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">محل قيد النفوس </label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">الجنسية </label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">الوضع العائلي</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">عدد الأولاد</label>
                            <input id="name" class="form-control bg- light" type="text" name="name"
                                required />
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

                <!-- /.card-body -->
                <br>
                <div class="card-footer">

                    <a href="{{ route('employees-show', [
                        'name' => 'Ahmed',
                        // $val->id
                    ]) }}"
                        class="btn btn-outline-info col d-flex justify-content-center" type="button">
                        <b>تعديل</b>
                    </a>
                </div>
            </form>
        </div>
        <!-- /.card -->

        <div class="card card-teal">
            <div class="card-header">
                <h1 class="card-title col-md-7"><b>الشهادات</b></h1>
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
                <form action="{{ url('/groups/add', []) }}" method="POST">
                    @csrf

                    <!-- /.card-body -->

                    <a href="{{ route('certifications-add', [
                        'name' => 'Ahmed',
                        // $val->id
                    ]) }}"
                        target="_blank" class="btn  btn-outline-success " type="button">
                        <b>إضافة شهادة جديدة</b>
                    </a>
                    <br>
                    </span>

                </form>
                <table id="example2" class="table table-bordered table-striped bg-white">
                    <thead>

                        <tr>
                            <th>#</th>
                            <th>المرتبة</th>
                            <th>الدرجة</th>
                            <th>تاريخ الترفيع</th>
                            <th>اسم الشهادة</th>
                            <th>تاريخ الحصول عليها</th>
                            <th>الكلية المنتسب إلبها</th>
                            <th>العقوبات</th>
                            <th>الملاحظات</th>
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
                            <td>إضافة</td>
                            <td>إضافة</td>
                            <td>إضافة</td>
                            <td>إضافة</td>
                            <td>

                                {{-- show form --}}
                                <div class="d-flex justify-content-center">


                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('certifications-delete', [
                                            'name' => 'Ahmed',
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
                            <td>إضافة</td>
                            <td>إضافة</td>
                            <td>إضافة</td>
                            <td>

                                {{-- edit form --}}
                                <div class="d-flex justify-content-center">

                                    <form action="{{ url('/groups/add', []) }}" method="POST">
                                        @csrf

                                        <!-- /.card-body -->

                                        <a href="{{ route('certifications-delete', [
                                            'name' => 'Ahmed',
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
    </div>

    <br>
@endsection

@section('scipts')
    {{-- Scripts here --}}
@endsection
