








@extends('frontend.dashboard.patient.layouts.master')



@section('content')
    <div class="details">
        <div>

            <div class="cardHeader">
                <h2>الاشعة</h2>

            </div>


            <table class="table text-md-nowrap" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>المطلوب</th>
                        <th>اسم الدكتور</th>
                        <th>اسم دكتور الاشعة</th>
                        <th>ملاحظة دكتور الاشعة</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rays as $ray)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ray->description }}</td>
                            <td>{{ $ray->doctor->name }}</td>
                            <td>{{ $ray->employee->name }}</td>
                            <td>{{ $ray->description_employee }}</td>
                            <td>
                                @if ($ray->employee_id !== null)
                                    <a class="btn btn-primary btn-sm" href="{{ route('patient.showRayResult', $ray->id) }}"
                                        role="button">عرض الاشعة</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
