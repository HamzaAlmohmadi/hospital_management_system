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
            تعديل سند صرف
        </h2>
        <form method="POST" action="{{ route('admin.payments.update', $payment->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- إدخال اسم المريض -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> اسم المريض </label>
                    <select id="patient_id" name="patient_id"
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                        required>
                        <option value="">اختر المريض</option>
                        @foreach ($Patients as $Patient)
                            <option value="{{ $Patient->id }}"
                                {{ $payment->patient_id == $Patient->id ? 'selected' : '' }}>{{ $Patient->name }}</option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال الرصيد المتبقي للمريض -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> الرصيد المتبقي للمريض </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        id="final_balance" name="final_balance" placeholder="0.00" value="{{ $payment->final_balance }}"
                        readonly />
                    @error('final_balance')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال المبلغ -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> المبلغ </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="credit" type="number" value="{{ $payment->amount }}" placeholder="أدخل المبلغ" />
                    @error('credit')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال البيان -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> البيان </label>
                    <textarea
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="description" rows="3" placeholder="أدخل البيان">{{ $payment->description }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- زر الإرسال -->
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue dark:bg-blue-700 dark:hover:bg-blue-600">
                    حفظ
                </button>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#patient_id').change(function() {
                var patientId = $(this).val();
                if (patientId) {
                    $.ajax({
                        url: '{{ url('admin/patient/balance') }}/' + patientId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data.success) {
                                $('#final_balance').val(data.balance);
                            } else {
                                $('#final_balance').val('0.00');
                            }
                        }
                    });
                } else {
                    $('#final_balance').val('0.00');
                }
            });
        });
    </script>
@endpush
