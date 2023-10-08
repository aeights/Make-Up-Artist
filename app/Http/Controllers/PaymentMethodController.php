<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $payments = PaymentMethod::all();
        return view('pages.admin.payments-method',[
            'payments' => $payments
        ]);
    }

    public function create()
    {
        return view('pages.admin.payment-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'name' => 'required',
            'account_number' => 'required|unique:payment_methods,account_number'
        ]);

        if ($validated) {
            $payment = PaymentMethod::create($validated);
            return to_route('list.payments')->with('message','Payment method added successfully!');
        }
    }

    public function edit($id)
    {
        $payment = PaymentMethod::find($id);
        return view('pages.admin.payment-edit',[
            'payment' => $payment
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'name' => 'required',
            'account_number' => 'required|unique:payment_methods,account_number'
        ]);

        if ($validated) {
            $payment = PaymentMethod::find($request->id)->update($validated);
            return to_route('list.payments')->with('message','Payment update successfully!');
        }
    }

    public function delete($id)
    {
        $payment = PaymentMethod::find($id);
        $payment->delete();
        return back()->with('message','Payment delete successfully!');
    }
}
