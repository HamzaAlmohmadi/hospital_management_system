<!-- نافذة الحذف لطلبات الأشعة -->
<div class="modal fade" id="delete{{ $patient_ray->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteRayModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRayModalLabel">حذف بيانات الأشعة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctor.rays.destroy', $patient_ray->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>هل أنت متأكد من حذف بيانات الأشعة؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>
    </div>
</div>