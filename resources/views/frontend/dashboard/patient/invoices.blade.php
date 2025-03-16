@extends('frontend.dashboard.patient.layouts.master')



@section('content')
    <div class="details">
        <div >

            <div class="cardHeader">
                <h2>الفواتير</h2>
     
            </div>

            <table class="table text-md-nowrap" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>تاريخ الفاتورة</th>
                        <th>اسم الدكتور</th>
                        <th>اسم الخدمة</th>
                        <th>الاجمالي</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td>{{ $invoice->doctor->name }}</td>
                            <td>{{ $invoice->service->name ?? 'null' }}</td>
                            <td>{{ $invoice->total_with_tax }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
