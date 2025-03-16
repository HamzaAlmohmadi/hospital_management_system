@extends('backend.admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->
    <div class="container grid px-6 mx-auto">

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
            طباعة الفاتورة
        </h2>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="main-content-body-invoice" id="print">
                <div class="card card-invoice border-0">
                    <div class="card-body">
                        <!-- Invoice Header -->
                        <div class="invoice-header text-center mb-6">
                            <h1 class="invoice-title text-2xl font-bold text-gray-800 dark:text-gray-200">فاتورة مجموعة خدمات</h1>
                            <div class="billed-from mt-4">
                                <h6 class="text-lg font-semibold text-gray-700 dark:text-gray-300">فاتورة مجموعة خدمات</h6>
                                <p class="text-gray-600 dark:text-gray-400">201 المهندسين<br>
                                    Tel No: 0111111111<br>
                                    Email: Admin@gmail.com</p>
                            </div>
                        </div>

                        <!-- Invoice Information -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600 dark:text-gray-300 font-semibold">معلومات الفاتورة</label>
                                <div class="invoice-info mt-3">
                                    <p class="invoice-info-row"><span class="font-medium">تاريخ الفاتورة:</span> <span class="text-gray-700 dark:text-gray-300">{{ Request::get('invoice_date') }}</span></p>
                                    <p class="invoice-info-row"><span class="font-medium">الدكتور:</span> <span class="text-gray-700 dark:text-gray-300">{{ Request::get('doctor_id') }}</span></p>
                                    <p class="invoice-info-row"><span class="font-medium">القسم:</span> <span class="text-gray-700 dark:text-gray-300">{{ Request::get('section_id') }}</span></p>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Table -->
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="wd-20p font-semibold text-gray-700 dark:text-gray-300">#</th>
                                    <th class="wd-40p font-semibold text-gray-700 dark:text-gray-300">اسم الخدمة</th>
                                    <th class="tx-center font-semibold text-gray-700 dark:text-gray-300">سعر الخدمة</th>
                                    <th class="tx-right font-semibold text-gray-700 dark:text-gray-300">نوع الفاتورة</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="tx-12 text-gray-700 dark:text-gray-300">{{ Request::get('Group_id') }}</td>
                                    <td class="tx-center text-gray-700 dark:text-gray-300">{{ Request::get('price') }}</td>
                                    <td class="tx-right text-gray-700 dark:text-gray-300">{{ Request::get('type') == 1 ? 'نقدي' : 'اجل' }}</td>
                                </tr>
                                <tr>
                                    <td class="valign-middle" colspan="2" rowspan="4">
                                        <div class="invoice-notes">
                                            <label class="main-content-label tx-13"></label>
                                        </div>
                                    </td>
                                    <td class="tx-right text-gray-700 dark:text-gray-300">الإجمالي</td>
                                    <td class="tx-right text-gray-700 dark:text-gray-300" colspan="2">{{ number_format(Request::get('price'), 2) }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right text-gray-700 dark:text-gray-300">قيمة الخصم</td>
                                    <td class="tx-right text-gray-700 dark:text-gray-300" colspan="2">{{ Request::get('discount_value') }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right text-gray-700 dark:text-gray-300">نسبة الضريبة</td>
                                    <td class="tx-right text-gray-700 dark:text-gray-300" colspan="2">% {{ Request::get('tax_rate') }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right tx-uppercase tx-bold tx-inverse text-gray-800 dark:text-gray-200">الإجمالي شامل الضريبة</td>
                                    <td class="tx-right" colspan="2">
                                        {{-- <h4 class="tx-primary tx-bold">{{ number_format(Request::get('total_with_tax'), 2 }}</h4> --}}
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Print Button -->
                        <hr class="mg-b-40">
                        <a href="#" class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()">
                            <i class="mdi mdi-printer ml-1"></i>طباعة
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection