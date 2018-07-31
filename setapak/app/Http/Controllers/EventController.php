<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Event;
use DB;

class EventController extends Controller
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
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
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
            'title' => 'required|max:255',
            'description' => 'required',
            'tanggal'=>'required',            
			'picture' => 'mimes:jpg,jpeg,png',                     
        ]);

        $event = new Event;
		/* $user = Auth::user();   */   
		$event->title = $request->input("title");
        $event->user = "Admin";
        $event->description = $request->input("description");
        $event->picture = $request->input("picture");
        $event->tanggal = $request->input("tanggal");
        $event->status = 0;
		
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$event->picture = '/upload/images/'.$imageName;
		}
		$event->save();

		return redirect()->route('event.index')->with('message2', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
		return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

		return view('event.edit', compact('event'));
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
            'title' => 'required|max:255',
            'description' => 'required',
            'tanggal'=>'required',            
			'picture' => 'mimes:jpg,jpeg,png',                                       
        ]);

		// $user = Auth::user();        
		$event = Event::findOrFail($id);
		$event->title = $request->input("title");
        $event->description = $request->input("description");
        $event->tanggal = $request->input("tanggal");

		if ($request->hasFile('picture')) {
			$event->picture = $request->input("picture");
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$event->picture = '/upload/images/'.$imageName;
		}

		$event->save();

		return redirect()->route('event.index')->with('message2', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        
        return redirect()->route('event.index')->with('message2', 'Item deleted successfully.');
    }

    public function dataEvent(){		

		return Datatables::queryBuilder(DB::table('event')
		->orderBy('tanggal', 'desc'))
		->editColumn('tanggal', function ($ev) {
			return date('j F Y', strtotime($ev->tanggal));
        })
		// ->editColumn('active', function ($berita) {
        //     if($berita->active==1)
        //         return "Yes";
        //     elses
        //         return "No";
        // })
        ->addColumn('action', function ($d) {
		// 	// if(Auth::user()->role != "publik")
			return 
            '<a href="/event/'.$d->id.'" class="btn btn-xs btn-primary" ><i class="glyphicon glyphicon-eye-open"></i> View</a>
            <a href="/event/'.$d->id.'/edit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <form action="/event	/'.$d->id.'" method="POST" style="display: inline;" onsubmit="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="'.csrf_token().'">
            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
        </form>
		 '.$this->approvehtml($d).'';
		// else 
			// return 
			// '<a href="/event/'.$d->id.'" class="btn btn-xs btn-primary" ><i class="glyphicon glyphicon-eye-open"></i> View</a>';		
        })
		->make(true);
    }

    public function approvehtml($d){
        if($d->status==1) 
            return 
            '<form action="/eventstatus/'.$d->id.'" method="POST" style="display: inline;" onsubmit="if(confirm("Publsih? Are you sure?")) { return true } else {return false };">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="status" value="0">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button type="submit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-remove"></i> Reject</button>
            </form>';
        else
             return
            '<form action="/eventstatus/'.$d->id.'" method="POST" style="display: inline;" onsubmit="if(confirm("Unpublish ID ? Are you sure?")) { return true } else {return false };">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button type="submit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Publish</button>
            </form>';
        
    }

    public function status(Request $request, $id) {
    
            $this->validate($request, [
                'status' => 'required'
            ]);
    
            $event = Event::findOrFail($id);
            $event->status = $request->input("status");
            $event->save();
    
            return redirect()->route('event.index')->with('message', 'Memperbaharui status berhasil.');
    }
}
