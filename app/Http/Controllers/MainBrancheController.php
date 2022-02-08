<?php

namespace App\Http\Controllers;

use App\Models\MainBranche;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MainBrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    */
    public function index(Request $request)
    {
        if($request->ajax()){
            $mainBranche = MainBranche::all();

            return DataTables::of($mainBranche)
                ->addIndexColumn()
                ->editColumn('created_at', function (MainBranche $mainBranche) {
                    return $mainBranche->created_at->format('Y-m-d');
                })
                ->rawColumns(['record_select', 'actions'])
                ->make(true);
        }

        return view('dashboard.pages.main_branches.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.main_branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string',
        ]);

        $data = [];
        $data['name'] = $request->name;
        $img_path = null;
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $img = $request->file('logo');
            $img_path= $img->store('/MainBranches' , 'assets'); 
        
        }
            $data['logo'] = $img_path;
       
     

        MainBranche::create($data);
        return redirect()->route('main-branches.create') ;   
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
        //
    }
}
