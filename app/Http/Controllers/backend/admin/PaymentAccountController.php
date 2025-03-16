<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\PaymentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentAccountController extends Controller
{
   
    
    public function index()
    {
        $payments =  PaymentAccount::all();
        return view('backend.admin.Finance.Payment.index',compact('payments'));
    }

    public function create()
    {
        $Patients = Patient::all();
        return view('backend.admin.Finance.Payment.create',compact('Patients'));
    }

    public function show($id)
    {
        $payment_account = PaymentAccount::findorfail($id);
        return view('`.Finance.Payment.print',compact('payment_account'));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        try {

            // store receipt_accounts
            $payment_accounts = new PaymentAccount();
            $payment_accounts->date =date('y-m-d');
            $payment_accounts->patient_id = $request->patient_id;
            $payment_accounts->amount = $request->credit;
            $payment_accounts->description = $request->description;
            $payment_accounts->save();

            // store fund_accounts
            $fund_accounts = new FundAccount();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->Payment_id = $payment_accounts->id;
            $fund_accounts->credit = $request->credit;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->save();

            // store patient_accounts
            $patient_accounts = new PatientAccount();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->Payment_id = $payment_accounts->id;
            $patient_accounts->Debit = $request->credit;
            $patient_accounts->credit = 0.00;
            $patient_accounts->save();

            DB::commit();
            toastr()->success('تم اضافة المبلغ بنجاح');
            return redirect()->route('admin.payments.create');

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $payment = PaymentAccount::findorfail($id);
        $Patients = Patient::all();

        return view('backend.admin.Finance.Payment.edit',compact('payment','Patients'));
    }

    
    public function update(Request $request)
    {
        DB::beginTransaction();

        try {

            // update receipt_accounts
            $payment_accounts = PaymentAccount::findorfail($request->id);
            $payment_accounts->date =date('y-m-d');
            $payment_accounts->patient_id = $request->patient_id;
            $payment_accounts->amount = $request->credit;
            $payment_accounts->description = $request->description;
            $payment_accounts->save();

            // update fund_accounts
            $fund_accounts = FundAccount::where('Payment_id',$payment_accounts->id)->first();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->Payment_id = $payment_accounts->id;
            $fund_accounts->credit = $request->credit;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->save();

            // update patient_accounts
            $patient_accounts = PatientAccount::where('Payment_id',$payment_accounts->id)->first();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->Payment_id = $payment_accounts->id;
            $patient_accounts->Debit = $request->credit;
            $patient_accounts->credit = 0.00;
            $patient_accounts->save();

            DB::commit();
            toastr('تم التعديل بنجاح', 'success');
            return redirect()->route('admin.payments.index');

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            PaymentAccount ::destroy($id);
            
            return response()->json(['status' => 'success', 'message' => 'تم حذف القيد بنجاح']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function getBalance($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $balance = $patient->patient_account->sum('credit') - $patient->patient_account->sum('Debit');

            return response()->json(['success' => true, 'balance' => number_format($balance)]);
        } else {
            return response()->json(['success' => false]);
        }
    
    }



}


