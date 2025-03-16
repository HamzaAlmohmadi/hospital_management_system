<!-- نافذة الحذف -->
<div class="modal fade" id="deleted_laboratorie{{ $patient_Laboratorie->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteLabModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabModalLabel">حذف بيانات المختبر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('doctor.Laboratories.destroy', $patient_Laboratorie->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <!-- محتوى النافذة -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
