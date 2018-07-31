<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::get();  
        return view('bank.index', compact('bank'));
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
        $this->validate($request, [
            'nama_bank' => 'required|max:255',
            'no_rekening' => 'required|numeric',          
			'picture' => 'mimes:jpg,jpeg,png',                     
        ]);

        $bank = new Bank;
        $bank->nama_bank = $request->input("nama_bank");
        $bank->no_rekening = $request->input("no_rekening");
        $bank->photo = $request->input("photo");
        $bank->status = "0";

        if ($request->hasFile('photo')) {
			$imageTempName = $request->file('photo')->getPathname();
			$imageName = $request->file('photo')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/bank/';
			$request->file('photo')->move($path , $imageName);
			$bank->photo = '/upload/images/bank/'.$imageName;
        }
        $bank->save();
        
        return redirect()->route('bank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'nama_bank' => 'required|max:255',
            'no_rekening' => 'required|numeric',          
			'picture' => 'mimes:jpg,jpeg,png',                     
        ]);
            
        $bank = Bank::findOrFail($id);
        $bank->nama_bank = $request->input("nama_bank");
        $bank->no_rekening = $request->input("no_rekening");

        if ($request->hasFile('photo')) {
            $bank->photo = $request->input("photo");
			$imageTempName = $request->file('photo')->getPathname();
			$imageName = $request->file('photo')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/bank/';
			$request->file('photo')->move($path , $imageName);
			$bank->photo = '/upload/images/bank/'.$imageName;
        }

        $bank->save();

        return redirect()->route('bank.index')->with('message2', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
		$bank->delete();

		return redirect()->route('bank.index')->with('message2', 'Item deleted successfully.');
    }

    public function status(Request $request, $id) {
    
        $this->validate($request, [
            'status' => 'required'
        ]);
            
        $bank = Bank::findOrFail($id);
        $bank->status = $request->input("status");
        $bank->save();

        return redirect()->route('bank.index')->with('message', 'Memperbaharui status berhasil.');
    }
}
