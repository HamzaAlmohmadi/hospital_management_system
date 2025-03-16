



<!-- Deleted insurance -->
<div class="modal fade" id="approval{{ $appointment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    
   <div class="modal-dialog">
       <div class="modal-content bg-white dark:bg-gray-800 rounded-lg shadow-lg">
           <!-- Modal Header -->
           <div class="modal-header bg-purple-600 dark:bg-purple-700 p-4 rounded-t-lg">
               <h5 class="modal-title text-white dark:text-gray-200 text-lg font-semibold" id="exampleModalLabel">
                   تأكيد موعد المريض
               </h5>
               <button type="button" class="close text-white dark:text-gray-200" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>

           <!-- Modal Body -->
           <div class="modal-body p-6">
               <form action="{{ route('admin.appointments.approval', $appointment->id) }}" method="post">
                   @method('PUT')
                   @csrf
                   <input type="hidden" name="id" value="{{ $appointment->id }}">
                   <p class="text-gray-900 dark:text-gray-100 mb-4">{{ $appointment->name }}</p>

                   <!-- Input Group -->
                   <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                       <div class="card bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm">
                           <div class="card-body p-4">
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text bg-gray-200 dark:bg-gray-600 border-gray-300 dark:border-gray-500">
                                           <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6 text-gray-700 dark:text-gray-200"></i>
                                       </div>
                                   </div>
                                   <input class="form-control w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:border-purple-500 focus:ring-purple-500"
                                          name="appointment" id="datetimepicker" type="text" value="{{ date('Y-m-d H:i') }}">
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- Modal Footer -->
                   <div class="modal-footer bg-gray-50 dark:bg-gray-700 p-4 rounded-b-lg">
                       <button type="button"
                               class="btn bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200"
                               data-dismiss="modal">
                           إغلاق
                       </button>
                       <button type="submit"
                               class="btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition duration-200">
                           حفظ
                       </button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>




