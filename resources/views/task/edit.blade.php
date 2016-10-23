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
                                <form action="/tasks/{{$task[0]->id}}" method="post" >
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT" />

                                <div class="form-group">
                                    <label for="task">Task</label>
                                    <input type="text" name="task" value="{{$task[0]->task}}">
                                </div>
                                
                               
                                <div class="form-group">
                                    <label for="status">Status</label>
                                   <select name="status_id" class=".form-control">
                                       @foreach($statuses as $status)
                                       @if($status->id == $task[0]->status_id)
                                       <option value="{{$status->id}}" selected="selected">{{$status->status}}
                                       </option>
                                       @else
                                       {
                                          <option value="{{$status->id}}" >{{$status->status}}
                                       </option>
                                       }
                                       @endif
                                       @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="task type">Task Type</label>
                                   <select name="task_type_id" class=".form-control">
                                       @foreach($task_types as $task_type)
                                       @if($task_type->id == $task[0]->task_type_id)
                                       {
                                        <option value="{{$task_type->id}}" selected="selected">{{$task_type->task_type}}
                                        </option>
                                       }
                                       @else
                                       {
                                        <option value="{{$task_type->id}}">{{$task_type->task_type}}
                                        </option>
                                       }
                                       @endif
                                       @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="project">Project</label>
                                   <select name="project_id" class=".form-control">
                                       @foreach($projects as $p)
                                       {
                                       @if($task[0]->project_id == $p->project_id)
                                       <option value="{{$p->project_id}}" selected="selected">{{$p->project_name}}
                                       </option>
                                       
                                       @endif
                                       
                                       }
                                       
                                       @endforeach
                                   </select>
                                </div>

                               <div class="form-group">
                                    <label for="user">User</label>
                                   <select name="assigned_to" class=".form-control">
                                       @foreach($users as $user)
                                       @if($user->project_id == $task[0]->project_id)
                                       <option value="{{$user->id}}" selected="selected">{{$user->name}}
                                        </option>
                                        @else
                                        {
                                          <option value="{{$user->id}}" >{{$user->name}}
                                        </option>

                                        }
                                        @endif
                                        @endforeach
                                    </select>
                                </div>


                                
                               <input type="submit" name="Update">
                               

                            </form> 
                            </div>
                    </div>   
                            
                </div>
                </div>
        </div>
   

@endsection