<div class="modal fade" id="edit_xray_conversion{{ $patient_ray->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editRadiologyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRadiologyModalLabel">تعديل بيانات الأشعة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctor.rays.update', $patient_ray->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- استخدام طريقة PUT للتعديل -->
                <div class="modal-body">
                    <input type="hidden" name="invoice_id" value="{{ $patient_ray->invoice_id }}">
                    <input type="hidden" name="patient_id" value="{{ $patient_ray->patient_id }}">
                    <input type="hidden" name="doctor_id" value="{{ $patient_ray->doctor_id }}">
                    <div class="form-group">
                        <label for="radiology_notes">ملاحظات الأشعة</label>
                        <textarea class="form-control" name="description" rows="6" placeholder="أدخل ملاحظات الأشعة هنا...">{{ $patient_ray->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                </div>
            </form>
        </div>
    </div>
</div>