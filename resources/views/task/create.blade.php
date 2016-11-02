@extends('layouts.app')

@section('content')
    
       <div class="container narrow">
           <div>
                <div class="panel panel-default">
                <div class="panel-heading">
                    Add new Task
                </div>
                <div class="panel-body">
                            <div class="col-sm-4">
                                <form action="/tasks/" method="post" >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="task">Task</label>
                                    <input type="text" name="task">
                                </div>
                                <div class="form-group">
                                    <label for="project">Project</label>
                                   <select name="project_id" class=".form-control">
                                       @foreach($projects as $project)
                                       @if($project->role_id = 2 || $project->role_id = 1 )
                                       <option value="{{$project->project_id}}">{{$project->project_name}}
                                       </option>
                                       @endif
                                       
                                       @endforeach
                                   </select>
                                </div>

                               <div class="form-group">
                                    <label for="user">User</label>
                                   <select name="assigned_to" class=".form-control">
                                       @foreach($users as $user)
                                       <option value="{{$user->uid}}">{{$user->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                               
                                <div class="form-group">
                                    <label for="status">Status</label>
                                   <select name="status_id" class=".form-control">
                                       @foreach($statuses as $status)
                                       <option value="{{$status->id}}">{{$status->status}}
                                       </option>
                                       @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="task type">Task Type</label>
                                   <select name="task_type_id" class=".form-control">
                                       @foreach($task_types as $task_type)
                                       <option value="{{$task_type->id}}">{{$task_type->task_type}}
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
        {
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        }@endif
   

@endsection