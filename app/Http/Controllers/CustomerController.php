<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        $customer = new Customer();
        return view('customer.create', compact('customer'));
    }

    public function store()
    {
        $customer = Customer::create($this->validatedData());
        Mail::to($customer->email)->send(new WelcomeMail());
        return redirect('/customers/' . $customer->id);
    }

    public function show(Customer $customer)
    {
        // $customer = Customer::findOrFail($customerId);
        return view('customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validatedData());
        return redirect('/customers');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('/customers');
    }

    protected function validatedData()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required | email',
        ]);
    }
}
