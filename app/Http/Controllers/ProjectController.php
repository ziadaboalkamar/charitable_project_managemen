<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ProjectController extends Controller
{
    public function index(Request $request){

        if($request->ajax()){
            $project = Project::all();

            return DataTables::of($project)
                ->addIndexColumn()
                ->editColumn('created_at', function (Project $project) {
                    return $project->created_at->format('Y-m-d');
                })
                ->rawColumns(['record_select', 'actions'])
                ->make(true);
        }

        return view('dashboard.pages.projects.index');
    }


    public function create(){
        return view('dashboard.pages.projects.create');
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
