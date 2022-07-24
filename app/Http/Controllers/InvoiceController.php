<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\InvoiceItem;
use DB;
use Validator;


class InvoiceController extends Controller
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
        $products = Product::get();
       return view('Admin.invoices.index',compact('customers','products'));
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
            'date'         => 'required|date',
            'customer_id'  => 'required|numeric',
        ]);

        $invoice = Invoice::create([
            'date'=>$request->date,
            'customer_id'=>$request->customer_id,
        ]);

         $id   = $invoice->id;
        $product   = $request->product_id;
        $qty       = $request->qty;
        $total     = $request->total;

        for ($i=0; $i<count($product); $i++){
            InvoiceItem::create([
                    'invoice_id'   =>$id,
                    'product_id'   =>$product[$i],
                    'qty'         =>$qty[$i],
                    'total'       =>$total[$i],
                ]);
            }

        toastr()->success('تم الحفظ بنجاح ');
        return redirect()->route('invoices.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    // public function getprice($id){
    //     $price = DB::table("products")->where("id", $id)->pluck("price","id");
    //     return json_encode($price);
    // }

  
}
