


@php
    $sections = \App\Models\Section::all();
@endphp

<!-- بداية قسم الحجز -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-6 mb-4">نضمن لك دائمًا الحصول على أفضل النتائج</h1>
                <p>نحن نقدم خدمات عالية الجودة لضمان رضاك التام. فريقنا من الخبراء يعمل بجد لتلبية جميع احتياجاتك.</p>
                <p class="mb-4">نحن نقدم خدمات عالية الجودة لضمان رضاك التام. فريقنا من الخبراء يعمل بجد لتلبية جميع
                    احتياجاتك.</p>
                <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.3s">
                    <div class="icon-box-primary">
                        <i class="bi bi-geo-alt text-dark fs-1"></i>
                    </div>
                    <div class="ms-3">
                        <h5>عنوان المكتب</h5>
                        <span>123 الشارع، نيويورك، الولايات المتحدة</span>
                    </div>
                </div>
                <hr>
                <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.4s">
                    <div class="icon-box-primary">
                        <i class="bi bi-clock text-dark fs-1"></i>
                    </div>
                    <div class="ms-3">
                        <h5>ساعات العمل</h5>
                        <span>من الاثنين إلى السبت من 9 صباحًا إلى 5 مساءً، الأحد مغلق</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <h2 class="mb-4">حجز موعد عبر الإنترنت</h2>
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <!-- اسم المريض -->
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="اسمك" required>
                                <label for="name">اسمك</label>
                            </div>
                        </div>
                        <!-- البريد الإلكتروني -->
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="بريدك الإلكتروني" required>
                                <label for="email">بريدك الإلكتروني</label>
                            </div>
                        </div>
                        <!-- الهاتف -->
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="هاتفك المحمول" required>
                                <label for="phone">هاتفك المحمول</label>
                            </div>
                        </div>
                        <!-- اختيار القسم -->
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <select class="form-select" id="section" name="section" required>
                                    <option value="">اختر القسم</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                                <label for="section">القسم</label>
                            </div>
                        </div>
                        <!-- اختيار الطبيب -->
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <select class="form-select" id="doctor" name="doctor" required>
                                    <option value="">اختر الطبيب</option>
                                </select>
                                <label for="doctor">الطبيب</label>
                            </div>
                        </div>
                        <!-- الملاحظات -->
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="اترك رسالة هنا" id="notes" name="notes" style="height: 130px"></textarea>
                                <label for="notes">ملاحظات</label>
                            </div>
                        </div>
                        <!-- زر الإرسال -->
                        <div class="col-12 text-center">
                            <button class="btn btn-primary w-100 py-3" type="submit">إرسال الآن</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- نهاية قسم الحجز -->

<!-- JavaScript لتحديث قائمة الأطباء -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#section').change(function() {
            var sectionId = $(this).val();
            if (sectionId) {
                $.ajax({
                    url: "{{ route('appointments.getDoctors') }}",
                    type: "GET",
                    data: {
                        section_id: sectionId
                    },
                    success: function(data) {
                        $('#doctor').empty();
                        $('#doctor').append('<option value="">اختر الطبيب</option>');
                        $.each(data, function(key, value) {
                            $('#doctor').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#doctor').empty();
                $('#doctor').append('<option value="">اختر الطبيب</option>');
            }
        });
    });
</script>
