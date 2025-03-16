@extends('frontend.dashboard.ray_employee.layouts.master')

@section('title')
    الكشوفات
@stop


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>الكشوفات</h2>
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
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $invoice->created_at }}</td>
                            <td>{{ $invoice->Patient->name }}</td>
                            <td>{{ $invoice->doctor->name }}</td>
                            <td>{{ $invoice->description }}</td>
                            <td>
                                @if ($invoice->case == 0)
                                    <span class="badge badge-danger">تحت الاجراء</span>
                                @else
                                    <span class="badge badge-success">مكتملة</span>
                                @endif
                            </td>
                            <td>
       
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true"
                                        class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                                        type="button">
                                        العمليات  <i class="fas fa-caret-down mr-1"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"  href="{{ route('ray.invoices_ray_employe.edit', $invoice->id) }}">
                                            <i class="text-primary fa fa-stethoscope" ></i>&nbsp;&nbsp;إضافة تشخيص
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
@endsection
