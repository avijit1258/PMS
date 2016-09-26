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
        $projects = DB::select("SELECT * FROM project where 1");
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
        return redirect()->back();
    }
}
