<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request){

        if($request->ajax()){
            $users = User::all();

            return DataTables::of($users)
                ->addIndexColumn()
                ->editColumn('created_at', function (User $users) {
                    return $users->created_at->format('Y-m-d');
                })
                ->editColumn('fullName', function (User $users) {
                    $firstName= $users->firstName;
                    $lastName= $users->lastName;

                    return $firstName + $lastName;
                })
                ->rawColumns(['record_select', 'actions'])
                ->make(true);
        }

        return view('dashboard.pages.users.index');
    }


    public function create(){
        try {
            $roles = Role::all();
            $branches = Branches::all();
            return view('dashboard.pages.users.create',compact('roles','branches'));
        }catch (\Exception $ex){

        }
        return view('dashboard.pages.users.create');
    }
    public function store(Request $request){
        try {
//            User::create([
//                'firstname' => $request->name,
//                'lastname' => $request->price,
//                'jobName' => $request->size,
//                'email' => $request->category_id,
//                'phoneNumber' => $request -> active ,
//                'password' => $filePath,
//                'rolle_id' => $request->description,
//                'branch_id' => implode('|' , $image),
//                'userName'=>
//
//
//            ]);
        }catch (\Exception $ex){

        }
        return $request;

    }
    public function edit(){

    }
    public function update(){

    }
    public function delete(){

    }
}
