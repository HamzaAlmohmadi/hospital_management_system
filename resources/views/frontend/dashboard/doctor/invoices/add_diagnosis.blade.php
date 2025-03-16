




<div class="modal fade" id="add_diagnosis{{ $invoice->id }}" tabindex="-1" role="dialog"
    aria-labelledby="addDiagnosisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDiagnosisModalLabel">إضافة تشخيص</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctor.diagnostic.createDiagnosis') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- الحقول المخفية -->
                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                    <input type="hidden" name="patient_id" value="{{ $invoice->patient_id }}">
                    <input type="hidden" name="doctor_id" value="{{ $invoice->doctor_id }}">

                    <!-- حقل التشخيص -->
                    <div class="form-group">
                        <label for="diagnosis">التشخيص</label>
                        <textarea class="form-control @error('diagnosis') is-invalid @enderror" name="diagnosis" rows="6"
                            placeholder="أدخل التشخيص هنا..."></textarea>
                        @error('diagnosis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- حقل الأدوية -->
                    <div class="form-group">
                        <label for="medicine">الأدوية</label>
                        <textarea class="form-control @error('medicine') is-invalid @enderror" name="medicine" rows="6"
                            placeholder="أدخل الأدوية هنا..."></textarea>
                        @error('medicine')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
