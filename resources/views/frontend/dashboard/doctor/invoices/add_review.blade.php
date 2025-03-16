<div class="modal fade" id="add_review{{ $invoice->id }}" tabindex="-1" role="dialog"
    aria-labelledby="addReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addReviewModalLabel">إضافة مراجعة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctor.diagnostic.addReview') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- الحقول المخفية -->
                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                    <input type="hidden" name="patient_id" value="{{ $invoice->patient_id }}">
                    <input type="hidden" name="doctor_id" value="{{ $invoice->doctor_id }}">

                    <!-- حقل التشخيص -->
                    <div class="form-group">
                        <label for="diagnosis">التشخيص</label>
                        <textarea class="form-control" name="diagnosis" rows="6" placeholder="أدخل التشخيص هنا..."></textarea>
                    </div>

                    <!-- حقل الأدوية -->
                    <div class="form-group">
                        <label for="medicine">الأدوية</label>
                        <textarea class="form-control" name="medicine" rows="6" placeholder="أدخل الأدوية هنا..."></textarea>
                    </div>

                    <!-- حقل تاريخ المراجعة -->
                    <div class="form-group">
                        <label for="review_date">تاريخ المراجعة</label>
                        <input type="date" class="form-control" name="review_date" id="review_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                </div>
            </form>
        </div>
    </div>
</div>
