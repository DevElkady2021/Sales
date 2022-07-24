<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Validator;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return view('Admin.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:customers|email',
            'address' => 'required|max:255',
        ]);
       
                $Customer = Customer::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'address'=>$request->address,
                 ]);
            toastr()->success('تم الحفظ بنجاح ');
            return redirect()->route('customers.index');  
            
           

      
   
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:customers|email',
            'address' => 'required|max:255',
        ]);
       

        $customer = Customer::where('id',$id)->first();
        $customer->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
         ]);

            toastr()->success('تم التعديل بنجاح ');

            return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::where('id',$id)->first();
        $customer->destroy($id);
        toastr()->success('تم الحذف بنجاح ');

        return redirect()->route('customers.index');
        
    }
}
