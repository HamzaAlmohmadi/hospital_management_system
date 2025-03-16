{{-- 


@extends('frontend.dashboard.doctor.layouts.master')



@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-1">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li class="nav-item">
                                                <a href="#tab1" class="nav-link active" data-toggle="tab">سجل المريض</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#tab2" class="nav-link" data-toggle="tab">الأشعة</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#tab3" class="nav-link" data-toggle="tab">المختبر</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">

                          
                                        <div class="tab-pane active" id="tab1">
                                            <br>
                                            <div class="vtimeline">
                                                @foreach ($patient_records as $patient_record)
                                                    <div
                                                        class="timeline-wrapper {{ $loop->iteration % 2 == 0 ? 'timeline-inverted' : '' }} timeline-wrapper-primary">
                                                        <div class="timeline-badge">
                                                            <i class="las la-check-circle"></i>
                                                        </div>
                                                        <div class="timeline-panel">
                                                            <div class="timeline-heading">
                                                                <h6 class="timeline-title">التشخيص</h6>
                                                            </div>
                                                            <div class="timeline-body">
                                                                <p>{{ $patient_record->diagnosis }}</p>
                                                            </div>
                                                            <div
                                                                class="timeline-footer d-flex align-items-center flex-wrap">
                                                                <i class="fas fa-user-md"></i>&nbsp;
                                                                <span>{{ $patient_record->Doctor->name }}</span>
                                                                <span class="mr-auto">
                                                                    <i class="fe fe-calendar text-muted mr-1"></i>
                                                                    {{ $patient_record->date }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                               

                                        <div class="tab-pane" id="tab2">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>اسم الخدمة</th>
                                                            <th>اسم الدكتور</th>
                                                            <th>اسم موظف الأشعة</th>
                                                            <th>حالة الكشف</th>
                                                            <th>العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($patient_rays as $patient_ray)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $patient_ray->description }}</td>
                                                                <td>{{ $patient_ray->doctor->name }}</td>
                                                                <td>{{ $patient_ray->employee->name ?? 'لا يوجد موظف' }}
                                                                </td>
                                                                <td>
                                                                    @if ($patient_ray->case == 0)
                                                                        <span class="text-danger">غير مكتملة</span>
                                                                    @else
                                                                        <span class="text-success">مكتملة</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($patient_ray->doctor_id == auth()->user()->doctor->id)
                                                                        @if ($patient_ray->case == 0)
                                                                            <a class="modal-effect btn btn-sm btn-primary"
                                                                                data-effect="effect-scale"
                                                                                data-toggle="modal"
                                                                                href="#edit_xray_conversion{{ $patient_ray->id }}">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>
                                                                            <a class="modal-effect btn btn-sm btn-danger"
                                                                                data-effect="effect-scale"
                                                                                data-toggle="modal"
                                                                                href="#delete{{ $patient_ray->id }}">
                                                                                <i class="las la-trash"></i>
                                                                            </a>
                                                                        @else
                                                                            <a class="modal-effect btn btn-sm btn-primary"
                                                                                href="{{ route('invoices.show', $patient_ray->id) }}">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @include('frontend.dashboard.doctor.invoices.xray.edit_xray_conversion')
                                                            @include('frontend.dashboard.doctor.invoices.xray.deleted')
                                                      
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
 
                                        <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>اسم الخدمة</th>
                                                            <th>اسم الدكتور</th>
                                                            <th>العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($patient_Laboratories as $patient_Laboratorie)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $patient_Laboratorie->description }}</td>
                                                                <td>{{ $patient_Laboratorie->doctor->name }}</td>
                                                                <td>
                                                                    @if ($patient_Laboratorie->doctor_id == auth()->user()->doctor->id)
                                                                        @if ($patient_Laboratorie->case == 0)

                                                                            <a class="modal-effect btn btn-sm btn-primary"
                                                                                data-effect="effect-scale"
                                                                                data-toggle="modal"
                                                                                href="#edit_laboratorie_conversion{{ $patient_Laboratorie->id }}">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>
                                                                            <a class="modal-effect btn btn-sm btn-danger"
                                                                                data-effect="effect-scale"
                                                                                data-toggle="modal"
                                                                                href="#deleted_laboratorie{{ $patient_Laboratorie->id }}">
                                                                                <i class="las la-trash"></i>
                                                                            </a>
                                                                       
                                                                        @else
                                                                            <a class="modal-effect btn btn-sm btn-warning"
                                                                                href="{{ route('show.laboratorie', $patient_Laboratorie->id) }}">
                                                                                <i class="fas fa-binoculars"></i>
                                                                            </a>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @include('frontend.dashboard.doctor.invoices.laboratorie.edit_laboratorie_conversion')
                                                            @include('frontend.dashboard.doctor.invoices.laboratorie.deleted_laboratorie')
                                              
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                             

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}




@extends('frontend.dashboard.doctor.layouts.master')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <!-- لوحة التبويبات -->
                            <div class="panel panel-primary tabs-style-1">
                                <!-- رأس التبويبات -->
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- قائمة التبويبات -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li class="nav-item">
                                                <a href="#tab1" class="nav-link active" data-toggle="tab">سجل المريض</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#tab2" class="nav-link" data-toggle="tab">الأشعة</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#tab3" class="nav-link" data-toggle="tab">المختبر</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- محتوى التبويبات -->
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">

                                        <!-- تبويب سجل المريض -->
                                        <div class="tab-pane active" id="tab1">
                                            <br>
                                            <!-- الخط الزمني لعرض التشخيصات -->
                                            <div class="vtimeline">
                                                @foreach ($patient_records as $patient_record)
                                                    <div
                                                        class="timeline-wrapper {{ $loop->iteration % 2 == 0 ? 'timeline-inverted' : '' }} timeline-wrapper-primary">
                                                        <!-- أيقونة الخط الزمني -->
                                                        <div class="timeline-badge">
                                                            <i class="las la-check-circle"></i>
                                                        </div>
                                                        <!-- محتوى الخط الزمني -->
                                                        <div class="timeline-panel">
                                                            <div class="timeline-heading">
                                                                <h6 class="timeline-title">التشخيص</h6>
                                                            </div>
                                                            <div class="timeline-body">
                                                                <p>{{ $patient_record->diagnosis }}</p>
                                                            </div>
                                                            <!-- تذييل الخط الزمني -->
                                                            <div
                                                                class="timeline-footer d-flex align-items-center flex-wrap">
                                                                <i class="fas fa-user-md"></i>&nbsp;
                                                                <span>{{ $patient_record->Doctor->name }}</span>
                                                                <span class="mr-auto">
                                                                    <i class="fe fe-calendar text-muted mr-1"></i>
                                                                    {{ $patient_record->date }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- نهاية تبويب سجل المريض -->

                                        <!-- تبويب الأشعة -->
                                        <div class="tab-pane" id="tab2">
                                            <div class="table-responsive">
                                                <!-- جدول عرض طلبات الأشعة -->
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>اسم الخدمة</th>
                                                            <th>اسم الدكتور</th>
                                                            <th>اسم موظف الأشعة</th>
                                                            <th>حالة الكشف</th>
                                                            <th>العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($patient_rays as $patient_ray)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $patient_ray->description }}</td>
                                                                <td>{{ $patient_ray->doctor->name }}</td>
                                                                <td>{{ $patient_ray->employee->name ?? 'لا يوجد موظف' }}
                                                                </td>
                                                                <td>
                                                                    @if ($patient_ray->case == 0)
                                                                        <span class="text-danger">غير مكتملة</span>
                                                                    @else
                                                                        <span class="text-success">مكتملة</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <!-- التحقق من أن الطبيب الحالي هو صاحب الطلب -->
                                                                    @if ($patient_ray->doctor_id == auth()->user()->doctor->id)
                                                                        @if ($patient_ray->case == 0)
                                                                            <!-- زر التعديل -->
                                                                            <a class="modal-effect btn btn-sm btn-primary"
                                                                                data-effect="effect-scale"
                                                                                data-toggle="modal"
                                                                                href="#edit_xray_conversion{{ $patient_ray->id }}">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>
                                                                            <!-- زر الحذف -->
                                                                            <a class="modal-effect btn btn-sm btn-danger"
                                                                                data-effect="effect-scale"
                                                                                data-toggle="modal"
                                                                                href="#delete{{ $patient_ray->id }}">
                                                                                <i class="las la-trash"></i>
                                                                            </a>
                                                                        @else
                                                                            <!-- زر العرض -->
                                                                            <a class="modal-effect btn btn-sm btn-primary"
                                                                                href="{{ route('doctor.rays.show', $patient_ray->id) }}">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <!-- نافذة التعديل -->
                                                            @include('frontend.dashboard.doctor.invoices.xray.edit')
                                                            @include('frontend.dashboard.doctor.invoices.xray.deleted')
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- نهاية تبويب الأشعة -->

                                        <!-- تبويب المختبر -->
                                        <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <!-- جدول عرض طلبات المختبر -->
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>اسم الخدمة</th>
                                                            <th>اسم الدكتور</th>
                                                            <th>العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($patient_Laboratories as $patient_Laboratorie)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $patient_Laboratorie->description }}</td>
                                                                <td>{{ $patient_Laboratorie->doctor->name }}</td>
                                                                <td>
                                                                    <!-- التحقق من أن الطبيب الحالي هو صاحب الطلب -->
                                                                    @if ($patient_Laboratorie->doctor_id == auth()->user()->doctor->id)
                                                                        @if ($patient_Laboratorie->case == 0)
                                                                            <!-- زر التعديل -->
                                                                            <a class="modal-effect btn btn-sm btn-primary"
                                                                                data-effect="effect-scale"
                                                                                data-toggle="modal"
                                                                                href="#edit_laboratorie_conversion{{ $patient_Laboratorie->id }}">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>
                                                                            <!-- زر الحذف -->
                                                                            <a class="modal-effect btn btn-sm btn-danger"
                                                                                data-effect="effect-scale"
                                                                                data-toggle="modal"
                                                                                href="#deleted_laboratorie{{ $patient_Laboratorie->id }}">
                                                                                <i class="las la-trash"></i>
                                                                            </a>
                                                                        @else
                                                                            <!-- زر العرض -->
                                                                            <a class="modal-effect btn btn-sm btn-warning"
                                                                                href="{{ route('doctor.Laboratories.show', $patient_Laboratorie->id) }}">
                                                                                <i class="fas fa-binoculars"></i>
                                                                            </a>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <!-- نافذة التعديل -->
                                                            @include('frontend.dashboard.doctor.invoices.laboratorie.edit')
                                                            <!-- نافذة الحذف -->
                                                            @include('frontend.dashboard.doctor.invoices.laboratorie.deleted')
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <!-- جدول عرض طلبات المختبر -->
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>اسم الخدمة</th>
                                                            <th>اسم الدكتور</th>
                                                            <th>اسم موظف المختبر</th>
                                                            <th>حالة الكشف</th>
                                                            <th>العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($patient_Laboratories as $patient_Laboratorie)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $patient_Laboratorie->description }}</td>
                                                                <td>{{ $patient_Laboratorie->doctor->name }}</td>
                                                                <td>{{ $patient_Laboratorie->employee->name ?? 'لا يوجد موظف' }}
                                                                </td>
                                                                <td>
                                                                    @if ($patient_Laboratorie->case == 0)
                                                                        <span class="text-danger">غير مكتملة</span>
                                                                    @else
                                                                        <span class="text-success">مكتملة</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <!-- التحقق من أن الطبيب الحالي هو صاحب الطلب -->
                                                                    @if ($patient_Laboratorie->doctor_id == auth()->user()->doctor->id)
                                                                        @if ($patient_Laboratorie->case == 0)
                                                                            <!-- زر التعديل -->
                                                                            <a class="modal-effect btn btn-sm btn-primary"
                                                                                data-effect="effect-scale"
                                                                                data-toggle="modal"
                                                                                href="#edit_laboratorie_conversion{{ $patient_Laboratorie->id }}">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>
                                                                            <!-- زر الحذف -->
                                                                            <a class="modal-effect btn btn-sm btn-danger"
                                                                                data-effect="effect-scale"
                                                                                data-toggle="modal"
                                                                                href="#deleted_laboratorie{{ $patient_Laboratorie->id }}">
                                                                                <i class="las la-trash"></i>
                                                                            </a>
                                                                        @else
                                                                            <!-- زر العرض -->
                                                                            <a class="modal-effect btn btn-sm btn-warning"
                                                                                href="{{ route('doctor.Laboratories.show', $patient_Laboratorie->id) }}">
                                                                                <i class="fas fa-binoculars"></i>
                                                                            </a>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <!-- نافذة التعديل -->
                                                            @include('frontend.dashboard.doctor.invoices.laboratorie.edit')
                                                            <!-- نافذة الحذف -->
                                                            @include('frontend.dashboard.doctor.invoices.laboratorie.deleted')
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> --}}
                                        <!-- نهاية تبويب المختبر -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
