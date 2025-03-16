@extends('frontend.dashboard.lab_employee.layouts.master')

@section('title')
    الفواتير المكتملة
@stop



@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>الفواتير المكتملة</h2>
                {{-- <a href="#" class="btn">عرض الكل</a> --}}
            </div>

            <table class="table text-md-nowrap" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>تاريخ الفاتورة</th>
                        <th>اسم المريض</th>
                        <th>اسم الدكتور</th>
                        <th>المطلوب</th>
                        <th>حالة الفاتورة</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        @if ($invoice->case == 1)
                            <!-- عرض الفواتير المكتملة فقط -->
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $invoice->created_at }}</td>
                                <td><a href="#">{{ $invoice->Patient->name }}</a></td>
                                <td>{{ $invoice->doctor->name }}</td>
                                <td>{{ $invoice->description }}</td>
                                <td>
                                    <span class="badge badge-success">مكتملة</span>
                                </td>
                                <td>

                                    <a class="btn btn-primary btn-sm"
                                    href="{{ route('lab.invoices_lab_employe.show', $invoice->id) }}" role="button">عرض
                                    </a>
   
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
