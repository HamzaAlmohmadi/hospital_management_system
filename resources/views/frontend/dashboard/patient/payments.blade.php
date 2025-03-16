@extends('frontend.dashboard.patient.layouts.master')



@section('content')
    <div class="details">
        <div>

            <div class="cardHeader">
                <h2>المدفوعات</h2>

            </div>


            <table class="table text-md-nowrap" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>تاريخ الدفع</th>
                        <th>المبلغ</th>
                        <th>البيان</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->date }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
