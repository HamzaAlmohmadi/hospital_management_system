
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
            تعديل فاتورة مفردة
        </h2>
        <form method="POST" action="{{ route('admin.single_invoices.update', $invoice->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- استخدام طريقة PUT للتحديث -->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- إدخال المريض -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> المريض </label>
                    <select
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                        name="patient_id" required>
                        <option value="">اختر المريض</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ $invoice->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال الطبيب -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> الطبيب </label>
                    <select
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                        name="doctor_id" required>
                        <option value="">اختر الطبيب</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $invoice->doctor_id == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }}</option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال القسم -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> القسم </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="section_id" value="{{ $invoice->section_id }}" readonly />
                    @error('section_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال الخدمة -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> الخدمة </label>
                    <select
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                        name="service_id" required>
                        <option value="">اختر الخدمة</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}"
                                {{ $invoice->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال السعر -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> السعر </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="price" value="{{ $invoice->price }}" readonly />
                    @error('price')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال قيمة الخصم -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> قيمة الخصم </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="discount_value" value="{{ $invoice->discount_value }}" />
                    @error('discount_value')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال نسبة الضريبة -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> نسبة الضريبة </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="tax_rate" value="{{ $invoice->tax_rate }}" />
                    @error('tax_rate')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال الإجمالي قبل الضريبة -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> الاجمالي قبل الضريبة</label>
                    <input type="number" name="subtotal"
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        value="{{ $invoice->subtotal }}" readonly>
                    @error('subtotal')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال الإجمالي بعد الضريبة -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> الاجمالي بعد الضريبة </label>
                    <input type="number" name="total"
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        value="{{ $invoice->total }}" readonly>
                    @error('total')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- تحديد نوع الفاتورة -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> نوع الفاتورة </label>
                    <select
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                        name="type" required>
                        <option value="1" {{ $invoice->type == 1 ? 'selected' : '' }}>نقدي</option>
                        <option value="2" {{ $invoice->type == 2 ? 'selected' : '' }}>آجل</option>
                    </select>
                    @error('type')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- زر الإرسال -->
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue dark:bg-blue-700 dark:hover:bg-blue-600">
                    تحديث
                </button>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // حساب القيم عند تحميل الصفحة
            calculateTotals();

            // تحديث القسم عند تغيير الطبيب
            $(document).on('change', 'select[name="doctor_id"]', function() {
                let doctorId = $(this).val();
                if (doctorId) {
                    $.ajax({
                        url: `/admin/doctors/${doctorId}/section`,
                        success: function(data) {
                            $('input[name="section_id"]').val(data.section_id);
                        }
                    });
                }
            });

            // تحديث السعر عند تغيير الخدمة
            $(document).on('change', 'select[name="service_id"]', function() {
                let serviceId = $(this).val();
                if (serviceId) {
                    $.ajax({
                        url: `/admin/services/${serviceId}/price`,
                        success: function(data) {
                            $('input[name="price"]').val(data.price);
                            calculateTotals();
                        }
                    });
                }
            });

            // إعادة حساب القيم عند تغيير الخصم أو الضريبة
            $(document).on('keyup change', 'input[name="discount_value"], input[name="tax_rate"]', function() {
                calculateTotals();
            });

            // دالة لحساب القيم المالية
            function calculateTotals() {
                let price = parseFloat($('input[name="price"]').val()) || 0;
                let discount = parseFloat($('input[name="discount_value"]').val()) || 0;
                let taxRate = parseFloat($('input[name="tax_rate"]').val()) || 0;

                let subtotal = price - discount;
                let taxValue = (subtotal * taxRate) / 100;
                let total = subtotal + taxValue;

                $('input[name="subtotal"]').val(subtotal.toFixed(2));
                $('input[name="tax_value"]').val(taxValue.toFixed(2));
                $('input[name="total"]').val(total.toFixed(2));
            }
        });
    </script>
@endpush




