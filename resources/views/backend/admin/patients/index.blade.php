

@extends('backend.admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
            المرضى
        </h2>

        <div class="flex mb-4">
            <a href="{{ route('admin.patients.create') }}"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200 dark:bg-purple-700 dark:hover:bg-purple-600">
                إنشاء مريض
            </a>
        </div>

        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                            <th class="px-4 py-3">id</th>
                            <th class="px-4 py-3">الاسم</th>
                            <th class="px-4 py-3">البريد الإلكتروني</th>
                            <th class="px-4 py-3">رقم الهاتف</th>
                            <th class="px-4 py-3">الجنس</th>
                            <th class="px-4 py-3">فصيلة الدم</th>
                            <th class="px-4 py-3">العمليات</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($patients as $patient)
                            <tr class="text-gray-700 dark:text-gray-300">
                                <td class="px-4 py-3">{{ $patient->id }}</td>
                                <td class="px-4 py-3 text-sm">{{ $patient->name }}</td>
                                <td class="px-4 py-3 text-sm">{{ $patient->email }}</td>
                                <td class="px-4 py-3 text-sm">{{ $patient->Phone }}</td>
                                <td class="px-4 py-3 text-sm">{{ $patient->Gender }}</td>
                                <td class="px-4 py-3 text-sm">{{ $patient->Blood_Group }}</td>

                                <td class="px-4 py-3 text-sm flex space-x-2">
                                    <a href="{{ route('admin.patients.edit', $patient->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray dark:text-purple-400 dark:hover:text-purple-300"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <button type="button"
                                        class="delete-item flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray dark:text-red-400 dark:hover:text-red-300"
                                        data-url="{{ route('admin.patients.destroy', $patient->id) }}">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 dark:bg-gray-700 dark:text-gray-300 sm:grid-cols-9">
                <span class="flex items-center col-span-3">
                    يعرض 
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <div class="col-span-4">
        
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
{{-- <script>
    // تأكيد الحذف
    document.querySelectorAll('.delete-item').forEach(button => {
        button.addEventListener('click', function() {
            const url = this.getAttribute('data-url');
            if (confirm('هل أنت متأكد من حذف هذا المريض؟')) {
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            }
        });
    });
</script> --}}
@endpush