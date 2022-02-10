<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeneficiaryRequest;
use App\Models\Beneficiary;
use App\Models\Branches;
use App\Models\City;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function getPossibleGender(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM beneficiaries WHERE Field = "gender"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $beneficiary = Beneficiary::all();

            return DataTables::of($beneficiary)
                ->addIndexColumn()
                ->editColumn('created_at', function (Beneficiary $beneficiary) {
                    return $beneficiary->created_at->format('Y-m-d');
                })
                ->editColumn('city_name', function (Beneficiary $beneficiary) {
                    return $beneficiary->cities->city_name;
                })
                ->editColumn('branch_name', function (Beneficiary $beneficiary) {
                    return $beneficiary->branchs->address;
                })
                // ->editColumn('project_name', function (Beneficiary $beneficiary) {
                //     return $beneficiary->projects->company_name;
                // })
                ->rawColumns(['record_select', 'actions'])
                ->make(true);
        }

        return view('dashboard.pages.beneficiareis.index',[
            'beneficiareis' => Beneficiary::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.beneficiareis.create',[
            'cities' => City::get(),
            'projects' => Project::get(),
            'brnches' => Branches::get(),
            'getPossibleGender' =>BeneficiaryController::getPossibleGender(),
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
        $data = [];
        $data['firstName'] = $request->firstName;
        $data['secondName'] = $request->secondName;
        $data['thirdName'] = $request->thirdName;
        $data['lastName'] = $request->lastName;
        $data['gender'] = $request->gender;
        $data['id_number'] = $request->id_number;
        $data['PhoneNumber'] = $request->PhoneNumber;
        $data['family_member'] = $request->family_member;
        $data['branch_id'] = $request->branch_id;
        $data['project_id'] = $request->project_id;
        $data['city_id'] = $request->city_id;
        $data['address'] = $request->address;
        $data['maritial'] = $request->maritial;
        $data['status_id'] = $request->status_id;
        
        Beneficiary::create($data);
        toastr()->success(__('تم حفظ البيانات بنجاح'));

        return redirect()->route('beneficiareis.index') ;        
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
