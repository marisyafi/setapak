<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Pemandu;
use DB;

class PemanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pemandu.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemandu = Pemandu::findOrFail($id);
		return view('pemandu.show', compact('pemandu'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemandu = Pemandu::findOrFail($id);
		$pemandu->delete();

		return redirect()->route('pemandu.index')->with('message2', 'Item deleted successfully.');
    }

    public function dataPemandu(){		

		return Datatables::queryBuilder(DB::table('pemandu'))
        ->addColumn('action', function ($d) {
		// 	// if(Auth::user()->role != "publik")
			return 
            '<a href="/pemandu/'.$d->id.'" class="btn btn-xs btn-primary" ><i class="glyphicon glyphicon-eye-open"></i> View</a>
            <form action="/pemandu/'.$d->id.'" method="POST" style="display: inline;" onsubmit="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
            </form>
		 '.$this->approvehtml($d).'';
        })
		->make(true);
    }

    public function approvehtml($d){
        if($d->status==0) 
            return 
            '<form action="/pemandustatus/'.$d->id.'" method="POST" style="display: inline;" onsubmit="if(confirm("Publsih? Are you sure?")) { return true } else {return false };">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button type="submit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Approve</button>
            </form>';
        else
             return
            '<form action="/pemandustatus/'.$d->id.'" method="POST" style="display: inline;" onsubmit="if(confirm("Unpublish ID ? Are you sure?")) { return true } else {return false };">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="status" value="0">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button type="submit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-remove"></i> Reject</button>
            </form>';
        
    }
    
    public function status(Request $request, $id) {
    
            $this->validate($request, [
                'status' => 'required'
            ]);
    
            $pemandu = Pemandu::findOrFail($id);
            $pemandu->status = $request->input("status");
            $pemandu->save();
    
            return redirect()->route('pemandu-wisata.index')->with('message', 'Memperbaharui status berhasil.');
    }


}