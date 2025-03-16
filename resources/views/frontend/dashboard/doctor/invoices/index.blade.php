@extends('frontend.dashboard.doctor.layouts.master')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>الحالات الجديدة</h2> <!-- Invoices -->
                <a href="#" class="btn">عرض الكل</a> <!-- View All -->
            </div>

            <table class="table text-md-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>تاريخ الفاتورة</th>
                        <th>اسم الخدمة</th>
                        <th>اسم المريض</th>
                        <th>حالة الفاتورة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->created_at }}</td>
                            <td>{{ $invoice->Section->name }}</td>
                            <td><a
                                    href="{{ route('doctor.patient_details', $invoice->patient_id) }}">{{ $invoice->Patient->name }}</a>
                            </td>
                            <td><span class="badge badge-warning">قيد الانتظار</span></td> <!-- Pending -->
                            <td>
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true"
                                        class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                                        type="button">
                                        الإجراءات <i class="fas fa-caret-down mr-1"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#add_diagnosis{{ $invoice->id }}">
                                            <i class="text-primary fa fa-stethoscope"></i>&nbsp;&nbsp;إضافة تشخيص
                                        </a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#add_review{{ $invoice->id }}">
                                            <i class="text-info fa fa-calendar-check"></i>&nbsp;&nbsp;إضافة مراجعة
                                        </a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#transfer_lab{{ $invoice->id }}">
                                            <i class="text-success fa fa-flask"></i>&nbsp;&nbsp;تحويل إلى مختبر
                                        </a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#transfer_radiology{{ $invoice->id }}">
                                            <i class="text-warning fa fa-x-ray"></i>&nbsp;&nbsp;تحويل إلى أشعة
                                        </a>

                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#delete{{ $invoice->id }}">
                                            <i class="text-danger ti-trash"></i>&nbsp;&nbsp;حذف البيانات
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modals -->
    @foreach ($invoices as $invoice)
        <!-- Modal for Add Diagnosis -->

        @include('frontend.dashboard.doctor.invoices.add_diagnosis')

        <!-- Modal for Add Review -->

        @include('frontend.dashboard.doctor.invoices.add_review')

        <!-- Modal for Transfer to Lab -->

        @include('frontend.dashboard.doctor.invoices.laboratorie.Laboratorie_conversion')



        <!-- Modal for Transfer to Radiology -->
        @include('frontend.dashboard.doctor.invoices.xray.xray_conversion')



        <!-- Modal for Delete -->
        <div class="modal fade" id="delete{{ $invoice->id }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">حذف البيانات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>هل أنت متأكد من حذف هذه البيانات؟</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
