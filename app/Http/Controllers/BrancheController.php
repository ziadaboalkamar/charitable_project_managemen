<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\City;
use Illuminate\Http\Request;

class BrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.branches.create',[
            'cities' => City::get(),
        ]);
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
            'address' => 'required|string',
            'phoneNumber' => 'required|numeric',
            'email' => 'required',
            'number_of_employe' => 'required|numeric',
            'manager_name' => 'required|string',
            'city_id' => 'required',
        ]);
        //  return $request;
        $data = [];
        $data['address'] = $request->address;
        $data['phoneNumber'] = $request->phoneNumber;
        $data['email'] = $request->email;
        $data['number_of_employe'] = $request->number_of_employe;
        $data['manager_name'] = $request->manager_name;
        $data['city_id'] = $request->city_id;
        
        Branches::create($data);
        return redirect()->route('branches.create') ;
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
