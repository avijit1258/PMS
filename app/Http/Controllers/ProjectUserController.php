<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_users = DB::select("SELECT * FROM project_user where 1");

        return view('project_user.index', compact('project_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = \Auth::user()->id;
        $projects = DB::select("SELECT * FROM project, project_user where user_id='$auth' AND project_user.project_id = project.id AND (role_id = 1 OR role_id = 2) ");
        $users = DB::select("SELECT * FROM users where 1");
        $roles = DB::select("SELECT * FROM role where 1");

        return view('project_user.create', compact('projects', 'users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['project_id' => 'required|int', 'user_id' => 'required', 'role_id' => 'required']);
        DB::insert("INSERT INTO project_user (project_id, user_id, role_id) VALUES ('$request->project_id', '$request->user_id', '$request->role_id')");
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project_user = DB::select("SELECT * FROM project_user where 'id'=$id");

        return $project_user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project_user = DB::select("SELECT * FROM project_user where 'id'=$id");

        return view('project_user.edit');
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
        DB::update("UPDATE 'project_user' SET 'project_id'=$request->project_id', 'user_id' = $request->user_id, 'role_id' = $request->role_id WHERE 'id' = $id");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM project_user where 'id'=$id");
        
        return redirect('/home');
    }

    public function all_user($id)
    {
        $sl = 1;
        $project_users = DB::select("SELECT * FROM project,project_user, role, users WHERE project_id='$id' AND project_user.role_id = role.id AND project_user.project_id = project.id AND project_user.user_id = users.id");
        return view('project_user.all_user',compact('project_users', 'sl'));
    }
    public function showing_add_request()
    {
        $auth = \Auth::user()->id;
        $add_requests = DB::select("SELECT project_name, role_name, project_user.id AS serial FROM project_user,users,role, project WHERE users.id = project_user.user_id AND project_user.role_id = role.id AND project_user.project_id = project.id AND user_id='$auth' AND active = 0 ");

        $sl = 1;
        return view('home',compact('add_requests', 'sl'));
    }
    public function confirm()
    {
        DB::update("UPDATE project_user SET active = 1");
        return redirect('/projects');
    }
}
