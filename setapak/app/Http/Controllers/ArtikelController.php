<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Artikel;
use DB;

class ArtikelController extends Controller
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
        //
        return view('artikels.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikels.create');
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

        $artikel = new Artikel;
		/* $user = Auth::user();   */   
		$artikel->title = $request->input("title");
        $artikel->user = "Admin";
        $artikel->description = $request->input("description");
        $artikel->picture = $request->input("picture");
		$artikel->tanggal = $request->input("tanggal");
		
		if ($request->hasFile('picture')) {
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$artikel->picture = '/upload/images/'.$imageName;
		}
		$artikel->save();

		return redirect()->route('artikels.index')->with('message2', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
		return view('artikels.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);

		return view('artikels.edit', compact('artikel'));
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

		$user = Auth::user();        
		$artikel = Artikel::findOrFail($id);
		$artikel->title = $request->input("title");
        $artikel->description = $request->input("description");
        $artikel->tanggal = $request->input("tanggal");

		if ($request->hasFile('picture')) {
			$artikel->picture = $request->input("picture");
			$imageTempName = $request->file('picture')->getPathname();
			$imageName = $request->file('picture')->getClientOriginalName();
			$path = base_path() . '/public/upload/images/';
			$request->file('picture')->move($path , $imageName);
			$artikel->picture = '/upload/images/'.$imageName;
		}

		$artikel->save();

		return redirect()->route('artikels.index')->with('message2', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
		$artikel->delete();

		return redirect()->route('artikels.index')->with('message2', 'Item deleted successfully.');
    }

    public function dataArtikel(){		

		return Datatables::queryBuilder(DB::table('artikel')
		->orderBy('tanggal', 'desc'))
		->editColumn('tanggal', function ($berita) {
			return date('j F Y', strtotime($berita->tanggal));
        })
		// ->editColumn('active', function ($berita) {
        //     if($berita->active==1)
        //         return "Yes";
        //     else
        //         return "No";
        // })
        ->addColumn('action', function ($d) {
		// 	// if(Auth::user()->role != "publik")
			return 
            '<a href="/artikels/'.$d->id.'" class="btn btn-xs btn-primary" ><i class="glyphicon glyphicon-eye-open"></i> View</a>
            <a href="/artikels/'.$d->id.'/edit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <form action="/artikels	/'.$d->id.'" method="POST" style="display: inline;" onsubmit="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
            </form>
		 '.'';
		// else 
			// return 
			// '<a href="/artikels/'.$d->id.'" class="btn btn-xs btn-primary" ><i class="glyphicon glyphicon-eye-open"></i> View</a>';		
        })
		->make(true);
    }
}