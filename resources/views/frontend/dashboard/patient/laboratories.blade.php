

@extends('frontend.dashboard.patient.layouts.master')



@section('content')
    <div class="details">
        <div>

            <div class="cardHeader">
                <h2>المختبر</h2>

            </div>


            <table class="table text-md-nowrap" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>المطلوب</th>
                        <th>اسم الدكتور</th>
                        <th>اسم دكتور المختبر</th>
                        <th>ملاحظة المختبر</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laboratories as $laboratorie)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $laboratorie->description }}</td>
                            <td>{{ $laboratorie->doctor->name }}</td>
                            <td>{{ $laboratorie->employee->name }}</td>
                            <td>{{ $laboratorie->description_employee }}</td>
                            <td>
                                @if ($laboratorie->employee_id !== null)
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('patient.showLaboratoryResult', $laboratorie->id) }}" role="button">عرض
                                        التحليل</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
