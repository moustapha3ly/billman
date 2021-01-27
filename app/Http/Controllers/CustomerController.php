<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Customer;
use App\Company;
use Illuminate\Support\Facades\Session;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('customers')->join('companies','companies.id','customers.shop') ->select('customers.*', 'companies.name')->paginate(10);

        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies =Company::all();
        return view('customers.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'email',
            'shop' => 'exists:App\Company,id'
        ]);
        $customer = new Customer;
        $customer->firstname=$request->firstname;
        $customer->lastname=$request->lastname;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->website=$request->website;
        $customer->shop=$request->shop;
        $customer->save();
        Session::flash('created_message','create success');
        return redirect(route('customer'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
         $companies =Company::all();

        return view('customers.create',['customer'=>$customer,'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'email',
            'shop' => 'exists:App\Company,id'
        ]);
        $customer = Customer::find($id);
        $customer->firstname=$request->firstname;
        $customer->lastname=$request->lastname;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->website=$request->website;
        $customer->shop=$request->shop;
        $customer->save();
        Session::flash('created_message','update success');
        return redirect(route('customer'));
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        Session::flash('deleted_message','Deleted success');
        return redirect(route('customer'));
        
    }
}
