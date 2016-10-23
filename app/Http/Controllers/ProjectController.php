<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Project;
use App\Http\Requests;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sl = 1;
        $auth = \Auth::user()->id;
        //$projects = DB::select("SELECT * FROM project WHERE 'project_owner' = $auth");
        $projects = DB::select("SELECT * FROM project, project_user WHERE project.id = project_user.project_id AND user_id = '$auth'");
        //dd($projects);
        //dd($projects);

        return view('project.index', compact('projects', 'sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth = \Auth::user()->id;
        DB::insert("INSERT INTO project (project_name) VALUES ('$request->project_name')");
        $project_id = DB::select("SELECT id FROM project WHERE project_name = '$request->project_name'");
        //dd($project_id[0]->id);
        $id = $project_id[0]->id;
        DB::insert("INSERT INTO project_user (project_id, user_id, role_id) VALUES
            ('$id','$auth' , 2)");
        
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = DB::select("SELECT * FROM project WHERE id = '$id' ");

        return $project;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = DB::select("SELECT * FROM project WHERE id = '$id'");
        //dd($project);

        return view('project.edit', compact('project'));
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
         DB::update("UPDATE 'project' SET 'project_name'=$request->project_name WHERE 'id' = $id");

         return redirect('/projects/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM 'project' WHERE 'id'= $id");

        return view('/projects/');
    }

    public function dashboard($id)
    {

        $auth = \Auth::user()->id;//for giving permision to edit task to assigned users
        $project = DB::select("SELECT * FROM project WHERE id = '$id' ");
        $tasks = DB::select("SELECT task, assigned_to,status_id, role_id , task.id AS tid, task.project_id FROM task,project_user WHERE task.project_id = '$id' AND assigned_to = user_id AND task.project_id = project_user.project_id");
        //$role_auth = DB::select("SELECT role_id FROM project_user WHERE project_id = '$id' AND user_id = '$auth'"); 
        //dd($tasks);
        //for showing user add option to product owner and scrum master
        $if_admin = DB::select("SELECT role_id FROM project_user WHERE user_id = '$auth' AND project_id = '$id'");
        

        return view('project.dashboard', compact('project', 'tasks', 'id', 'auth', 'if_admin'));
    }
}
