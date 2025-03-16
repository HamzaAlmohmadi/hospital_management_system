@extends('backend.admin.layouts.master')

@section('css')

@endsection

@section('title')
    اضافة سند قبض جديد
@stop

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
            اضافة سند قبض جديد
        </h2>

        <form action="{{ route('admin.receipts.store') }}" method="post" >
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- إدخال اسم المريض -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300">اسم المريض</label>
                    <select name="patient_id"
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                        required>
                        <option value="">اختر المريض</option>
                        @foreach ($Patients as $Patient)
                            <option value="{{ $Patient->id }}">{{ $Patient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- إدخال المبلغ -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300">المبلغ</label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="Debit" type="number" placeholder="أدخل المبلغ" required />
                </div>

                <!-- إدخال البيان -->
                <div class="block text-sm col-span-2">
                    <label class="text-gray-700 dark:text-gray-300">البيان</label>
                    <textarea
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="description" rows="3" placeholder="أدخل البيان"></textarea>
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

@section('js')


    <script>
        // تهيئة Select2
        $(document).ready(function() {
            $('select').select2({
                placeholder: 'اختر المريض',
                allowClear: true
            });
        });
    </script>
@endsection






