<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
//use App\Events\NewCustomerHasRegisteredEvent;
use App\Test;
use Illuminate\Http\Request;
use App\CustomStuff\VerifyEmailClass;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('tests.index', compact(['customers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $companies = Company::all();
        $customer = new Customer();

        return view('tests.create', compact('companies', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:customers|max:190',
            'active' => 'required',
            'company_id' => 'required',
        ]);

        $customer = new Customer();

        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->company_id = request('company_id');



        /// Email Verification: *****************************************************************************************************************************

        // Initialize library class
        $mail = new VerifyEmailClass();

        // Set the timeout value on stream
        $mail->setConnectionTimeout(20);

        // Set debug output mode
        $mail->Debug = false;
        $mail->Debugoutput = 'html';

        // Set email address for SMTP request
        $mail->setEmailFrom('atilar777@gmail.com');

        // Email to check
        $email = request('email');

        // Check if email is valid and exists
        if ($mail->check($email)) {
            // Email Exists.
            $customer->email_verified = 1;
        }

        // ****************************************************************************************************************************************************

        $customer->save();

        return redirect('test');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }



}
