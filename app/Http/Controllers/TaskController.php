<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $auth = \Auth::user()->id;
        $projects = DB::select("SELECT * FROM project,project_user where project.id = project_user.project_id AND project_user.user_id = '$auth' AND project_user.project_id = '$id'");
        $users = DB::select("SELECT users.id AS uid, name FROM users, project_user where project_user.user_id = users.id AND project_id = '$id'");
        $roles = DB::select("SELECT * FROM role where 1");
        $task_types = DB::select("SELECT * FROM task_type where 1");
        $statuses = DB::select("SELECT * FROM status where 1");


        return view('task.create',compact('users', 'statuses', 'roles' , 'task_types', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['task' => 'required|alpha_num', 'assigned_to' => 'required', 'project_id' => 'required', 'status_id' => 'required', 'task_type_id' => 'required']);
        DB::insert("INSERT INTO task (task, assigned_to, project_id, status_id, task_type_id) VALUES ('$request->task', '$request->assigned_to', '$request->project_id', '$request->status_id', '$request->task_type_id')");

         
        return redirect("/projects/$request->project_id/dashboard/");
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
        $auth = \Auth::user()->id;
        $projects = DB::select("SELECT * FROM project,project_user where project.id = project_user.project_id ");
        $users = DB::select("SELECT * FROM users, project_user where  users.id = user_id ");
        //dd($users);
        $roles = DB::select("SELECT * FROM role where 1");
        $task_types = DB::select("SELECT * FROM task_type where 1");
        $statuses = DB::select("SELECT * FROM status where 1");
        $task = DB::select("SELECT * FROM task where id = '$id'");

        return view('task.edit',compact('users', 'statuses', 'roles' , 'task_types', 'projects', 'task'));    
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
        DB::update("UPDATE task SET status_id = '$request->status_id' WHERE id = '$id'");
        $project = DB::select("SELECT distinct(project_id) FROM task WHERE id = '$id'");
        //dd($project);
        $project_id = $project[0]->project_id;
        //return redirect()->back();
        return redirect("/projects/ $project_id /dashboard/");

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
