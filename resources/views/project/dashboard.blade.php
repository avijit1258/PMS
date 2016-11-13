@extends('layouts.app')



@section('content')

<style>
 th, td {
    border: 2px solid blue;

}
th{
  font-size: 150%;
}
.b{
  padding: 2px;
  width: 220px;
  height: 450px;
  overflow: auto;
  
}

.b1{
  background: red;
  float:left;
  border: 2px solid black;
  margin: 4px;

}

.b2{
  background: red;
  float: left;
  border: 2px solid black;
  margin: 4px;
}
.b3{
  background: #ffcc99;
  float:left;
  border: 2px solid black;
  margin: 4px;
  
}
/*-webkit-transform: rotate(353deg); /* Chrome, Safari, Opera */
  /*transform: rotate(353deg);*/
</style>

<div class="container-fluid">
        <div class="row">
  <div class="col-xs-1">
      
        <div class="sidebar-right ">
        @if($if_admin[0]->role_id == 1 || $if_admin[0]->role_id == 2)
          <ul><a href="/project_user/{{$id}}/all_user">User List</a></ul>
          <ul><a href="/tasks/create/{{$id}}/">Add New Task</a></ul>
          <ul><a href="/project_users/create">Add new User</a></ul>
        @endif
        </div>    
     
  </div>
  
  <div class="col-xs-8">
          <div class="container">
    <h3><font color="#cc6600" size="10px">@foreach($project as $p)
      {{$p->project_name}}
      @endforeach
      </font></h3>

<table border="2" height="450" width="1100">
  <tr>
    
    <th width="216" bgcolor="black"><font color="red" >Ice Box</font></th>
    <th width="216" bgcolor="red"><font color="#003311" >EMERGENCY</font></th>
    <th width="216" bgcolor="green"><font color="#ff3300" >IN PROGRESS</font></th>
    <th width="216" bgcolor="blue"><font color="yellow">TESTING</font></th>
    <th width="216" bgcolor="yellow"><font color="red">COMPLETE</font></th>
  </tr>
  
  <tr>
    <td>
        <div class="b"  >
          @foreach($tasks as $task)
          @if(($if_admin[0]->role_id == 1 || $if_admin[0]->role_id == 2) && $task->status_id == 1)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 1 && $task->assigned_to == $auth)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 1)
          <div class="b3">
          <p>{{$task->task}}</p>
          </div>
          @endif
          @endforeach
        </div>
    </td>
    <td>
      <div class="b"  >
          @foreach($tasks as $task)
          @if(($if_admin[0]->role_id == 1 || $if_admin[0]->role_id == 2) && $task->status_id == 5)
          <div class="b3">
            <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 5 && $task->assigned_to == $auth)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 5)
          <div class="b3">
          <p>{{$task->task}}</p>
          </div>

          @endif
          @endforeach
        </div>
    </td>
    <td>
      <div class="b"  >
          @foreach($tasks as $task)
          @if(($if_admin[0]->role_id == 1 || $if_admin[0]->role_id  == 2) && $task->status_id == 2)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 2 && $task->assigned_to == $auth)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 2)
          <div class="b3">
          <p>{{$task->task}}</p>
          </div>
          @endif
          @endforeach
        </div>
    </td>
    <td>
      <div class="b"  >
          @foreach($tasks as $task)
          @if(($if_admin[0]->role_id || $if_admin[0]->role_id == 2)&& $task->status_id == 3)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
           @elseif($task->status_id == 3 && $task->assigned_to == $auth)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 3)
          <div class="b3">
          <p>{{$task->task}}</p>
          </div>
          @endif
          @endforeach
        </div>
    </td>
    <td>
      <div class="b"  >
          @foreach($tasks as $task)
          @if(($if_admin[0]->role_id == 1 || $if_admin[0]->role_id == 2)&& $task->status_id == 4)
          <div class="b3">
            <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 4 && $task->assigned_to == $auth)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 4)
          <div class="b3">
          <p>{{$task->task}}</p>
          </div>
          @endif
          @endforeach
        </div>
    </td>

  </tr>
  
      
</table>  
  </div>  
  </div>
  
</div>
  
</div>

  
@endsection
