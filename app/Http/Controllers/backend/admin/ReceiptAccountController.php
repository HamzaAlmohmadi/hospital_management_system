<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\ReceiptAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptAccountController extends Controller
{

    public function index()
    {
        
        $receipts =  ReceiptAccount::all();
        return view('backend.admin.Finance.Receipt.index',compact('receipts'));
    }



    public function create()
    {
        $Patients = Patient::all();
        return view('backend.admin.Finance.Receipt.create',compact('Patients'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try{
            // store receipt_accounts
            $receipt_accounts = new ReceiptAccount();
            $receipt_accounts->date =date('y-m-d');
            $receipt_accounts->patient_id = $request->patient_id;
            $receipt_accounts->amount = $request->Debit;
            $receipt_accounts->description = $request->description;
            $receipt_accounts->save();

            // store fund_accounts
            $fund_accounts = new FundAccount();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->receipt_id = $receipt_accounts->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->save();
            
            // store patient_accounts
            $patient_accounts = new PatientAccount();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->receipt_id = $receipt_accounts->id;
            $patient_accounts->Debit = 0.00;
            $patient_accounts->credit =$request->Debit;
            $patient_accounts->save();

            DB::commit();
            toastr()->success('تم حفظ القيد بنجاح');
            return redirect()->route('admin.receipts.create');
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function show($id)
    {
        $receipt = ReceiptAccount::findorfail($id);
        return view('backend.admin.Finance.Receipt.print',compact('receipt'));
    }
    

    public function edit($id)
    {
        $receipt_accounts = ReceiptAccount::findorfail($id);
        $Patients = Patient::all();
        return view('backend.admin.Finance.Receipt.edit',compact('receipt_accounts','Patients'));
    }

    public function update(Request $request)
    {
        DB::beginTransaction();

        try{
            // store receipt_accounts
            $receipt_accounts = ReceiptAccount::findorfail($request->id);
            $receipt_accounts->date =date('y-m-d');
            $receipt_accounts->patient_id = $request->patient_id;
            $receipt_accounts->amount = $request->Debit;
            $receipt_accounts->description = $request->description;
            $receipt_accounts->save();
            // store fund_accounts
            $fund_accounts = FundAccount::where('receipt_id',$request->id)->first();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->receipt_id = $receipt_accounts->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->save();
            // store patient_accounts
            $patient_accounts = PatientAccount::where('receipt_id',$request->id)->first();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->receipt_id = $receipt_accounts->id;
            $patient_accounts->Debit = 0.00;
            $patient_accounts->credit =$request->Debit;
            $patient_accounts->save();


            DB::commit();
            toastr()->success('تم تعديل القيد بنجاح');
            return redirect()->route('admin.receipts.index');
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            ReceiptAccount ::destroy($id);
            
            return response()->json(['status' => 'success', 'message' => 'تم حذف القيد بنجاح']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
