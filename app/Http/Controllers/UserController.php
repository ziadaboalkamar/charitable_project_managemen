<?php

namespace App\Http\Controllers;

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
        return view('dashboard.pages.users.create');
    }
    public function store(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function delete(){

    }
}
