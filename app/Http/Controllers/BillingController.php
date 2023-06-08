<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Billing;
use Illuminate\Http\Request;
use App\Http\Requests\BillingRequest;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billings = Billing::orderBy('id', 'desc')->get();
        return view('billing.index', compact('billings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('billing.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillingRequest $request)
    {
        $billing = new Billing();
        $billing->amount = $request->amount;
        $billing->due_date = $request->due_date;
        $billing->client_id = $request->client_id;
        $billing->description = $request->description;
        $billing->save();

        return redirect('billing')->with('success_message','Billing Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billing = Billing::findOrFail($id);
        return view('billing.show', compact('billing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billing = Billing::findOrFail($id);
        $clients = Client::all();
        return view('billing.edit', compact('billing', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BillingRequest $request, $id)
    {
        $billing = Billing::findOrFail($id);
        $billing->amount = $request->amount;
        $billing->due_date = $request->due_date;
        $billing->client_id = $request->client_id;
        $billing->description = $request->description;
        $billing->update();

        return redirect('billing')->with('success_message','Billing Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Billing::destroy($id);

        return redirect('billing')->with('success_message', 'Billing Deleted');
    }
}
