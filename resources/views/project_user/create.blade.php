@extends('layouts.app')

@section('content')
    
       <div class="container narrow">
           <div>
                <div class="panel panel-default">
                <div class="panel-heading">
                    Add new project user
                </div>
                <div class="panel-body">
                            <div class="col-sm-4">
                                <form action="/project_users/" method="post" >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="project">Project</label>
                                   <select name="project_id" class=".form-control">
                                       @foreach($projects as $project)
                                       <option value="{{$project->project_id}}">{{$project->project_name}}
                                       </option>
                                       @endforeach
                                   </select>
                                </div>

                               <div class="form-group">
                                    <label for="user">User</label>
                                   <select name="user_id" class=".form-control">
                                       @foreach($users as $user)
                                       <option value="{{$user->id}}">{{$user->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                               
                                <div class="form-group">
                                    <label for="role">Role</label>
                                   <select name="role_id" class=".form-control">
                                       @foreach($roles as $role)
                                       <option value="{{$role->id}}">{{$role->role_name}}
                                       </option>
                                       @endforeach
                                    </select>
                                </div>
                               <input type="submit" name="Submit">

                            </form> 
                            </div>
                    </div>   
                            
                </div>
                </div>
        </div>
        @if($errors->any())
        
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
   

@endsection