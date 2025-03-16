{{-- @extends('backend.admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            تعديل القسم
        </h2>

        <form method="POST" action="{{ route('admin.sections.update', ['section' => $section->id]) }}">
            @csrf
            @method('PUT')
            <!-- إدخال اسم القسم -->
            <label class="block text-sm">
                <span class="text-gray-700">
                    اسم القسم
                </span>
                <input
                    class="block w-full mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="name"
                    value="{{ $section->name }}"
                    placeholder="أدخل اسم القسم"
                    required
                />
            </label>

            <!-- إدخال وصف القسم -->
            <label class="block text-sm mt-4">
                <span class="text-gray-700">
                    وصف القسم
                </span>
                <textarea
                    class="block w-full mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-textarea"
                    name="description"
                    placeholder="أدخل وصف القسم"
                >{{ $section->description }}</textarea>
            </label>

            <!-- تحديد حالة القسم -->
            <label class="block text-sm mt-4">
                <span class="text-gray-700">
                    حالة القسم
                </span>
                <select
                    class="block w-full mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                    name="status"
                >
                    <option value="1" {{ $section->status == 1 ? 'selected' : '' }}>مفعل</option>
                    <option value="0" {{ $section->status == 0 ? 'selected' : '' }}>غير مفعل</option>
                </select>
            </label>

            <!-- زر الإرسال -->
            <button type="submit" class="mt-6 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                حفظ التعديلات
            </button>
        </form>
    </div>
@endsection

@push('js')
@endpush --}}



@extends('backend.admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
            تعديل القسم
        </h2>

        <form method="POST" action="{{ route('admin.sections.update', ['section' => $section->id]) }}">
            @csrf
            @method('PUT')
            <!-- إدخال اسم القسم -->
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-300">
                    اسم القسم
                </span>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="name"
                    value="{{ $section->name }}"
                    placeholder="أدخل اسم القسم"
                    required
                />
            </label>

            <!-- إدخال وصف القسم -->
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-300">
                    وصف القسم
                </span>
                <textarea
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-textarea"
                    name="description"
                    placeholder="أدخل وصف القسم"
                >{{ $section->description }}</textarea>
            </label>

            <!-- تحديد حالة القسم -->
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-300">
                    حالة القسم
                </span>
                <select
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                    name="status"
                >
                    <option value="1" {{ $section->status == 1 ? 'selected' : '' }}>مفعل</option>
                    <option value="0" {{ $section->status == 0 ? 'selected' : '' }}>غير مفعل</option>
                </select>
            </label>

            <!-- زر الإرسال -->
            <button type="submit" class="mt-6 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue dark:bg-blue-700 dark:hover:bg-blue-600">
                حفظ التعديلات
            </button>
        </form>
    </div>
@endsection

@push('js')
@endpush