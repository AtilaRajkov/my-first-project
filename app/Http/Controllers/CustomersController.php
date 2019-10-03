<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Mail;
use App\Events\NewCustomerHasRegisteredEvent;

class CustomersController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::where('active', 0)->get();
        $customers = Customer::all();

        return view('customers.index', compact(['customers']));

    }

    public function create() {

        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }


    public function store()
    {

        $customer = Customer::create($this->validateRequest());

        event(new NewCustomerHasRegisteredEvent($customer));

        return redirect('customers');
    }


    public function show(Customer $customer) {
//        $customer = Customer::where('id', $customer)->firstOrFail();
//        $customer = Customer::firstOrFail($customer);
        return view('customers.show', compact('customer'));
    }


    public function edit(Customer $customer) {

        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }


    public function update(Customer $customer) {

        $customer->update($this->validateRequest());

        return redirect('/customers/' . $customer->id);
    }


    public function destroy(Customer $customer) {

        $customer->delete();

        return redirect('customers');
    }


    protected function validateRequest() {

        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);
    }

}
