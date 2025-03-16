

@extends('frontend.dashboard.doctor.layouts.master')

@section('content')
    <div class="details">
        <div >
            <div class="cardHeader">
                <h2>الحالات المكتملة</h2> <!-- Completed Invoices -->
                {{-- <a href="#" class="btn">عرض الكل</a> <!-- View All --> --}}
            </div>

            <table class="table text-md-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>تاريخ الفاتورة</th>
                        <th>اسم الخدمة</th>
                        <th>اسم المريض</th>
                        <th>سعر الخدمة</th>
                        <th>قيمة الخصم</th>
                        <th>نسبة الضريبة</th>
                        <th>قيمة الضريبة</th>
                        <th>الإجمالي مع الضريبة</th>
                        <th>حالة الفاتورة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td>{{ $invoice->Service->name ?? $invoice->Group->name }}</td>
                            <td><a
                                    href="{{ route('doctor.patient_details', $invoice->patient_id) }}">{{ $invoice->Patient->name }}</a>
                            </td>
                            <td>{{ number_format($invoice->price, 2) }}</td>
                            <td>{{ number_format($invoice->discount_value, 2) }}</td>
                            <td>{{ $invoice->tax_rate }}%</td>
                            <td>{{ number_format($invoice->tax_value, 2) }}</td>
                            <td>{{ number_format($invoice->total_with_tax, 2) }}</td>
                            <td>
                                @if ($invoice->invoice_status == 1)
                                    <span class="badge badge-danger">تحت الإجراء</span>
                                @elseif($invoice->invoice_status == 2)
                                    <span class="badge badge-warning">مراجعة</span>
                                @else
                                    <span class="badge badge-success">مكتملة</span>
                                @endif
                            </td>
                            <td>
                                <a class="modal-effect btn btn-sm btn-primary"
                                    href="{{ route('doctor.patient_details', $invoice->patient_id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modals -->
@endsection
