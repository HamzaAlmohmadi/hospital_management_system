<div class="modal fade" id="transfer_lab{{ $invoice->id }}" tabindex="-1" role="dialog"
    aria-labelledby="transferLabModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transferLabModalLabel">تحويل إلى مختبر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctor.Laboratories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                    <input type="hidden" name="patient_id" value="{{ $invoice->patient_id }}">
                    <input type="hidden" name="doctor_id" value="{{ $invoice->doctor_id }}">
                    <div class="form-group">
                        <label for="lab_notes">ملاحظات المختبر</label>
                        <textarea class="form-control" name="description" rows="6" placeholder="أدخل ملاحظات المختبر هنا..."></textarea>
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
