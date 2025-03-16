
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
            إنشاء فاتورة مجمعة جديدة
        </h2>
        <form method="POST" action="{{ route('admin.group_invoices.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- إدخال المريض -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> المريض </label>
                    <select
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                        name="patient_id" required>
                        <option value="">اختر المريض</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
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
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
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
                        name="section_id" placeholder="سيتم تعبئته تلقائيًا" readonly />
                    @error('section_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال المجموعة -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> المجموعة </label>
                    <select
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                        name="Group_id" required>
                        <option value="">اختر المجموعة</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                    @error('Group_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال السعر -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> السعر </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="price" placeholder="سيتم تعبئته تلقائيًا" readonly />
                    @error('price')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال قيمة الخصم -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> قيمة الخصم </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="discount_value" placeholder="سيتم تعبئته تلقائيًا" readonly />
                    @error('discount_value')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال نسبة الضريبة -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> نسبة الضريبة </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="tax_rate" placeholder="سيتم تعبئته تلقائيًا" readonly />
                    @error('tax_rate')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- تحديد نوع الفاتورة -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> نوع الفاتورة </label>
                    <select
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                        name="type" required>
                        <option value="1">نقدي</option>
                        <option value="2">آجل</option>
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
                    حفظ
                </button>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // دالة لتعيين القسم تلقائيًا عند اختيار الطبيب
        // $(document).on('change', 'select[name="doctor_id"]', function() {
        //     const doctorId = $(this).val();
        //     if (doctorId) {
        //         $.ajax({
        //             type: 'GET',
        //             url: `/admin/doctors/${doctorId}/section`,
        //             success: function(data) {
        //                 $('input[name="section_id"]').val(data.section_name);
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error('Error fetching section:', error);
        //                 alert('حدث خطأ أثناء جلب بيانات القسم. الرجاء المحاولة مرة أخرى.');
        //             }
        //         });
        //     } else {
        //         $('input[name="section_id"]').val('');
        //     }
        // });
        $(document).on('change', 'select[name="doctor_id"]', function() {
            const doctorId = $(this).val();
            if (doctorId) {
                $.ajax({
                    type: 'GET',
                    url: `/admin/doctors/${doctorId}/section`,
                    success: function(data) {
                        // تأكد من أن data.section_id هو عدد صحيح
                        $('input[name="section_id"]').val(data.section_id);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching section:', error);
                        alert('حدث خطأ أثناء جلب بيانات القسم. الرجاء المحاولة مرة أخرى.');
                    }
                });
            } else {
                $('input[name="section_id"]').val('');
            }
        });

        // دالة لتعيين السعر وقيمة الخصم ونسبة الضريبة تلقائيًا عند اختيار المجموعة


        $(document).on('change', 'select[name="Group_id"]', function() {
            const groupId = $(this).val();
            if (groupId) {
                $.ajax({
                    type: 'GET',
                    url: `/admin/groups/${groupId}/details`,
                    success: function(data) {
                        $('input[name="price"]').val(data.price);
                        $('input[name="discount_value"]').val(data.discount_value);
                        $('input[name="tax_rate"]').val(data.tax_rate);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching group details:', error);
                        alert('حدث خطأ أثناء جلب بيانات المجموعة. الرجاء المحاولة مرة أخرى.');
                    }
                });
            } else {
                $('input[name="price"]').val('');
                $('input[name="discount_value"]').val('');
                $('input[name="tax_rate"]').val('');
            }
        });
    </script>
@endpush
