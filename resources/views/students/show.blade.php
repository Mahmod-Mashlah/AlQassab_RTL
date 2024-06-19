@extends('layouts.master')

@section('title')
    عرض بيانات {موظف}
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
    عرض بيانات موظف
@endsection

@section('content')
    {{-- content --}}
    <br>
    <div class="justify-content-center">

        <div class="card card-teal">
            <div class="card-header">
                <h1 class="card-title col-md-7"><b> الصلاحيات</b></h1>
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
                        <label for="plays">نوع الموظف : </label>

                        <br>
                        <h6>{نوع الموظف}</h6>
                        <br>
                        {{-- @endforeach --}}
                    </div>

                    <div class="form-group text-gray col-md-4">
                        {{-- ____________________________________________________________________ --}}
                        <label for="plays">الصفوف التي يستلمها : </label>

                        <br>
                        {{-- @foreach ($plays->sortBy('type') as $play) --}}
                        {{-- {{ $play->type }} --}}
                        <ul>
                            <li>
                                8 { put them in foreach}
                            </li>
                        </ul>
                        <br>
                        {{-- @endforeach --}}
                    </div>

                    <div class="form-group text-gray col-md-4">
                        {{-- ____________________________________________________________________ --}}
                        <label for="plays">المواد الدراسية التي يعطيها : </label>

                        <br>
                        {{-- @foreach ($plays->sortBy('type') as $play) --}}
                        <ul>
                            <li>
                                الرياضيات { put them in foreach}
                            </li>
                        </ul>
                        <br>
                        {{-- @endforeach --}}
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

            <form method="Get" action="{{ route('adverts') }}">
                @csrf
                @method('Get')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم الموظف</label>
                            <br>
                            { اسم الموظف}

                        </div>
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">لقب الموظف</label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم الوالد</label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <hr class="bg-green">

                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم الوالدة</label>
                            <br>
                            { اسم الموظف}

                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">محل الولادة</label>
                            <br>
                            { اسم الموظف}

                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">تاريخ الولادة</label>
                            <br>
                            { اسم الموظف}

                        </div>
                        <hr class="bg-green">

                    </div>

                    <div class="row">

                        <div class="form-group text-green col-lg-4">
                            <label for="name">رقم الهاتف </label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <div class="form-group text-green col-lg-8">
                            <label for="name">العنوان </label>
                            <br>
                            { اسم الموظف}

                        </div>
                        <hr class="bg-green">

                    </div>
                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">محل قيد النفوس </label>
                            <br>
                            { اسم الموظف}

                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">الجنسية </label>
                            <br>
                            { اسم الموظف}

                        </div>


                        <div class="form-group text-gray col-sm-4">
                            <label for="name">الوضع العائلي</label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <hr class="bg-green">

                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">عدد الأولاد</label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">عدد من يتقاضى تعويضاً عائلياً </label>
                            <br>
                            { اسم الموظف}
                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">قدمه في الوظيفة</label>
                            <br>
                            { اسم الموظف}
                        </div>
                        <hr class="bg-green">

                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">المدرسة المنقول منها</label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">رقم كتاب التعيين</label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">تاريخ كتاب التعيين</label>
                            <br>
                            { اسم الموظف}

                        </div>
                        <hr class="bg-green">

                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">تاريخ المباشرة</label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">تاريخ الانفكاك</label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">المدرسة التي نقل إليها</label>
                            <br>
                            { اسم الموظف}

                        </div>
                        <hr class="bg-green">

                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-4">
                            <label for="name">هل أدى خدمة العلم</label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">رتبته العسكرية</label>
                            <br>
                            { اسم الموظف}

                        </div>

                        <div class="form-group text-gray col-sm-4">
                            <label for="name">اسم المدرسة التي يتم نصابه فيها إذل كان سياراً</label>
                            <br>
                            { اسم الموظف}

                        </div>
                        <hr class="bg-green">

                    </div>

                    <div class="row">
                        <div class="form-group text-gray col-sm-12">
                            <label for="name">الصورة الشخصية</label>
                            <br>
                            { اسم الموظف}

                        </div>
                    </div>

                </div>

                <!-- /.card-body -->
                <br>

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
